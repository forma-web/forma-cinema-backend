<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegistrationUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    /**
     * @param \App\Http\Requests\RegistrationUserRequest $request
     * @return \App\Http\Resources\UserResource
     */
    public function registration(RegistrationUserRequest $request): UserResource
    {
        $credentials = collect($request->validated());

        $user = User::create(
            $credentials
                ->replaceByKey('password', fn($p) => Hash::make($p))
                ->all()
        );

        /** @var string $token */
        $token = auth()->login($user);

        return (new UserResource($user))->additional([
            'meta' => $this->withToken($token)
        ]);
    }

    public function login(LoginUserRequest $request): UserResource
    {
        $credentials = collect($request->validated());

        abort_if(
            !$token = auth()->attempt($credentials->all()),
            401,
            'Unauthorized'
        );

        return (new UserResource(auth()->user()))->additional([
            'meta' => $this->withToken($token)
        ]);
    }

    /**
     * @return void
     */
    public function logout(): void
    {
        auth()->logout();

        response()->noContent();
    }

    /**
     * @return \App\Http\Resources\UserResource
     */
    public function current(): UserResource
    {
        return new UserResource(auth()->user());
    }

    /**
     * @return void
     */
    public function refresh(): void
    {
        /** @var string $token */
        $token = auth()->refresh();

        response()->json([
            'meta' => $this->withToken($token)
        ]);
    }

    /**
     * @param string $token
     * @return array
     */
    private function withToken(string $token): array
    {
        return [
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
        ];
    }
}
