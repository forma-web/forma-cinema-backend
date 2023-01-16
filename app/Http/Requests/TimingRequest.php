<?php

namespace App\Http\Requests;

class TimingRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'seek' => ['required_without:finished', 'numeric', 'min:0'],
            'finished' => ['required_without:seek', 'boolean'],
        ];
    }
}
