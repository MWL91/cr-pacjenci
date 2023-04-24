<?php

namespace App\Services\Interfaces;

use App\Http\Middleware\Authenticate;
use App\ValueObjects\AuthToken;

interface AuthServiceContract
{
    /**
     * @param string $email
     * @param string $password
     * @return AuthToken
     * @throws \RuntimeException
     */
    public function authorize(string $email, string $password): AuthToken;

    public function logout(Authenticable $user): void;
}
