<?php

namespace App\Http\Resources\IT;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id ?? null,
            'name' => $this->name ?? null,
            'code' => $this->code ?? null,
            'time' => $this->time ?? null,
            'priority' => $this->priority ?? null,
            'short_description' => $this->short_description ?? null,
            'type_id' => $this->type_id ?? null,
            'typeName' => $this->type->name ?? null,
        ];
    }
}

