<?php

namespace App\Http\Requests\IT;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PositionUpdateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $brandId = $this->route('position');

        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('positions', 'name')->ignore($brandId)
            ],
            'code' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('positions', 'code')->ignore($brandId)
            ],
        ];
    }

}
