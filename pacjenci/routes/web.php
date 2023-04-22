<?php


use App\Http\Controllers\Operations\getInfoAboutOperationsToday;
use App\Http\Controllers\Operations\getNumberOfAllOperations;
use App\Http\Controllers\Operations\OperationsController;
use App\Http\Controllers\Patients\AddPatientsController;
use App\Http\Controllers\Patients\getNumberOfAllPatientsController;
use App\Http\Controllers\Patients\PatientsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::GET('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| Web Routes after correct auth
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {


    // Dashboard
    Route::GET('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::GET('AllNumberOfPatients', [getNumberOfAllPatientsController::class, 'getNumberOfAllPatients']);
    Route::GET('AllNumberOfOperations', [getNumberOfAllOperations::class, 'getNumberOfAllOperations']);
    Route::GET('getInfoAboutOperationsToday', [getInfoAboutOperationsToday::class, 'getInfoAboutOperationsToday']);


    // Add patients to Database
    Route::controller(AddPatientsController::class)->group(function(){
        Route::GET('/add/patients', 'render')->name('add/patients');
        Route::POST('addPatient', 'store');
        Route::POST('checkExistPatient', 'checkExistPatient');
    });

    // All Patients
    Route::controller(PatientsController::class)->group(function(){
        Route::GET('patients', 'render')->name('patients');
        Route::GET('getInfoAboutPatients', 'getInfoAboutPatients')->name('getInfoAboutPatients');
    });

    Route::controller(OperationsController::class)->group(function(){
        Route::POST('assignPatientToOperation', 'assignPatientToOperation');
    });



});
