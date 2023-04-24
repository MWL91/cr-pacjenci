<?php

namespace App\Services;

use App\Services\Interfaces\Authenticable;
use App\Services\Interfaces\AuthServiceContract;
use App\ValueObjects\AuthToken;
use Illuminate\Support\Facades\Auth;

class AuthService implements AuthServiceContract
{
    /**
     * @param string $email
     * @param string $password
     * @return AuthToken
     * @throws \RuntimeException
     */
    public function authorize(string $email, string $password): AuthToken
    {
        if(!Auth::attempt(['email' => $email, 'password' => $password])) {
            throw new \RuntimeException('Invalid credentials');
        }

        $user = Auth::user();
        $user->tokens()->delete();

        $token =  $user->createToken('OperationsAPI')->plainTextToken;
        return new AuthToken($token);
    }

    public function logout(Authenticable $user): void
    {
        $user->currentAccessToken()->delete();
    }
}
