<?php

namespace App\Http\Requests\IT;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BrandCreateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $brandId = $this->route('brand');
        return [
            'name' => 'required|string|max:255|unique:brands,name',
            'code' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('brands', 'code')->ignore($brandId),
            ],
        ];
    }
}
