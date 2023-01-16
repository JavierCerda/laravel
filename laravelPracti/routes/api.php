<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\BecaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/ 
Route::prefix('/alumnos')->group(function() {
    Route::get('', [AlumnoController::class, 'getAll']);
    Route::middleware('validate.id')->get('/{id}', [AlumnoController::class, 'getId']);
    Route::middleware('validate.id')->delete('/{id}', [AlumnoController::class, 'delete']);
    Route::middleware('validate.id')->get('/{id}/beca', [AlumnoController::class, 'beca']);
    Route::middleware('validate.id')->get('/{id}/aula', [AlumnoController::class, 'aula']);
    Route::post('', [AlumnoController::class, 'create']);
    Route::middleware('validate.id')->patch('/{id}', [AlumnoController::class, 'update']);
    //el patch lo que hace es que actualiza solo el valor introducido
});
Route::prefix('/aula')->group(function() {
    Route::get('', [AulaController::class, 'getAll']);
    Route::middleware('validate.id')->get('/{id}', [AulaController::class, 'getId']);
    Route::middleware('validate.id')->delete('/{id}', [AulaController::class, 'delete']);
    Route::middleware('validate.id')->get('/{id}/alumno', [AulaController::class, 'alumno']);
    Route::post('', [AulaController::class, 'create']);
    Route::middleware('validate.id')->patch('/{id}', [AulaController::class, 'update']);
    //el patch lo que hace es que actualiza solo el valor introducido
});
Route::prefix('/beca')->group(function() {
    Route::get('', [BecaController::class, 'getAll']);
    Route::middleware('validate.id')->get('/{id}', [BecaController::class, 'getId']);
    Route::middleware('validate.id')->delete('/{id}', [BecaController::class, 'delete']);
    Route::middleware('validate.id')->get('/{id}/alumno', [BecaController::class, 'alumno']);
    Route::post('', [BecaController::class, 'create']);
    Route::middleware('validate.id')->patch('/{id}', [BecaController::class, 'update']);
    //el patch lo que hace es que actualiza solo el valor introducido
});