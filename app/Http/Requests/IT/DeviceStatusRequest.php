<?php

namespace App\Http\Requests\IT;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DeviceStatusRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $brandId = $this->route('device_status');
        return [
            'name' => 'required|string|max:255|unique:device_statuses,name',
            'description' => 'nullable|string',
            'code' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('device_statuses', 'code')->ignore($brandId),
            ],
        ];
    }
}
