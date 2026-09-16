<?php

namespace App\Http\Requests\IT;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentCreateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:departments,name',
            'description' => 'nullable|string',
            'code' => 'nullable|string|max:255|unique:departments,code',
        ];
    }
}

