<?php

namespace App\Http\Resources\IT;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class DeviceSimpleResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id ?? null,
            'type' => $this->type ?? null,
            'serialNumber' => $this->serial_number ?? null,
            'active' => $this->active ?? null,
            'note' => $this->note ?? null,
            'screenSize' => $this->screen_size ?? null,

            'purchaseDate' => $this->purchase_date ? $this->purchase_date->format('Y-m-d') : null,
            'purchaseDateFormatted' => $this->purchase_date ? $this->purchase_date->format('d F, Y') : null,

            'warrantyExpireDate' => $this->warranty_expire_date ? $this->warranty_expire_date->format('Y-m-d') : null,
            'warrantyExpireDateFormatted' => $this->warranty_expire_date ? $this->warranty_expire_date->format('d F, Y') : null,

            'memoryId' => $this->memory_id,
            'memory' => new MemoryResource($this->memory),

            'processorId' => $this->processor_id,
            'cpu' => new ProcessorResource($this->cpu),

            'brandId' => $this->brand_id,
            'brand' => new BrandResource($this->brand),

            'deviceModelId' => $this->device_model_id,
            'deviceModel' => new DeviceModelOnlyResource($this->deviceModel),

            'condition' => $this->condition ?? null,

            'graphicCardId' => $this->graphic_card_id,
            'gpu' => new GraphicCardResource($this->gpu),

            'deviceStatusId' => $this->device_status_id ?? null,
            'deviceStatus' => new DeviceStatusResource($this->deviceStatus),

            'storages' => StoragesPivotResource::collection($this->storages),

            'hdDriver' => StorageResource::collection($this->storages),


            'createdAt' => $this->created_at ? $this->created_at->format('Y-M-d H:i:s A') : null,
            'updatedAt' => $this->updated_at ? $this->updated_at->format('Y-M-d H:i:s A') : null,
            'deletedAt' => $this->deleted_at ? $this->deleted_at->format('Y-M-d H:i:s A') : null,
            'deleted' => isset($this->deleted_at),
        ];
    }
}
