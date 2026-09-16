<?php

namespace App\Http\Resources\IT;

use Illuminate\Http\Resources\Json\JsonResource;

class OrganizationResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'outgoing_server' => $this->outgoing_server,
            'port' => $this->port,
            'ssl' => $this->ssl,
            'logo' => $this->avatar ?? null,
            'createdAt' => $this->created_at?->format('Y-m-d H:i:s A'),
            'updatedAt' => $this->updated_at?->format('Y-m-d H:i:s A'),
            'deletedAt' => $this->deleted_at?->format('Y-m-d H:i:s A'),
        ];
    }
}
