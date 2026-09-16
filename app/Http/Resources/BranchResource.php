<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BranchResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name ?? null,
            'code' => $this->code ?? null,
            'local_name' => $this->local_name ?? null,
            'phone' => $this->phone ?? null,
            'phone_two' => $this->phone_two ?? null,
            'mobile' => $this->mobile ?? null,
            'fax' => $this->fax ?? null,
            'address' => $this->address ?? null,
            'zip_code' => $this->zip_code ?? null,
            'alias_name' => $this->alias_name ?? null,
            'branche_type' => $this->branche_type ?? null,
            'notes' => $this->notes ?? null,
            'active' => $this->active ?? null,
            'company_id' => $this->company_id ?? null,
            'company' => $this->company->name ?? null,
            'cityName' => $this->city->name ?? null,
            'cityId' => $this->city->id ?? null,
            'city' => $this->city ?? null,
            'countryId' => $this->country->id ?? null,
            'countryName' => $this->country->name ?? null,
            'country' => $this->country->name ?? null,
            'phone_key_id' => $this->phone_key_id ?? null,
        ];
    }
}

