<?php

namespace App\Http\Controllers\IT;

use App\Http\Controllers\BaseController;

use App\Helpers\JsonResponse;
use App\Http\Requests\IT\TicketRequest;
use App\Http\Requests\IT\TicketUpdateRequest;
use App\Http\Resources\IT\TicketResource;
use App\Interfaces\TicketRepositoryInterface;
use App\Mail\HelpDeskTicketMail;
use App\Models\Ticket;
use App\Models\TicketStatus;
use App\Models\User;
use App\Traits\HttpResponses;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class TicketController extends BaseController
{
    use HttpResponses;

    protected mixed $crudRepository;

    public function __construct(TicketRepositoryInterface $pattern)
    {
        $this->crudRepository = $pattern;
    }

    public function index()
    {
        try {
            $tickets = $this->crudRepository->all(
                ['category'],
                [],
                ['id','ticket_number','title','priority','status','daily_status','category_id']);
            return TicketResource::collection($tickets)->additional(JsonResponse::success());
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function store(TicketRequest $request)
    {
        try {
            $ticket = $this->crudRepository->create($request->validated());
            DB::table('tickets')->where('id', $ticket->id)->update(['daily_status' => 1 , 'created_by_id' => Auth::user()->id]);
            $ticket->statuses()->create([
                'updated_by_id' => Auth::user()->id,
            ]);
            $helpDeskUsers = User::whereIn('role', ['help_desk', 'admin'])->get();
            $employee = User::with(['company'])->find($ticket->employee_id);
            $employee = $employee ?? new User(['name' => 'Unknown Employee']);

            foreach ($helpDeskUsers as $user) {
                Mail::to($user->email)->queue(new HelpDeskTicketMail($ticket, $employee));
            }
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_ADDED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function createByEmployee(TicketRequest $request)
    {
        try {
            $ticket = $this->crudRepository->create($request->validated());
            DB::table('tickets')->where('id', $ticket->id)->update(['created_by_id' => Auth::user()->id, 'daily_status' => 1 ,  'employee_id' => Auth::user()->id]);
            $ticket->statuses()->create([
                'updated_by_id' => Auth::user()->id,
            ]);
            if ($request->hasFile('avatar')) {
                $path = $request->file('avatar')->store('uploads', 'public');
                $ticket->avatar = $path;
                $ticket->save();
            }
            $helpDeskUsers = User::whereIn('role', ['help_desk', 'admin'])->get();
            $employee = User::with(['company'])->find(Auth::user()->id);
            foreach ($helpDeskUsers as $user) {
                Mail::to($user->email)->queue(new HelpDeskTicketMail($ticket, $employee));
            }
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_ADDED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }


    public function show(Ticket $ticket): ?\Illuminate\Http\JsonResponse
    {
        try {
            $user = auth()->user();
            if ($user->role->value == "help_desk") {
                if (is_null($ticket->open_at) && is_null($ticket->help_desk_id) && $ticket->status == 'pending') {
                    $ticket->update([
                        'open_at' => now(),
                        'status' => 'open',
                        'help_desk_id' => auth()->id()
                    ]);

                    $ticket->statuses()->create([
                        'status' => 'open',
                        'updated_by_id' => auth()->id(),
                    ]);
                }
            }
            return JsonResponse::respondSuccess('Item Fetched Successfully', new TicketResource($ticket));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }


    public function helpDeskDescription(Ticket $ticket, Request $request): ?\Illuminate\Http\JsonResponse
    {
        try {
            $ticket->update([
                'des' => $request['des']
            ]);

            return JsonResponse::respondSuccess('Comment add Successfully');
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }




public function updateStatus(Request $request, Ticket $ticket): \Illuminate\Http\JsonResponse
{
    try {
        $user = auth()->user();
        // السماح فقط للمسؤول عن التذكرة أو المستخدم الذي لديه دور "admin"
        // if (!($user->id === $ticket->help_desk_id || $user->role->value === 'admin')) {
        //     return JsonResponse::respondError('You are not authorized to update this ticket.');
        // }

        if ($ticket->status === 'closed') {
            return JsonResponse::respondError('This ticket is already closed and cannot be modified.');
        }

        $validated = $request->validate([
            'status' => ['required', Rule::in(['open', 'closed', 'transfered', 'postponed'])],
            'transfer_to_id' => ['nullable', 'exists:users,id']
        ]);

        if (
            $validated['status'] === 'closed' &&
            !($user->id === $ticket->help_desk_id || $user->role->value === 'admin')
        ) {
            return JsonResponse::respondError('Only the assigned help desk or admin can close this ticket.');
        }

        // if ($validated['status'] === 'transfered') {
        //     if ($user->id !== $ticket->help_desk_id) {
        //         return JsonResponse::respondError('Only the assigned help desk can transfer this ticket.');
        //     }
        // }

        $lastStatus = TicketStatus::where('ticket_id', $ticket->id)->latest()->first();

        if ($validated['status'] === 'transfered' && $lastStatus) {
            $duration = round((strtotime(now()) - strtotime($lastStatus->created_at)) / 60);
            $lastStatus->update(['duration' => $duration]);
        }

        TicketStatus::create([
            'ticket_id' => $ticket->id,
            'status' => $validated['status'],
            'updated_by_id' => $validated['status'] === 'transfered' ? $validated['transfer_to_id'] : $user->id,
            'transfer_to_id' => $validated['status'] === 'transfered' ? $validated['transfer_to_id'] : null,
            'duration' => $validated['status'] === 'transfered' ? null : ($lastStatus ? round((strtotime(now()) - strtotime($lastStatus->created_at)) / 60) : null),
        ]);

        $ticket->update([
            'status' => $validated['status'],
            'close_at' => $validated['status'] === 'closed' ? now() : null,
            'help_desk_id' => $validated['status'] === 'transfered' ? $validated['transfer_to_id'] : $ticket->help_desk_id,
        ]);

        return JsonResponse::respondSuccess('Status updated successfully.', new TicketResource($ticket));
    } catch (Exception $e) {
        return JsonResponse::respondError($e->getMessage());
    }
}





    public function update(TicketUpdateRequest $request, Ticket $ticket)
    {
        try {
            $data = $request->validated();
            $this->crudRepository->update($data, $ticket->id);
            activity()->performedOn($ticket)->withProperties(['attributes' => $ticket])->log('update');
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_UPDATED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function destroy(Request $request): ?\Illuminate\Http\JsonResponse
    {
        try {
            $this->crudRepository->deleteRecords('tickets', $request['items']);
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_DELETED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function restore(Request $request): ?\Illuminate\Http\JsonResponse
    {
        try {
            $this->crudRepository->restoreItem(Ticket::class, $request['items']);
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_RESTORED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function forceDelete(Request $request): ?\Illuminate\Http\JsonResponse
    {
        try {
            $exists = DB::table('tickets')->whereIn('id', $request['items'])->exists();
            if (!$exists) {
                return JsonResponse::respondError("One or more records do not exist. Please refresh the page.");
            }
            $this->crudRepository->deleteRecordsFinial(Ticket::class, $request['items']);
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_FORCE_DELETED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function fetchStorage(Request $request)
    {
        try {
            $TicketData = Ticket::get();
            return TicketResource::collection($TicketData)->additional(JsonResponse::success());
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function fetchTicketById(Ticket $ticket): ?\Illuminate\Http\JsonResponse
    {
        try {
            return JsonResponse::respondSuccess('Item Fetched Successfully', new TicketResource($ticket));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }
}
