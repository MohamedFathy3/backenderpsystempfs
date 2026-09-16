<?php

namespace App\Http\Requests\IT;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class DeviceModelRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $deviceModelId = $this->route('device_model');

        return [
            'name' => array_filter([
                'required',
                'string',
                'max:255',
                $deviceModelId
                    ? Rule::unique('device_models')->where(fn ($query) => $query->where('brand_id', $this->input('brand_id')))->ignore($deviceModelId)
                    : Rule::unique('device_models')->where(fn ($query) => $query->where('brand_id', $this->input('brand_id')))
            ]),
            'code' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('device_models', 'code')->ignore($deviceModelId),
            ],
            'brand_id' => 'nullable|exists:brands,id',
        ];
    }

}

