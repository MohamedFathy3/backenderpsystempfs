<?php

namespace App\Http\Requests\IT;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class GraphicCardRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

  public function rules(): array
    {
        $graphicCardId = $this->route('graphic_card') ? $this->route('graphic_card')->id : null;

        $uniqueRule = Rule::unique('graphic_cards')
            ->where(function ($query) {
                return $query->where('vram', $this->vram);
            });

        if ($graphicCardId) {
            $uniqueRule->ignore($graphicCardId);
        }

        return [
            'model' => [
                'required',
                'string',
                'max:255',
                $uniqueRule,
            ],
         'code' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('graphic_cards', 'code')->ignore($graphicCardId),
            ],
            'vram' => 'required|string|max:255',
        ];
    }
}
