<?php

namespace App\Http\Controllers;

use App\Services\DoctoresService;
use Illuminate\Http\Request;
use Exception;

class DoctoresController extends Controller
{
    protected $doctoresService;

    public function __construct(DoctoresService $doctoresService)
    {
        $this->doctoresService = $doctoresService;
    }

    public function store(Request $request)
    {
        try {
            return $this->doctoresService->crearDoctor($request->all());
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al crear doctor', 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            return $this->doctoresService->obtenerDoctorPorId($id);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al obtener doctor', 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            return $this->doctoresService->actualizarDoctor($id, $request->all());
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al actualizar doctor', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            return $this->doctoresService->eliminarDoctor($id);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al eliminar doctor', 'message' => $e->getMessage()], 500);
        }
    }
}
