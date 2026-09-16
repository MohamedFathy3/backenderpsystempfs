<?php

namespace App\Http\Controllers\IT;

use App\Http\Controllers\BaseController;

use App\Enums\ActionType;
use App\Helpers\JsonResponse;
use App\Http\Requests\IT\DeviceAssignRequest;
use Illuminate\Http\Request;
use App\Http\Requests\IT\DeviceCreateRequest;
use App\Http\Requests\IT\DeviceUpdateRequest;
use App\Http\Resources\CityResource;
use App\Http\Resources\CountryResource;
use App\Http\Resources\IT\BrandResource;
use App\Http\Resources\IT\DeviceHistoryResource;
use App\Http\Resources\IT\DeviceModelOnlyResource;
use App\Http\Resources\DeviceModelResource;
use App\Http\Resources\IT\DeviceResource;
use App\Http\Resources\IT\DeviceSimpleResource;
use App\Http\Resources\IT\DeviceVerySimpleResource;
use App\Http\Resources\IT\GraphicCardResource;
use App\Http\Resources\IT\MemoryResource;
use App\Http\Resources\IT\ProcessorResource;
use App\Http\Resources\IT\StorageResource;
use App\Http\Resources\UserResource;
use App\Interfaces\DeviceRepositoryInterface;
use App\Models\Brand;
use App\Models\City;
use App\Models\Country;
use App\Models\Device;
use App\Models\DeviceHistory;
use App\Models\DeviceModel;
use App\Models\GraphicCard;
use App\Models\Memory;
use App\Models\Processor;
use App\Models\Storage;
use App\Models\User;
use App\Traits\HttpResponses;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;

class DeviceController extends BaseController
{
    use HttpResponses;

    protected mixed $crudRepository;

    public function __construct(DeviceRepositoryInterface $pattern)
    {
        $this->crudRepository = $pattern;
    }

    public function index()
    {
        try {
            $devices = DeviceResource::collection($this->crudRepository->all());
            return $devices->additional(JsonResponse::success());
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function store(DeviceCreateRequest $request)
    {
        try {
            $device = $this->crudRepository->create($request->validated());
            $user = Auth::user()->id;
            DB::table('devices')->where('id', $device->id)->update(['created_by_user_id' => $user]);
            if ($request->has('storages')) {
                $storages = [];
                foreach ($request->input('storages') as $storage) {
                    $storages[$storage['storage_id']] = ['type' => $storage['type'] ?? 'general'];
                }
                $device->storages()->sync($storages);
            }

            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_ADDED_SUCCESSFULLY), new DeviceResource($device));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }


    public function assignDevice(DeviceAssignRequest $request)
    {
        try {
            DB::beginTransaction();

            $adminId = Auth::id();
            $deviceId = $request->input('device_id');
            $employeeId = $request->input('employee_id');
            $actionType = $request->input('action_type') ?? "Device is assigned to employee";
            $note = $request->input('note');

            // إنشاء السجل وإرجاع الـ ID
            $historyId = DB::table('device_histories')->insertGetId([
                'device_id' => $deviceId ?? null,
                'employee_id' => $employeeId ?? null,
                'help_desk_id' => $adminId ?? null,
                'action_type' => $actionType ?? null,
                'note' => $note ?? null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // جلب السجل الجديد كـ Eloquent Model
            $deviceHistory = Device::findOrFail($deviceId);

            DB::commit();
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_ADDED_SUCCESSFULLY));
        } catch (Exception $e) {
            DB::rollBack();
            return JsonResponse::respondError($e->getMessage());
        }
    }


    public function show(Device $device): ?\Illuminate\Http\JsonResponse
    {
        try {
            return JsonResponse::respondSuccess('Item Fetched Successfully', new DeviceResource($device));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function update(DeviceUpdateRequest $request, Device $device)
    {
        try {
            $data = $request->except(['storages']);

            $this->crudRepository->update($data, $device->id);

            if ($request->has('storages')) {
                $storages = [];
                foreach ($request->input('storages') as $storage) {
                    $storages[$storage['storage_id']] = ['type' => $storage['type'] ?? 'general'];
                }
                $device->storages()->sync($storages);
            }

            activity()->performedOn($device)->withProperties(['attributes' => $device])->log('update');

            DB::table('device_histories')->insert([
                'device_id' => $device->id,
                'help_desk_id' => auth()->id() ?? null,
                'action_type' => 'update / upgrate',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_UPDATED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }



    public function destroy(Request $request): ?\Illuminate\Http\JsonResponse
    {
        try {
            $this->crudRepository->deleteRecords('devices', $request['items']);
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_DELETED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function restore(Request $request): ?\Illuminate\Http\JsonResponse
    {
        try {
            $this->crudRepository->restoreItem(Device::class, $request['items']);
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_RESTORED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function forceDelete(Request $request): ?\Illuminate\Http\JsonResponse
    {
        try {
            $exists = DB::table('devices')->whereIn('id', $request['items'])->exists();
            if (!$exists) {
                return JsonResponse::respondError("One or more records do not exist. Please refresh the page.");
            }

            $this->crudRepository->deleteRecordsFinial(Device::class, $request['items']);
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_FORCE_DELETED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function fetchDeviceResource(Request $request)
    {
        try {
            $data = [
                'memories' => MemoryResource::collection(Memory::all()),
                'processors' => ProcessorResource::collection(Processor::all()),
                'deviceModels' => DeviceModelOnlyResource::collection(DeviceModel::all()),
                'graphicCards' => GraphicCardResource::collection(GraphicCard::all()),
                'storages' => StorageResource::collection(Storage::all()),
                'brands' => BrandResource::collection(Brand::all()),
                'countries' => CountryResource::collection(Country::all()),
            ];
            return JsonResponse::respondSuccess('Items Fetched Successfully', $data);
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function fetch()
    {
        try {
            $data = Device::get();
            return JsonResponse::respondSuccess('Items Fetched Successfully', $data);
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function fetchUser()
    {
        try {
            $users = UserResource::collection(User::get());
            return JsonResponse::respondSuccess('Users Fetched Successfully', $users);
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function fetchDevice()
    {
        try {
            $devices = DeviceSimpleResource::collection(Device::get());
            return JsonResponse::respondSuccess('Devices Fetched Successfully', $devices);
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function deviceHistory(Request $request, $id)
    {
        try {
            $filters = $request->input('filters', []);
            $orderBy = $request->input('orderBy', 'id');
            $orderByDirection = $request->input('order_by_direction');
            $perPage = $request->input('per_page');
            $paginate = $request->input('paginate', 1);
            $query = DeviceHistory::where('device_id', $id);

            if (!empty($filters['employee_id'])) {
                $query->where('employee_id', $filters['employee_id']);
            }
            if (!empty($filters['action_type'])) {
                $query->where('action_type', $filters['action_type']);
            }
            if (!empty($filters['help_desk_id'])) {
                $query->where('help_desk_id', $filters['help_desk_id']);
            }
            // dd($request->all());

            $query->orderBy('id', $orderByDirection);

            $deviceHistories = $query->get();

            if ($deviceHistories->isEmpty()) {
                return JsonResponse::respondError('No history found for this device');
            }

            $userIds = $deviceHistories->pluck('employee_id')
                ->merge($deviceHistories->pluck('help_desk_id'))
                ->filter()
                ->unique();
            $users = User::whereIn('id', $userIds)->pluck('name', 'id');

            if ($paginate) {
                $currentPage = Paginator::resolveCurrentPage();
                $currentPageItems = $deviceHistories->slice(($currentPage - 1) * $perPage, $perPage)->values();
                $paginatedItems = new LengthAwarePaginator(
                    $currentPageItems,
                    $deviceHistories->count(),
                    $perPage,
                    $currentPage,
                    ['path' => Paginator::resolveCurrentPath()]
                );

                return DeviceHistoryResource::collection($paginatedItems)
                    ->additional(['message' => 'Device history fetched successfully']);
            }

            return JsonResponse::respondSuccess('Device history fetched successfully', DeviceHistoryResource::collection($deviceHistories->map(function ($history) use ($users) {
                return new DeviceHistoryResource($history, $users);
            })));
        } catch (\Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }




    public function fetchDeviceData(Request $request)
    {
        try {
            $employeeId = $request->input('employee_id');
            $deviceId = $request->input('device_id');
            $type = $request->input('type');

            if ($employeeId) {
                $deviceHistories = DB::table('device_histories')
                    ->where('employee_id', $employeeId)
                    ->whereNotNull('device_id')
                    ->orderBy('id', 'desc')
                    ->select('device_id')
                    ->first();
            } elseif ($deviceId) {
                $deviceHistories = DB::table('device_histories')
                    ->where('device_id', $deviceId)
                    ->orderBy('id', 'desc')
                    ->whereNotNull('employee_id')
                    ->select('employee_id')
                    ->first();
            } elseif ($type) {
                $deviceHistories = Device::where('type', $type)
                    ->get();

                return DeviceVerySimpleResource::collection($deviceHistories);
            } else {
                return response()->json(['error' => 'Please provide either employee_id, device_id, or type'], 400);
            }

            return response()->json($deviceHistories);
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }


public function acknowledgement(Device $device)
{
    $device->load([
        'memory',
        'brand',
        'cpu',
        'deviceModel',
        'storages',
    ]);

    $lastHistory = DB::table('device_histories')
        ->where('device_id', $device->id)
        ->whereNotNull('employee_id')
        ->latest()
        ->first();

    $employeeDetails = null;

    if ($lastHistory) {
        $employee = User::with(['position','department','company'])
            ->find($lastHistory->employee_id);

        if ($employee) {
            $employeeDetails = [
                'name' => $employee->name,
                'national_id' => $employee->national_id ?? '.............................',
                'position' => $employee->position?->name,
            ];
        }
    }

    $html = view('pdf.device_acknowledgement', [
        'device' => $device,
        'employeeDetails' => $employeeDetails
    ])->render();

    $pdf = new Mpdf([
        'mode' => 'utf-8',
        'format' => 'A4',
        'margin_top' => 20,
        'margin_bottom' => 20,
        'margin_left' => 20,
        'margin_right' => 20,
    ]);

    $pdf->WriteHTML($html);

    return response($pdf->Output('', 'S'))
        ->header('Content-Type', 'application/pdf')
        ->header('Content-Disposition', 'attachment; filename="Acknowledgement.pdf"');
}
}
