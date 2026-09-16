<?php

namespace App\Http\Resources\IT;

use App\Enums\ActionType;
use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class DeviceResource extends JsonResource
{
    public function toArray($request): array
    {
        $deviceHistories = DB::table('device_histories')
            ->where('device_id', $this->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $lastHistory = $deviceHistories->whereNotNull('employee_id')->first();

        $employeeDetails = null;
        if ($lastHistory && $lastHistory->employee_id) {
            $employee = \App\Models\User::with(['department', 'company'])->find($lastHistory->employee_id);
            $createdByUser = \App\Models\User::find($lastHistory->help_desk_id); // تأكد إن عندك العمود ده في جدول device_histories

            if ($employee) {
                $employeeDetails = [
                    'id' => $employee->id,
                    'name' => $employee->name,
                    'position' => $employee->position->name ?? NULL,
                    'department' => optional($employee->department)->name,
                    'company' => optional($employee->company)->name,
                    'createdAt' => $lastHistory->created_at ? date('Y-m-d H:i:s A', strtotime($lastHistory->created_at)) : null,
                    'givenBy' => $createdByUser?->name,
                ];
            }
        }


        return [
            'id' => $this->id ?? null,
            'type' => $this->type ?? null,
            'serialNumber' => $this->serial_number ?? null,
            'condition' => $this->condition ?? null,
            'active' => $this->active ?? null,
            'note' => $this->note ?? null,
            'purchaseDate' => $this->purchase_date ? $this->purchase_date->format('Y-m-d') : null,
            'purchaseDateFormatted' => $this->purchase_date ? $this->purchase_date->format('d F, Y') : null,

            'warrantyExpireDate' => $this->warranty_expire_date ? $this->warranty_expire_date->format('Y-m-d') : null,
            'warrantyExpireDateFormatted' => $this->warranty_expire_date ? $this->warranty_expire_date->format('d F, Y') : null,

            'history' => $deviceHistories->map(function ($history) {
                return [
                    'employee_id' => $history->employee_id ?? null,
                    'employee_name' => optional(\App\Models\User::find($history->employee_id))->name,
                    'help_desk_id' => $history->help_desk_id ?? null,
                    'help_desk_name' => optional(\App\Models\User::find($history->help_desk_id))->name,
                    'action_type' => ActionType::tryFrom($history->action_type)?->label() ?? $history->action_type,
                    'note' => $history->note ?? null,
                    'created_at' => $history->created_at ?? null,
                ];
            }),

            'screenSize' => $this->screen_size ?? null,
            'userId' => $this->user_id,
            'employee' => $employeeDetails, // ✅ هنا تم التعديل لإرجاع آخر موظف
            'companyId' => $this->company_id,
            'company' => new CompanyResource($this->company),


            'deviceStatusId' => $this->device_status_id ?? null,
            'deviceStatus' => new DeviceStatusResource($this->deviceStatus),

            'createdByUserId' => $this->created_by_user_id,
            'createdBy' => new UserResource($this->createdBy),

            'memoryId' => $this->memory_id,
            'memory' => new MemoryResource($this->memory),

            'graphicCardId' => $this->graphic_card_id,
            'gpu' => new GraphicCardResource($this->gpu),

            'processorId' => $this->processor_id,
            'cpu' => new ProcessorResource($this->cpu),

            'brandId' => $this->brand_id,
            'brand' => new BrandResource($this->brand),

            'deviceModelId' => $this->device_model_id,
            'deviceModel' => new DeviceModelOnlyResource($this->deviceModel),

            'storages' => StoragesPivotResource::collection($this->storages),
            'hdDriver' => StorageResource::collection($this->storages),
        ];
    }
}
