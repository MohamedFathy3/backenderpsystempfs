<?php

namespace App\Http\Requests\IT;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DeviceUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        $deviceId = $this->route('device');

        return [
            'type' => 'nullable|string',
            'serial_number' => [
                    'nullable',
                    'string',
                    Rule::unique('devices', 'serial_number')->ignore($deviceId)
             ],
            'condition' => 'nullable|in:new,used',
            'active' => 'nullable|boolean',
            'note' => 'nullable|string|max:255',
            'purchase_date' => 'nullable|date',
            'warranty_expire_date' => 'nullable|date',
            'device_status_id' => 'nullable',

            'screen_size' => 'nullable|string|max:255',
            //relation
            'user_id' => 'nullable|integer|exists:users,id',
            'company_id' => 'nullable|integer|exists:companies,id',
            'memory_id' => 'nullable|integer|exists:memories,id',
            'graphic_card_id' => 'nullable|integer|exists:graphic_cards,id',
            'processor_id' => 'nullable|integer|exists:processors,id',
            'brand_id' => 'nullable|integer|exists:brands,id',
            'device_model_id' => 'nullable|integer|exists:device_models,id',
            //relation
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
