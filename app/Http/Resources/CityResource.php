<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'active' => $this->active,
            'code' => $this->code,
            'country_id' => $this->country_id,
            'country' => new CountryResource($this->country),
            'port_types' => $this->port_types,
            'Locode' => $this->Locode,
        ];
    }
}
