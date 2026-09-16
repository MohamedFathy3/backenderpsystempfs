<?php

namespace App\Http\Resources\IT;

use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class TicketResource extends JsonResource
{
    public function toArray($request)
    {
        $category = DB::table('categories')
            ->where('id', $this->category_id)
            ->select('id', 'name', 'time', 'priority')
            ->first();
        return [
            'id' => $this->id,
            'ticketNumber' => $this->ticket_number ?? null,
            'title' => $this->title ?? null,
            'content' => $this->content ?? null,
            'status' => $this->status ?? null,

            'des' => $this->des ?? null,
            'avatar' => $this->avatar ?? null,

            'category' => $category ? [
                'id' => $category->id,
                'name' => $category->name,
                'time' => $category->time,
            ] : null,
            'openAt' => $this->open_at,
            'closeAt' => $this->close_at,
            'openAtformated' => $this->open_at ? $this->open_at->format('Y-M-d H:i:s A') : null,
            'closeAtformatted' => $this->close_at ? $this->close_at->format('Y-M-d H:i:s A') : null,
            'postponeNote' => $this->postpone_note ?? null,
            'priority' => $category->priority ?? null,
            'rating' => $this->rating ?? null,
            'etaTime' => $this->ata_time,
            'dailyTime' => $this->daily_time, // حساب الوقت المنقضي
            'dailyStatus' => $this->daily_status, // جلب الحالة اليومية
            'deviceId' => $this->device_id ?? null,
            'device' => new DeviceSimpleResource($this->device)  ?? null,
            'employeeId' => $this->employee_id ?? null,
            'employee' => new UserResource($this->employee)  ?? null,
            'responsibleId' => $this->help_desk_id ?? null,
            'responsibleName' => $this->helpDesk->name ?? null,
            'responsibleJobTitle' => $this->helpDesk->position->name ?? null,
            'responsibleEmail' => $this->helpDesk->email ?? null,
            'createdById' => $this->created_by_id ?? null,
            'createdByName' => $this->createdBy->name ?? null,
            'statuses' => TicketStatusResource::collection($this->statuses),
            'replies' => ReplyResource::collection($this->replies),


            'createdAt' => $this->created_at ? $this->created_at->format('Y-M-d H:i:s A') : null,
            'updatedAt' => $this->updated_at ? $this->updated_at->format('Y-M-d H:i:s A') : null,
            'deletedAt' => $this->deleted_at ? $this->deleted_at->format('Y-M-d H:i:s A') : null,
        ];
    }
}
