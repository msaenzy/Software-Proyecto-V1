<?php

namespace App\Services;

use App\Models\Pacientes;
use Exception;

class PacientesService
{
    public function crearPaciente($data)
    {
        try {
            $paciente = Pacientes::create($data);
            return response()->json(['message' => 'Paciente creado exitosamente', 'data' => $paciente], 201);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al crear paciente', 'message' => $e->getMessage()], 500);
        }
    }

    public function obtenerPacientePorId($id)
    {
        try {
            $paciente = Pacientes::findOrFail($id);
            return response()->json(['data' => $paciente], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Paciente no encontrado', 'message' => $e->getMessage()], 404);
        }
    }

    public function actualizarPaciente($id, $data)
    {
        try {
            $paciente = Pacientes::findOrFail($id);
            $paciente->update($data);
            return response()->json(['message' => 'Paciente actualizado exitosamente', 'data' => $paciente], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al actualizar paciente', 'message' => $e->getMessage()], 500);
        }
    }

    public function eliminarPaciente($id)
    {
        try {
            $paciente = Pacientes::findOrFail($id);
            $paciente->delete();
            return response()->json(['message' => 'Paciente eliminado exitosamente'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al eliminar paciente', 'message' => $e->getMessage()], 500);
        }
    }
}
