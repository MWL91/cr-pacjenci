<?php

namespace App\Services;

use App\Services\Interfaces\Collection;
use App\Services\Interfaces\OperationServiceContract;

class OperationService implements OperationServiceContract
{
    private OperationRepositoryContract $operationRepository;

    public function __construct(OperationRepositoryContract $operationRepository)
    {
        $this->operationRepository = $operationRepository;
    }

    public function getOperations(): Collection
    {
        return $this->operationRepository->getAll();
    }
}
