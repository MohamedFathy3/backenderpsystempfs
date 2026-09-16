<?php

namespace App\Http\Controllers\IT;
use App\Http\Controllers\BaseController;

use App\Helpers\JsonResponse;
use App\Http\Resources\IT\LogResource;
use App\Models\Ticket;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\DeviceHistory;
use App\Models\User;

class ReportController extends BaseController
{

    public function ticketsReport(Request $request)
    {
        try {
            $perPage = $request->json('per_page', 5); // عدد العناصر في كل صفحة
            $page = $request->json('page', 1); // الصفحة الحالية

            $tickets = Ticket::select('id', 'status', 'title', 'created_at', 'employee_id', 'help_desk_id')
                ->with(['employee:id,name,company_id,department_id', 'helpDesk:id,name'])
                ->when($request->json('company_id'), function ($query, $companyId) {
                    return $query->whereHas('employee', function ($q) use ($companyId) {
                        $q->where('company_id', $companyId);
                    });
                })
                ->when($request->json('department_id'), function ($query, $departmentId) {
                    return $query->whereHas('employee', function ($q) use ($departmentId) {
                        $q->where('department_id', $departmentId);
                    });
                })
                ->when($request->json('from'), function ($query, $from) {
                    return $query->whereDate('created_at', '>=', $from);
                })
                ->when($request->json('to'), function ($query, $to) {
                    return $query->whereDate('created_at', '<=', $to);
                })
                ->when($request->json('user_id'), function ($query, $userId) {
                    return $query->where(function ($q) use ($userId) {
                        $q->where('employee_id', $userId)
                            ->orWhere('help_desk_id', $userId);
                    });
                })
                ->get()
                ->groupBy('status')
                ->map(function ($group, $status) use ($perPage, $page) {
                    $ticketDetails = $group->map(function ($ticket) {
                        return [
                            'id' => $ticket->id,
                            'title' => $ticket->title,
                            'date' => optional($ticket->created_at)->format('Y-m-d'),
                            'employee' => optional($ticket->employee)->name,
                            'help_desk' => optional($ticket->helpDesk)->name,
                        ];
                    });

                    // ✅ **إضافة Pagination للـ `ticketDetails`**
                    $paginator = new LengthAwarePaginator(
                        $ticketDetails->forPage($page, $perPage), // البيانات حسب الصفحة
                        $ticketDetails->count(), // العدد الكلي للعناصر
                        $perPage, // عدد العناصر لكل صفحة
                        $page, // الصفحة الحالية
                        ['path' => request()->url(), 'query' => request()->query()] // إضافة بارامترات الصفحة
                    );

                    return [
                        'id' => $group->first()->id,
                        'status' => $status,
                        'count' => $group->count(),
                        'ticketDetails' => $paginator
                    ];
                })
                ->values();

            return response()->json([
                'data' => $tickets,
                'result' => 'Success',
                'message' => 'Success',
                'status' => 200
            ]);
        } catch (Exception $e) {
            return response()->json([
                'data' => null,
                'result' => 'Error',
                'message' => $e->getMessage(),
                'status' => 500
            ]);
        }
    }

    public function logIndex(Request $request)
    {
        $query = DB::table('activity_log')->orderByDesc('id');
        $from = $request->input('from');
        $to = $request->input('to');
        $perPage = $request->input('per_page', 10);
        if ($from && $to) {
            $fromDate = \Carbon\Carbon::parse($from)->startOfDay();
            $toDate = \Carbon\Carbon::parse($to)->endOfDay();
            $query->whereBetween('created_at', [$fromDate, $toDate]);
        }
        $query->where(function ($q) {
            $q->where('subject_type', '!=', 'App\Models\Ticket')
                ->WhereJsonDoesntContain('properties->attributes', ['daily_time']);
        });
        $log = $query->paginate($perPage);
        return LogResource::collection($log);
    }


    public function exportDeviceHistoryPdf(Request $request, $id)
    {
        try {
            $filters = $request->input('filters', []);
            $orderByDirection = $request->input('order_by_direction', 'asc');

            $query = DeviceHistory::where('device_id', $id)
                ->when(!empty($filters['employee_id']), function ($q) use ($filters) {
                    $q->where('employee_id', $filters['employee_id']);
                })
                ->when(!empty($filters['action_type']), function ($q) use ($filters) {
                    $q->where('action_type', $filters['action_type']);
                })
                ->when(!empty($filters['help_desk_id']), function ($q) use ($filters) {
                    $q->where('help_desk_id', $filters['help_desk_id']);
                })
                ->orderBy('id', $orderByDirection)
                ->get();

            if ($query->isEmpty()) {
                return response()->json([
                    'result' => "Error",
                    'data' => null,
                    'message' => 'No history found for this device',
                    'status' => 400,
                ], 400);
            }

            $userIds = $query->pluck('employee_id')
                ->merge($query->pluck('help_desk_id'))
                ->filter()
                ->unique();
            $users = User::whereIn('id', $userIds)->pluck('name', 'id');

            $data = $query->map(function ($history) use ($users) {
                return [
                    'action_type' => $history->action_type ?? 'N/A',
                    'employee_name' => $users[$history->employee_id] ?? 'N/A',
                    'help_desk_name' => $users[$history->help_desk_id] ?? 'N/A',
                    'note' => $users[$history->note] ?? 'N/A',
                    'created_at' => $history->created_at->format('Y-m-d H:i:s'),
                ];
            });

            $pdf = Pdf::loadView('exports.device_history', ['data' => $data]);

            return $pdf->download('device_history.pdf');
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }





    public function ticketsReportPDF(Request $request)
    {
        try {
            $tickets = Ticket::select('id', 'status', 'title', 'created_at', 'employee_id', 'help_desk_id')
                ->with(['employee:id,name,company_id,department_id', 'helpDesk:id,name'])
                ->when($request->json('company_id'), function ($query, $companyId) {
                    return $query->whereHas('employee', function ($q) use ($companyId) {
                        $q->where('company_id', $companyId);
                    });
                })
                ->when($request->json('department_id'), function ($query, $departmentId) {
                    return $query->whereHas('employee', function ($q) use ($departmentId) {
                        $q->where('department_id', $departmentId);
                    });
                })
                ->when($request->json('from'), function ($query, $from) {
                    return $query->whereDate('created_at', '>=', $from);
                })
                ->when($request->json('to'), function ($query, $to) {
                    return $query->whereDate('created_at', '<=', $to);
                })
                ->when($request->json('user_id'), function ($query, $userId) {
                    return $query->where(function ($q) use ($userId) {
                        $q->where('employee_id', $userId)
                            ->orWhere('help_desk_id', $userId);
                    });
                })
                ->get()
                ->groupBy('status');

            $data = $tickets->map(function ($group, $status) {
                return [
                    'status' => $status,
                    'count' => $group->count(),
                    'tickets' => $group->map(function ($ticket) {
                        return [
                            'id' => $ticket->id,
                            'title' => $ticket->title,
                            'date' => optional($ticket->created_at)->format('Y-m-d'),
                            'employee' => optional($ticket->employee)->name,
                            'help_desk' => optional($ticket->helpDesk)->name,
                        ];
                    }),
                ];
            });

            $pdf = Pdf::loadView('exports.tickets_report', compact('data'));

            return $pdf->download('tickets_report.pdf');
        } catch (\Exception $e) {
            return response()->json([
                'data' => null,
                'result' => 'Error',
                'message' => $e->getMessage(),
                'status' => 500
            ]);
        }
    }
}
