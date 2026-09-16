<?php

namespace App\Http\Resources\IT;

use Illuminate\Http\Resources\Json\JsonResource;

class StoragesPivotResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'deviceId' => $this->pivot->device_id ?? null,
            'storageId' => $this->pivot->storage_id ?? null,
            'type' => $this->pivot->type ?? null,
        ];
    }
}
