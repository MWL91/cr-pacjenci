<?php

namespace App\Http\Controllers\Operations;

use App\Http\Controllers\Controller;
use App\Models\Operations;
use Illuminate\Http\Request;

class getNumberOfAllOperations extends Controller
{

    public static function getNumberOfAllOperations(Request $request): \Illuminate\Http\JsonResponse
    {
        $operationsCount = Operations::query()->count();
        $formattedCount = number_format($operationsCount, 0, '', ' ');
        return response()->json(['operations_count' => $formattedCount]);
    }

}
