<?php

namespace App\Http\Requests\IT;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BrandUpdateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $brandId = $this->route('brand');

        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('brands', 'name')->ignore($brandId)
            ],
            'code' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('brands', 'code')->ignore($brandId),
            ],
        ];
    }

}
