<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Operations;
use App\Models\Patients;
use App\Requests\API\LoginApiRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OperationsApiController extends Controller
{

    /**
     * @param LoginApiRequest $request
     * @return Response
     */

    public function login(LoginApiRequest $request): Response
    {
        if(Auth::attempt($request->validated())){

            $user = Auth::user();
            $user->tokens()->delete();

            $token =  $user->createToken('OperationsAPI')->plainTextToken;

            return response(['token' => $token], 200);
        }

        return response(['message' => 'Wrong login or email'], 401);
    }

    public function getOperations(): Response
    {
        $operations = Patients::query()
            ->join('operations', 'patients.phone', '=', 'operations.phone')
            ->get(['operations.id', 'patients.fullname', 'operations.phone', 'operations.date_start']);

        $formattedOperations = $operations->map(function ($operation) {
            return [
                '#' => $operation->id,
                'Imię i Nazwisko' => $operation->fullname,
                'Telefon' => '+'.$operation->phone,
                'Data operacji' => $operation->date_start,
            ];
        });

        return response($formattedOperations, 200);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function logout(Request $request): Response
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();

        return response(['message' => 'Logged out successfully'], 200);
    }


}
