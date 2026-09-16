<?php

namespace App\Http\Resources\IT;

use App\Enums\ActionType;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class DeviceForLoginResource extends JsonResource
{
    public function toArray($request): array
    {

        return [
            'id' => $this->id ?? null,
            'type' => $this->type ?? null,
            'serialNumber' => $this->serial_number ?? null,
            'condition' => $this->condition ?? null,
            'active' => $this->active ?? null,
            'note' => $this->note ?? null,
            'purchaseDate' => $this->purchase_date ? $this->purchase_date->format('Y-m-d') : null,
            'purchaseDateFormatted' => $this->purchase_date ? $this->purchase_date->format('d F, Y') : null,
            'warrantyExpireDate' => $this->warranty_expire_date ? $this->purchase_date->format('Y-m-d') : null,
            'warrantyExpireDateFormatted' => $this->warranty_expire_date ? $this->warranty_expire_date->format('d F, Y') : null,

            'memoryId' => $this->memory_id ?? null,
            'memory' => new MemoryResource($this->memory) ?? null,

            'graphicCardId' => $this->graphic_card_id ?? null,
            'gpu' => new GraphicCardResource($this->gpu) ?? null,

            'processorId' => $this->processor_id ?? null,
            'cpu' => new ProcessorResource($this->cpu) ?? null,

            'brandId' => $this->brand_id ?? null,
            'brand' => new BrandResource($this->brand) ?? null,

            'deviceModelId' => $this->device_model_id ?? null,
            'deviceModel' => new DeviceModelOnlyResource($this->deviceModel) ?? null,

            'storages' => StoragesPivotResource::collection($this->storages) ?? null,
            'hdDriver' => StorageResource::collection($this->storages) ?? null,
        ];
    }
}

