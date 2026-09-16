<?php

namespace App\Http\Resources\IT;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class DeviceVerySimpleResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id ?? null,
            'type' => $this->type ?? null,
            'serialNumber' => $this->serial_number ?? null,


            'memory' => new MemoryResource($this->memory),

            'cpu' => new ProcessorResource($this->cpu),

            'brand' => new BrandResource($this->brand),

            'deviceModel' => new DeviceModelOnlyResource($this->deviceModel),

        ];
    }
}
