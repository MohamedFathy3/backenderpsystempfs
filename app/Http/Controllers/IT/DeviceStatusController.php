<?php

namespace App\Http\Controllers\IT;

use App\Helpers\JsonResponse;
use App\Http\Controllers\BaseController;
use App\Http\Requests\IT\DeviceStatusRequest;
use App\Http\Requests\IT\DeviceStatusUpdateRequest;
use App\Http\Resources\IT\DeviceStatusResource;
use App\Interfaces\DeviceStatusRepositoryInterface;
use App\Models\DeviceStatus;
use App\Traits\HttpResponses;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeviceStatusController extends BaseController
{
    use HttpResponses;

    protected mixed $crudRepository;

    public function __construct(DeviceStatusRepositoryInterface $pattern)
    {
        $this->crudRepository = $pattern;
    }

    public function index()
    {
        try {
            $position = DeviceStatusResource::collection($this->crudRepository->all());
            return $position->additional(JsonResponse::success());
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function store(DeviceStatusRequest $request)
    {
        try {
            $this->crudRepository->create($request->validated());
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_ADDED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function show(DeviceStatus $deviceStatus): ?\Illuminate\Http\JsonResponse
    {
        try {
            return JsonResponse::respondSuccess('Item Fetched Successfully', new DeviceStatusResource($deviceStatus));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function update(DeviceStatusUpdateRequest $request, DeviceStatus $deviceStatus)
    {
        try {
            $data = $request->validated();
            $this->crudRepository->update($data, $deviceStatus->id);
            activity()->performedOn($deviceStatus)->withProperties(['attributes' => $deviceStatus])->log('update');
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_UPDATED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function destroy(Request $request): ?\Illuminate\Http\JsonResponse
    {
        try {
            $this->crudRepository->deleteRecords('device_statuses', $request['items']);
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_DELETED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function restore(Request $request): ?\Illuminate\Http\JsonResponse
    {
        try {
            $this->crudRepository->restoreItem(DeviceStatus::class, $request['items']);
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_RESTORED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function forceDelete(Request $request): ?\Illuminate\Http\JsonResponse
    {
        try {
            $exists = DB::table('device_statuses')->whereIn('id', $request['items'])->exists();
            if (!$exists) {
                return JsonResponse::respondError("One or more records do not exist. Please refresh the page.");
            }
            $this->crudRepository->deleteRecordsFinial(DeviceStatus::class, $request['items']);
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_FORCE_DELETED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function fetchDeviceStatus(Request $request)
    {
        try {
            $PositionData = DeviceStatus::get();
            return DeviceStatusResource::collection($PositionData)->additional(JsonResponse::success());
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }
}

