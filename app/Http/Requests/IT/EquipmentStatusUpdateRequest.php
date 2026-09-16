<?php

namespace App\Http\Requests\IT;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EquipmentStatusUpdateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $brandId = $this->route('equipment-status');

        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('equipment_statuses', 'name')->ignore($brandId)
            ],
        ];
    }

}
