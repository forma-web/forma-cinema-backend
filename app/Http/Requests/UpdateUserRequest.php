<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['string', 'max:255'],
            'second_name' => ['string', 'max:255'],
            'phone' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255', 'unique:users'],
            'password' => ['string', Password::min(8), 'max:255'],
            'latest_password' => ['required_with:password', 'string', 'current_password'],
        ];
    }
}
