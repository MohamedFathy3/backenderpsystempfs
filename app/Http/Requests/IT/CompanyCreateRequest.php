<?php

namespace App\Http\Requests\IT;

use App\Enums\CompanyType;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CompanyCreateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'type' => 'nullable|string|max:255',
            'phone' => 'nullable',
            'address' => 'nullable',
            'email' => 'nullable',
            'company_type' => 'nullable',
            'avatar' => ['nullable', 'image', 'max:2048'],
            'website' => 'nullable',
            'phone_key_id' => 'nullable|integer|exists:countries,id',
            'organization_id' => 'nullable|integer|exists:organizations,id',
            'city_id' => 'nullable|integer|exists:cities,id',
            'country_id' => 'nullable|integer|exists:countries,id',
            'code' => 'nullable|string|max:255|unique:companies,code',
        ];
    }
}
