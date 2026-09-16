<?php

namespace App\Http\Requests\IT;

use Illuminate\Foundation\Http\FormRequest;

class DeviceCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'type' => 'nullable|string',
            'serial_number' => 'nullable|string|max:255|unique:devices,serial_number',
            'condition' => 'nullable|in:new,used',
            'active' => 'nullable|boolean',
            'note' => 'nullable|string|max:255',
            'purchase_date' => 'nullable|date',
            'warranty_expire_date' => 'nullable|date',

            'screen_size' => 'nullable|string|max:255',
            //relation
            'device_status_id' => 'nullable',
            'user_id' => 'nullable|integer|exists:users,id',
            'company_id' => 'nullable|integer|exists:companies,id',
            'memory_id' => 'nullable|integer|exists:memories,id',
            'graphic_card_id' => 'nullable|integer|exists:graphic_cards,id',
            'processor_id' => 'nullable|integer|exists:processors,id',
            'brand_id' => 'nullable|integer|exists:brands,id',
            'device_model_id' => 'nullable|integer|exists:device_models,id',

             // العلاقة بين الجهاز والتخزين
             'storages' => 'nullable|array',
             'storages.*.storage_id' => 'required|integer|exists:storages,id',
             'storages.*.type' => 'nullable|string|max:255',

        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
