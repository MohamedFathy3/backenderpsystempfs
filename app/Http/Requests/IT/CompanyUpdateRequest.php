<?php

namespace App\Http\Requests\IT;

use App\Enums\CompanyType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyUpdateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $companyId = $this->route('company');

        return [
            'name' => 'required|string|max:255',
            'type' => 'nullable|string|max:255',
            'phone' => 'nullable',
            'address' => 'nullable',
            'avatar' => ['nullable', 'image', 'max:2048'],
            'email' => 'nullable',
            'company_type' => 'nullable',
            'website' => 'nullable',
            'phone_key_id' => 'nullable',
            'city_id' => 'nullable',
            'country_id' => 'nullable',
            'organization_id' => 'nullable',
            'code' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('companies', 'code')->ignore($companyId)
            ],
        ];
    }
}
