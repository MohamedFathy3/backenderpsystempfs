<?php

namespace App\Http\Requests\IT;

use Illuminate\Foundation\Http\FormRequest;

class UserManyRequest extends FormRequest
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
            '*.name' => 'required|string',
            '*.email' => 'required|email|unique:users,email',
            '*.position_id' => 'nullable',
            '*.phone' => 'nullable|string',
            '*.phone_ext' => 'nullable|string',
            '*.cell' => 'nullable|string',
            '*.active' => 'nullable|boolean',
            '*.role' => 'nullable|in:employee,help_desk,admin',
            '*.password' => 'required|string|min:6',
            '*.department_id' => 'required|integer|exists:departments,id',
            '*.company_id' => 'required|integer|exists:companies,id',
        ];
    }
}
