<?php

use Illuminate\Http\Request;
use App\Http\Controllers\CertificadosMedicosController;
use App\Http\Controllers\DoctoresController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\HorariosController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware(['auth:api'])->group(function () {
    // Rutas para Certificados Médicos
    Route::get('/certificados-medicos', [CertificadosMedicosController::class, 'index']);
    Route::post('/certificados-medicos', [CertificadosMedicosController::class, 'store']);
    Route::get('/certificados-medicos/{id}', [CertificadosMedicosController::class, 'show']);
    Route::put('/certificados-medicos/{id}', [CertificadosMedicosController::class, 'update']);
    Route::delete('/certificados-medicos/{id}', [CertificadosMedicosController::class, 'destroy']);

    // Rutas para Doctores
    Route::get('/doctores', [DoctoresController::class, 'index']);
    Route::post('/doctores', [DoctoresController::class, 'store']);
    Route::get('/doctores/{id}', [DoctoresController::class, 'show']);
    Route::put('/doctores/{id}', [DoctoresController::class, 'update']);
    Route::delete('/doctores/{id}', [DoctoresController::class, 'destroy']);

    // Rutas para Pacientes
    Route::get('/pacientes', [PacientesController::class, 'index']);
    Route::post('/pacientes', [PacientesController::class, 'store']);
    Route::get('/pacientes/{id}', [PacientesController::class, 'show']);
    Route::put('/pacientes/{id}', [PacientesController::class, 'update']);
    Route::delete('/pacientes/{id}', [PacientesController::class, 'destroy']);

    // Rutas para Citas
    Route::get('/citas', [CitasController::class, 'index']);
    Route::post('/citas', [CitasController::class, 'store']);
    Route::get('/citas/{id}', [CitasController::class, 'show']);
    Route::put('/citas/{id}', [CitasController::class, 'update']);
    Route::post('/citas/{id}/cancel', [CitasController::class, 'cancel']);
    Route::delete('/citas/{id}', [CitasController::class, 'destroy']);

    // Rutas para Horarios
    Route::get('/horarios', [HorariosController::class, 'index']);
    Route::post('/horarios', [HorariosController::class, 'store']);
    Route::get('/horarios/{dia}', [HorariosController::class, 'show']);
    Route::put('/horarios/{id}', [HorariosController::class, 'update']);
    Route::delete('/horarios/{id}', [HorariosController::class, 'destroy']);
});
