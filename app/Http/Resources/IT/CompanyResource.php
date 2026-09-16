<?php

namespace App\Http\Resources\IT;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'code' => $this->code ?? null,
            'address' => $this->address,
            'email' => $this->email,
            'avatar' => $this->avatar ?? null,
            'company_type' => $this->company_type ?? null,
            'website' => $this->website,
            'phone_key_id' => $this->phone_key_id,
            'type' => $this->type,
            'cityId' => $this->city_id ?? null,
            'countryId' => $this->country_id ?? null,
            'city' => $this->city?->name,
            'country' => $this->country?->name,
            'organizationId' => $this->organization_id ?? null,
            'organization' => $this->organization ? new OrganizationResource($this->organization) : null,
            'departments' => DepartmentResource::collection($this->whenLoaded('departments')),
        ];
    }
}


