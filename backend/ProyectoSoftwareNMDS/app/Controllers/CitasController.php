<?php

namespace App\Http\Controllers;

use App\Services\CitasService;
use Illuminate\Http\Request;
use Exception;

class CitasController extends Controller
{
    protected $citasService;

    public function __construct(CitasService $citasService)
    {
        $this->citasService = $citasService;
    }

    public function store(Request $request)
    {
        try {
            return $this->citasService->crearCita($request->all());
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al crear cita', 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            return $this->citasService->obtenerCitaPorId($id);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al obtener cita', 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            return $this->citasService->actualizarCita($id, $request->all());
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al actualizar cita', 'message' => $e->getMessage()], 500);
        }
    }

    public function cancel($id)
    {
        try {
            return $this->citasService->cancelarCita($id);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al cancelar cita', 'message' => $e->getMessage()], 500);
        }
    }
}
