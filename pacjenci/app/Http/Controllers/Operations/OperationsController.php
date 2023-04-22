<?php

namespace App\Http\Controllers\Operations;

use App\Http\Controllers\Controller;
use App\Services\operations\createOperationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OperationsController extends Controller
{

    /**
     * @param Request $request
     * @return JsonResponse
     */

    public function assignPatientToOperation(Request $request): JsonResponse
    {
        // Call service
        $service = app(createOperationService::class)->store($request);

        return response()->json(["status" => $service]);
    }

}
