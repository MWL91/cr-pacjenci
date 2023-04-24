<?php

namespace App\Http\Controllers\API;

use App\Requests\API\LoginApiRequest;
use App\Services\Interfaces\AuthServiceContract;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthApiController
{

    private AuthServiceContract $authService;

    public function __construct(AuthServiceContract $authService)
    {
        $this->authService = $authService;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function logout(Request $request): JsonResponse
    {
        $this->authService->logout($request->user());

        return new JsonResponse(['message' => 'Logged out successfully'], 200);
    }

    /**
     * @param LoginApiRequest $request
     * @return Response
     */
    public function login(LoginApiRequest $request): JsonResponse
    {
        try {
            $authorizeToken = $this->authService->authorize($request->getEmail(), $request->getPassword());
        } catch (\RuntimeException $e) {
            return new JsonResponse(['message' => $e->getMessage()], 401);
        }

        return new JsonResponse(['token' => $authorizeToken->getToken()]);
    }
}
