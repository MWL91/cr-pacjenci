<?php

namespace App\helpers\patients;

use App\Http\Controllers\Patients\AddPatientsController;
use App\Models\Operations;
use App\Models\Patients;
use App\Models\PatientsGroup;

class patientsHelpers extends AddPatientsController
{

    protected function getPatientsGroup(): \Illuminate\Database\Eloquent\Collection
    {
        return PatientsGroup::all();
    }

    protected function addPatientToDatabase($fullname, $phone): bool
    {
        $patient = Patients::query();

        if(!$patient->where('phone', '=', $phone)->exists()){

            $result = Patients::query()->create([
                'fullname' => $fullname,
                'phone' => $phone
            ]);

        }else {
            return false;
        }

       return (bool)$result->wasRecentlyCreated;
    }


}
