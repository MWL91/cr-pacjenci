<?php

namespace App\Services\operations;

use App\Models\Operations;

class createOperationService
{

    /**
     * @param $request
     * @return bool
     */
    public function store($request): bool
    {
        $operation = Operations::query()->create([
            'fullname' => $request->fullname,
            'phone' => $request->phone,
            'group_id' => $request->group_id,
            'priority' => $request->priority,
            'extrainfo' => $request->extrainfo,
            'operationsPerformed' => 'oczekująca',
            'date_start' => $request->date,
            'date_end' => date('Y-m-d', strtotime($request->date . ' +1 day')),
        ]);

        return $operation->wasRecentlyCreated;
    }

}
