<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\CertificadosMedicos;

class CertificadosMedicosTest extends TestCase
{
    public function testCrearCertificado()
    {
        $data = [
            'fecha' => '2024-08-25',
            'descripcion' => 'Chequeo anual',
        ];

        $response = $this->post('/api/certificados-medicos', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('certificados_medicos', ['descripcion' => 'Chequeo anual']);
    }
}
