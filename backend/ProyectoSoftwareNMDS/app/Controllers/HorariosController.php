<?php

namespace App\Http\Controllers;

use App\Services\HorariosService;
use Illuminate\Http\Request;
use Exception;

class HorariosController extends Controller
{
    protected $horariosService;

    public function __construct(HorariosService $horariosService)
    {
        $this->horariosService = $horariosService;
    }

    public function store(Request $request)
    {
        try {
            return $this->horariosService->crearHorario($request->all());
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al crear horario', 'message' => $e->getMessage()], 500);
        }
    }

    public function show($dia)
    {
        try {
            return $this->horariosService->obtenerHorarioPorDia($dia);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al obtener horarios', 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            return $this->horariosService->actualizarHorario($id, $request->all());
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al actualizar horario', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            return $this->horariosService->eliminarHorario($id);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al eliminar horario', 'message' => $e->getMessage()], 500);
        }
    }
}
