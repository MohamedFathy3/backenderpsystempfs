<?php

namespace App\Http\Requests\IT;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class MemoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $memoryId = $this->route('memory');

        return [
            'size' => [
                'required',
                'integer',
                'min:1',
                Rule::unique('memories')
                    ->where(fn ($query) => $query->where('type', $this->input('type')))
                    ->ignore($memoryId)
            ],
            'code' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('memories', 'code')->ignore($memoryId),
            ],
            'type' => 'required|string|max:255',
        ];
    }

}
