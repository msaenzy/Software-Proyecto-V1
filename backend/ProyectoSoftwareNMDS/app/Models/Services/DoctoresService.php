<?php

namespace App\Services;

use App\Doctores;
use Exception;

class DoctoresService
{
    public function crearDoctor($data)
    {
        try {
            $doctor = Doctores::create($data);
            return response()->json(['message' => 'Doctor creado exitosamente', 'data' => $doctor], 201);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al crear doctor', 'message' => $e->getMessage()], 500);
        }
    }

    public function obtenerDoctorPorId($id)
    {
        try {
            $doctor = Doctores::findOrFail($id);
            return response()->json(['data' => $doctor], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Doctor no encontrado', 'message' => $e->getMessage()], 404);
        }
    }

    public function actualizarDoctor($id, $data)
    {
        try {
            $doctor = Doctores::findOrFail($id);
            $doctor->update($data);
            return response()->json(['message' => 'Doctor actualizado exitosamente', 'data' => $doctor], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al actualizar doctor', 'message' => $e->getMessage()], 500);
        }
    }

    public function eliminarDoctor($id)
    {
        try {
            $doctor = Doctores::findOrFail($id);
            $doctor->delete();
            return response()->json(['message' => 'Doctor eliminado exitosamente'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al eliminar doctor', 'message' => $e->getMessage()], 500);
        }
    }
}
