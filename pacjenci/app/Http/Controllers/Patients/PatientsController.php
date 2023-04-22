<?php

namespace App\Http\Controllers\Patients;

use App\helpers\patients\getInfoAboutPatients;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientsController extends Controller
{

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view ('patients.base-patients.base-patients');
    }

    public function getInfoAboutPatients(Request $request,getInfoAboutPatients $helper): \Illuminate\Http\JsonResponse
    {
        return response()->json($helper->getInfoAboutPatientsHelpers($request->id));
    }


}
