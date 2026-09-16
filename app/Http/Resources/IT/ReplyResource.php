<?php

namespace App\Http\Resources\IT;

use Illuminate\Http\Resources\Json\JsonResource;

class ReplyResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id ?? null,
            'user_id' => $this->user_id ?? null,
            'name' => $this->user->name ?? null,
            'role' => $this->user->role ?? null,
            'ticket_id' => $this->ticket_id ?? null,
            'message' => $this->message ?? null,
            'createdAt' => $this->created_at ? $this->created_at->format('Y-m-d H:i:s A') : null,
            'updatedAt' => $this->updated_at ? $this->updated_at->format('Y-m-d H:i:s A') : null,
        ];
    }
}


