<?php

namespace App\Http\Requests\IT;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TypeRequest extends FormRequest
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
        $storageId = $this->route('type') ? $this->route('type')->id : null;
        return [
            'name' => [
                'required',
                'string',
                Rule::unique('types')
                    ->ignore($storageId)
                    ->where(fn($query) => $query->where('type', $this->type)),
            ],
            'type' => 'nullable|string|max:255',

            'code' => [
                            'nullable',
                            'string',
                            'max:255',
                            Rule::unique('types')->ignore($storageId),
                        ],
    ];
    }
}

