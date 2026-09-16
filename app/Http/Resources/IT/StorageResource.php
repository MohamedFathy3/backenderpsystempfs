<?php

namespace App\Http\Resources\IT;

use Illuminate\Http\Resources\Json\JsonResource;

class StorageResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'size' => $this->size,
            'code' => $this->code,
            'type' => $this->type,
        ];
    }
}

