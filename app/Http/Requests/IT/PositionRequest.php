<?php

namespace App\Http\Requests\IT;

use Illuminate\Foundation\Http\FormRequest;

class PositionRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'code' => 'nullable|string|max:255|unique:positions,code',
            'name' => 'required|string|max:255|unique:positions,name',
        ];
    }
}
