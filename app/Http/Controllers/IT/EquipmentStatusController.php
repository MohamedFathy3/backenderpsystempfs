<?php

namespace App\Http\Controllers\IT;
use App\Http\Controllers\BaseController;

use App\Helpers\JsonResponse;
use App\Http\Requests\IT\EquipmentStatusRequest;
use App\Http\Requests\IT\EquipmentStatusUpdateRequest;
use App\Http\Resources\IT\EquipmentStatusResource;
use App\Interfaces\EquipmentStatusRepositoryInterface;
use App\Models\EquipmentStatus;
use App\Traits\HttpResponses;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquipmentStatusController extends BaseController
{
    use HttpResponses;

    protected mixed $crudRepository;

    public function __construct(EquipmentStatusRepositoryInterface $pattern)
    {
        $this->crudRepository = $pattern;
    }

    public function index()
    {
        try {
            $EquipmentStatus = EquipmentStatusResource::collection($this->crudRepository->all());
            return $EquipmentStatus->additional(JsonResponse::success());
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function store(EquipmentStatusRequest $request)
    {
        try {
            $this->crudRepository->create($request->validated());
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_ADDED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function show(EquipmentStatus $equipment_status): ?\Illuminate\Http\JsonResponse
    {
        try {
            return JsonResponse::respondSuccess('Item Fetched Successfully', new EquipmentStatusResource($equipment_status));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function update(EquipmentStatusUpdateRequest $request, EquipmentStatus $equipment_status)
    {
        try {
            $data = $request->validated();
            $this->crudRepository->update($data, $equipment_status->id);
            activity()->performedOn($equipment_status)->withProperties(['attributes' => $equipment_status])->log('update');
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_UPDATED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function destroy(Request $request): ?\Illuminate\Http\JsonResponse
    {
        try {
            $this->crudRepository->deleteRecords('equipment_statuses', $request['items']);
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_DELETED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function restore(Request $request): ?\Illuminate\Http\JsonResponse
    {
        try {
            $this->crudRepository->restoreItem(EquipmentStatus::class, $request['items']);
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_RESTORED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function forceDelete(Request $request): ?\Illuminate\Http\JsonResponse
    {
        try {
            $exists = DB::table('equipment_statuses')->whereIn('id', $request['items'])->exists();
            if (!$exists) {
                return JsonResponse::respondError("One or more records do not exist. Please refresh the page.");
            }
            $this->crudRepository->deleteRecordsFinial(EquipmentStatus::class, $request['items']);
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_FORCE_DELETED_SUCCESSFULLY));
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public function fetchEquipmentStatus(Request $request)
    {
        try {
            $EquipmentStatusData = EquipmentStatus::get();
            return EquipmentStatusResource::collection($EquipmentStatusData)->additional(JsonResponse::success());
        } catch (Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }
}

