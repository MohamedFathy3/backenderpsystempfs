<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

     public function rules(): array
    {
        $cityId = $this->route('city'); // أو 'city' حسب اسم البارام في الروت

        return [
            'name' => [
                'sometimes',
                'string',
                'max:255',
                Rule::unique('cities', 'name')->ignore($cityId),
            ],
            'country_id' => 'sometimes|exists:countries,id',
            'Locode' => 'nullable|string|max:10',
            'port_types' => 'nullable|array',
            'port_types.*' => 'in:Ocean,Air,Inland',
        ];
    }
}
