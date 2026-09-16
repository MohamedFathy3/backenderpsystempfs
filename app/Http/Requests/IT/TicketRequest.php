<?php

namespace App\Http\Requests\IT;

use App\Enums\TicketPriority;
use App\Enums\TicketStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class TicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'ticket_number' => random_int(100000, 999999),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ticket_number' => 'required|numeric|digits:6|unique:tickets,ticket_number',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'open_at' => 'nullable',
            'close_at' => 'nullable',

            'postpone_note' => 'nullable|string',
            'des' => 'nullable|string',
            'status' => 'nullable|string|in:' . implode(',', TicketStatus::values()),

            'avatar' => ['nullable', 'image', 'max:2048'],

            'category_id' => 'required|exists:categories,id',
            'employee_id' => 'nullable|exists:users,id',
            'help_desk_id' => 'nullable|exists:users,id',
            'created_by_id' => 'nullable|exists:users,id',
            'device_id' => 'nullable|exists:devices,id',
            'priority' => 'nullable|string',
            'rating' => 'nullable|integer',

        ];
    }
}
