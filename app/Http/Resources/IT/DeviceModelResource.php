<?php

namespace App\Http\Resources\IT;

use Illuminate\Http\Resources\Json\JsonResource;

class DeviceModelResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'brandId' => $this->brand_id,
            'brand' => new BrandResource($this->brand),
        ];
    }
}

