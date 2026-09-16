<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'nullable|string',
            'code' => 'nullable|string',
            'local_name' => 'nullable|string',
            'phone' => 'nullable|string',
            'phone_two' => 'nullable|string',
            'mobile' => 'nullable|string',
            'fax' => 'nullable|string',
            'address' => 'nullable|string',
            'zip_code' => 'nullable|string',
            'alias_name' => 'nullable|string',
            'branche_type' => 'nullable|string',
            'notes' => 'nullable|string',
            'active' => 'nullable|boolean',
            'company_id' => 'required|integer|exists:companies,id',
            'city_id' => 'nullable|integer|exists:cities,id',
            'country_id' => 'nullable|integer|exists:countries,id',
            'phone_key_id' => 'nullable|integer|exists:countries,id',
        ];
    }
}
