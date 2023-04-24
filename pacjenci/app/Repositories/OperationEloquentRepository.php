<?php

namespace App\Repositories;

use App\Models\Patients;
use App\Repositories\Interfaces\Collection;
use App\Repositories\Interfaces\OperationRepository;
use App\ValueObjects\Operation;

class OperationEloquentRepository implements OperationRepository
{

    public function getAll(): Collection
    {
        return Patients::query()
            ->join('operations', 'patients.phone', '=', 'operations.phone')
            ->get(['operations.id', 'patients.fullname', 'operations.phone', 'operations.date_start'])
            ->map(fn($operation) => new Operation(
                $operation->getKey(),
                $operation->fullname,
                $operation->phone,
                $operation->date_start
            ));
    }
}
