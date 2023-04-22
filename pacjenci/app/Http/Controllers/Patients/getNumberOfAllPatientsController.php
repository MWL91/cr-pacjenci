<?php

namespace App\Http\Controllers\Patients;

use App\Http\Controllers\Controller;
use App\Models\Patients;
use Illuminate\Http\Request;

class getNumberOfAllPatientsController extends Controller
{

    public static function getNumberOfAllPatients(): \Illuminate\Http\JsonResponse
    {
        $patientsCount = Patients::query()->count();
        $formattedCount = number_format($patientsCount, 0, '', ' ');
        return response()->json(['patients_count' => $formattedCount]);
    }

}
