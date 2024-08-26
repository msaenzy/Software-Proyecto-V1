<?php

namespace App\Http\Controllers;

use App\Services\CertificadosMedicosService;
use Illuminate\Http\Request;
use Exception;

class CertificadosMedicosController extends Controller
{
    protected $certificadosMedicosService;

    public function __construct(CertificadosMedicosService $certificadosMedicosService)
    {
        $this->certificadosMedicosService = $certificadosMedicosService;
    }

    public function store(Request $request)
    {
        try {
            return $this->certificadosMedicosService->crearCertificado($request->all());
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al crear certificado médico', 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            return $this->certificadosMedicosService->obtenerCertificadoPorId($id);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al obtener certificado médico', 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            return $this->certificadosMedicosService->actualizarCertificado($id, $request->all());
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al actualizar certificado médico', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            return $this->certificadosMedicosService->eliminarCertificado($id);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al eliminar certificado médico', 'message' => $e->getMessage()], 500);
        }
    }
}
