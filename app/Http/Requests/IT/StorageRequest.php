<?php

namespace App\Http\Requests\IT;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class StorageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $storageId = $this->route('storage') ? $this->route('storage')->id : null;

        return [
            'size' => [
                'required',
                'integer',
                'min:1',
                Rule::unique('storages')
                    ->ignore($storageId)
                    ->where(fn($query) => $query->where('type', $this->type)),
            ],
            'code' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('storages', 'code')->ignore($storageId),
            ],
            'type' => 'required|string|max:255',
        ];
    }
}


