<?php

namespace App\Http\Requests\IT;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProcessorRequest extends FormRequest
{
    public function rules(): array
    {
        $processorId = $this->route('processor');

        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('processors', 'name')->ignore($processorId)
            ],
            'code' => [
                    'nullable',
                    'string',
                    'max:255',
                    Rule::unique('processors', 'code')->ignore($processorId),
                ],
        ];
    }


    public function authorize(): bool
    {
        return true;
    }
}
