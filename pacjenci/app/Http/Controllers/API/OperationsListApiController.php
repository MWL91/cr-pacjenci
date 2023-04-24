<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Operations;
use App\Models\Patients;
use App\Requests\API\LoginApiRequest;
use App\Services\Interfaces\AuthServiceContract;
use App\Services\Interfaces\OperationServiceContract;
use App\ValueObjects\Operation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OperationsListApiController extends Controller
{
    private OperationServiceContract $operationService;

    public function __construct(OperationServiceContract $operationService)
    {
        $this->operationService = $operationService;
    }

    public function __invoke(): JsonResponse
    {
        $operations = $this->operationService->getOperations();

        return new JsonResponse($operations->map(function (Operation $operation) {
            return [
                '#' => $operation->getId(),
                'Imię i Nazwisko' => $operation->getFullname(),
                'Telefon' => $operation->getPhone(),
                'Data operacji' => $operation->getDateStart()->toDateTimeString(),
            ];
        }), 200);
    }


}
