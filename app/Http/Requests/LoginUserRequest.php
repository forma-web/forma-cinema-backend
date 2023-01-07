<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rules\Password;

class LoginUserRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email', 'max:255', 'exists:users'],
            'password' => ['required', 'string', Password::min(8)],
        ];
    }
}
