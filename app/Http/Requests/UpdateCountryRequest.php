<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCountryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $countryId = $this->route('country')?->id ?? $this->route('country');

        return [
            'name' => ['sometimes', 'string', 'max:255'],
            'key' => ['sometimes', 'string', 'max:10'],
            'code' => ['nullable', 'string', 'max:10', Rule::unique('countries', 'code')->ignore($countryId)],
            'icon' => ['nullable', 'string', 'max:255'],
            'order_id' => ['nullable', 'integer', 'min:0'],
            'active' => ['nullable', 'boolean'],
        ];
    }
}
