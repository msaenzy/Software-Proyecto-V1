<?php

namespace App\Services;

use App\Models\Citas;
use Exception;

class CitasService
{
    public function crearCita($data)
    {
        try {
            $cita = Citas::create($data);
            return response()->json(['message' => 'Cita creada exitosamente', 'data' => $cita], 201);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al crear cita', 'message' => $e->getMessage()], 500);
        }
    }

    public function obtenerCitaPorId($id)
    {
        try {
            $cita = Citas::findOrFail($id);
            return response()->json(['data' => $cita], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Cita no encontrada', 'message' => $e->getMessage()], 404);
        }
    }

    public function actualizarCita($id, $data)
    {
        try {
            $cita = Citas::findOrFail($id);
            $cita->update($data);
            return response()->json(['message' => 'Cita actualizada exitosamente', 'data' => $cita], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al actualizar cita', 'message' => $e->getMessage()], 500);
        }
    }

    public function cancelarCita($id)
    {
        try {
            $cita = Citas::findOrFail($id);
            $cita->update(['anulada' => true]);
            return response()->json(['message' => 'Cita cancelada exitosamente'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al cancelar cita', 'message' => $e->getMessage()], 500);
        }
    }
}
