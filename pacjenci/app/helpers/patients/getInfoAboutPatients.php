<?php

namespace App\helpers\patients;

use App\Http\Controllers\Patients\PatientsController;
use App\Models\Patients;

class getInfoAboutPatients extends PatientsController
{

    protected function getInfoAboutPatientsHelpers($id): array
    {

        $result =
            Patients::query()
                ->join('operations', 'patients.phone', '=', 'operations.phone')
                ->where('operations.id', '=', $id)
                ->first(['patients.fullname', 'patients.phone', 'operations.extrainfo', 'operations.date_start', 'operations.operationsPerformed', 'operations.priority']);

        return ['fullname' => $result->fullname, 'phone' => $result->phone, 'extrainfo' => $result->extrainfo,
            'operationsPerformed' => $result->operationsPerformed, 'priority' => $result->priority, 'dateOfOperations' => substr($result->date_start, 0, 16)];
    }


}
