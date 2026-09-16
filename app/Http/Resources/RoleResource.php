<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'display_name' => $this->display_name ?? $this->name,
            'description' => $this->description,
            'scope' => $this->scope ?? 'organization',
            'is_system' => (bool) ($this->is_system ?? false),
            'link' => $this->link,
            'permissions' => PermissionResource::collection($this->permissions),
        ];
    }
}
