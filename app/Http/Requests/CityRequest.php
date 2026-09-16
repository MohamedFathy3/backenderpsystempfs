<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
        return [
            'name' => 'sometimes|string|max:255|unique:cities,name',
            'country_id' => 'sometimes|exists:countries,id',
            'Locode' => 'nullable|string|size:5|unique:cities,Locode',
            'port_types' => 'nullable|array',
            'port_types.*' => 'in:Ocean,Air,Inland',
            'code' => 'nullable|string|max:255|unique:cities,code' ,
        ];
    }
}

