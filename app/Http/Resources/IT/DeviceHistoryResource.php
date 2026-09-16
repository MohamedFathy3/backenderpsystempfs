<?php

namespace App\Http\Resources\IT;

use App\Enums\ActionType;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class DeviceHistoryResource extends JsonResource
{
    protected $users;

    public function __construct($resource, $users = [])
    {
        parent::__construct($resource);
        $this->users = $users;
    }

    public function toArray($request): array
    {
        return [
            'id' => $this->id ?? null,
            'employee_id' => $this->employee_id ?? null,
            'employee_name' => optional(\App\Models\User::find($this->employee_id))->name,
            'help_desk_id' => $this->help_desk_id ?? null,
            'help_desk_name' => optional(\App\Models\User::find($this->help_desk_id))->name,
            'action_type' => ActionType::tryFrom($this->action_type)?->label() ?? $this->action_type,
            'note' => $this->note ?? null,
            'createdAt' => $this->created_at ? $this->created_at->format('Y-M-d H:i:s A') : null,
        ];
    }
}
