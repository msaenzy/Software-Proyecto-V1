<?php

namespace App\Http\Controllers;

use App\Services\PacientesService;
use Illuminate\Http\Request;
use Exception;

class PacientesController extends Controller
{
    protected $pacientesService;

    public function __construct(PacientesService $pacientesService)
    {
        $this->pacientesService = $pacientesService;
    }

    public function store(Request $request)
    {
        try {
            return $this->pacientesService->crearPaciente($request->all());
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al crear paciente', 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            return $this->pacientesService->obtenerPacientePorId($id);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al obtener paciente', 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            return $this->pacientesService->actualizarPaciente($id, $request->all());
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al actualizar paciente', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            return $this->pacientesService->eliminarPaciente($id);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al eliminar paciente', 'message' => $e->getMessage()], 500);
        }
    }
}
