<?php

namespace App\Http\Requests;

class StoreGenreRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:1', 'max:255', 'unique:genres'],
        ];
    }
}
