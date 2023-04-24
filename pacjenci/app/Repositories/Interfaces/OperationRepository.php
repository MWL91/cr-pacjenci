<?php

namespace App\Repositories\Interfaces;

interface OperationRepository
{
    public function getAll(): Collection;
}
