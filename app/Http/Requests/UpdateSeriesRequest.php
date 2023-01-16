<?php

namespace App\Http\Requests;

class UpdateSeriesRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'description' => ['string', 'max:280'],
            'poster' => ['string', 'max:1000'],
        ];
    }
}
