<?php

namespace App\Http\Resources\IT;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class LogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        $user = null;
        $user = DB::table('users')->where('id', $this->causer_id)->value('name');

        $attributes = json_decode($this->properties, true)['attributes'] ?? null;
        $ip = $request->ip();

        return [
            'id' => $this->id,
            'description' => $this->description ?? null,
            'module' => class_basename($this->subject_type) ?? null,
            'recordID' => $this->subject_id ?? null,
            'causerModule' => $this->causer_type ? class_basename($this->causer_type) : null,
            'causer' => $user ?? null,
            'ip' => $ip,
            'properties' => $attributes ?? null,
            'date' => $this->created_at ? date('Y-M-d', strtotime($this->created_at)) : null,
            'time' => $this->created_at ? date('H:i:s A', strtotime($this->created_at)) : null,
        ];
    }
}
