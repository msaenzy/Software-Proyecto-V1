<?php

namespace App\Services;

use App\Models\CertificadosMedicos;
use Exception;

class CertificadosMedicosService
{
    public function crearCertificado($data)
    {
        try {
            $certificado = CertificadosMedicos::create($data);
            return response()->json(['message' => 'Certificado médico creado exitosamente', 'data' => $certificado], 201);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al crear certificado médico', 'message' => $e->getMessage()], 500);
        }
    }

    public function obtenerCertificadoPorId($id)
    {
        try {
            $certificado = CertificadosMedicos::findOrFail($id);
            return response()->json(['data' => $certificado], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Certificado no encontrado', 'message' => $e->getMessage()], 404);
        }
    }

    public function actualizarCertificado($id, $data)
    {
        try {
            $certificado = CertificadosMedicos::findOrFail($id);
            $certificado->update($data);
            return response()->json(['message' => 'Certificado médico actualizado exitosamente', 'data' => $certificado], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al actualizar certificado médico', 'message' => $e->getMessage()], 500);
        }
    }

    public function eliminarCertificado($id)
    {
        try {
            $certificado = CertificadosMedicos::findOrFail($id);
            $certificado->delete();
            return response()->json(['message' => 'Certificado médico eliminado exitosamente'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al eliminar certificado médico', 'message' => $e->getMessage()], 500);
        }
    }
}
