<?php

namespace App\Http\Controllers\Operations;

use App\Http\Controllers\Controller;
use App\Models\Operations;
use Illuminate\Http\Request;

class getInfoAboutOperationsToday extends Controller
{

    public function getInfoAboutOperationsToday(Request $request): \Illuminate\Http\JsonResponse
    {

        $result = Operations::query()
            ->join('patients', 'operations.phone', '=', 'patients.phone')
            ->join('patients_groups', 'operations.group_id', '=', 'patients_groups.id')
            ->select('patients.fullname', 'patients.phone', 'patients_groups.name', 'operations.extrainfo', 'operations.priority')
            ->where('date_start', 'like', date('Y-m-d') . '%')
            ->get();

        return response()->json(['number' => $result->count(), 'patients' => $result]);

    }

}
