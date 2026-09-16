<?php

namespace App\Http\Requests\IT;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DeviceStatusUpdateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $brandId = $this->route('device_status');

        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('device_statuses', 'name')->ignore($brandId)
            ],
            'code' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('device_statuses', 'code')->ignore($brandId),
            ],
            'description' => 'nullable|string',
        ];
    }

}

