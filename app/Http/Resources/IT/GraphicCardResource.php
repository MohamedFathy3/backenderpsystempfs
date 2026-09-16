<?php

namespace App\Http\Resources\IT;

use Illuminate\Http\Resources\Json\JsonResource;

class GraphicCardResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'model' => $this->model,
            'code' => $this->code,
            'vram' => $this->vram,
        ];
    }
}



