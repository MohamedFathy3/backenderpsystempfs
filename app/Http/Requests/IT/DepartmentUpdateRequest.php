<?php

namespace App\Http\Requests\IT;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DepartmentUpdateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $departmentId = $this->route('department');

        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('departments', 'name')->ignore($departmentId)
            ],
            'description' => 'nullable|string',
             'code' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('departments', 'code')->ignore($departmentId)
            ],
        ];
    }

}
