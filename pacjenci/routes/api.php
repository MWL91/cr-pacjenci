<?php

use App\Http\Controllers\API\OperationsApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login',[OperationsApiController::class,'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('operations',[OperationsApiController::class,'getOperations']);
    Route::post('/logout', [OperationsApiController::class, 'logout']);
});


