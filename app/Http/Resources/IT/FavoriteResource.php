<?php

namespace App\Http\Resources\IT;

use App\Http\Resources\FavoriteUserResource;
use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class FavoriteResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id ?? null,
            'name' => $this->name ?? null,
            'favorite' => (bool) $this->favorite ?? null,
            'user' => new FavoriteUserResource($this->user),
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
