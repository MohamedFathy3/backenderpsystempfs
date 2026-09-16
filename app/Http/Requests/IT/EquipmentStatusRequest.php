<?php

namespace App\Http\Requests\IT;

use Illuminate\Foundation\Http\FormRequest;

class EquipmentStatusRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:equipment_statuses,name',
        ];
    }
}
