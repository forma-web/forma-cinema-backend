<?php

namespace App\Http\Requests;

class UpdateSelectionRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['string', 'max:255'],
            'thumbnail' => ['nullable', 'string', 'max:255'],
        ];
    }
}
