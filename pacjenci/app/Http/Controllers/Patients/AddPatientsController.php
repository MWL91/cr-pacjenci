<?php

namespace App\Http\Controllers\Patients;

use App\helpers\patients\patientsHelpers;
use App\Http\Controllers\Controller;
use App\Models\Patients;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;

class AddPatientsController extends Controller
{

    public function render(patientsHelpers $helpers): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view ('patients.add-patients.add-patients',
            [
                'PatientsGroup' => $helpers->getPatientsGroup()
            ]);
    }

    protected function store(Request $request, patientsHelpers $helpers): \Illuminate\Http\JsonResponse
    {
        // Patient Details
        $fullname = $request->input('fullname');
        $phone = $request->input('phone');

        // Add patient
        $resultAddPatient = $helpers->addPatientToDatabase($fullname, $phone);

        // Return response
        $event['status'] = $resultAddPatient;
        return response()->json($event);
    }

    protected function checkExistPatient(Request $request): \Illuminate\Http\JsonResponse
    {
        $result = Patients::query()->where('phone', '=', $request->input('phone'))->exists();

        // Return response
        $event['status'] = $result;
        return response()->json($event);
    }




}
