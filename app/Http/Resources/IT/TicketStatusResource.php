<?php

namespace App\Http\Resources\IT;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketStatusResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'status' => $this->status ?? null,
            'updatedById' => $this->updated_by_id ?? null,
            'updatedBy' => $this->updatedBy->name ?? null,
            'transferToId' => $this->transfer_to_id ?? null,
            'transferTo' => $this->transferTo->name ?? null,
            'note' => $this->note ?? null,
            'createdAt' => $this->created_at ? $this->created_at->format('Y-m-d H:i:s A') : null,
            'updatedAt' => $this->updated_at ? $this->updated_at->format('Y-m-d H:i:s A') : null,
            'duration' => $this->formattedDuration() ?? null,
        ];
    }


    private function formattedDuration()
    {
        if (!$this->duration) {
            return null;
        }

        $days = floor($this->duration / 1440);
        $hours = floor(($this->duration % 1440) / 60);
        $minutes = $this->duration % 60;

        $result = [];
        if ($days > 0) {
            $result[] = "{$days} D";
        }
        if ($hours > 0) {
            $result[] = "{$hours} H";
        }
        if ($minutes > 0) {
            $result[] = "{$minutes} M";
        }

        return implode(' , ', $result);
    }

}
