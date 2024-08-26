<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Pacientes;

class PacientesTest extends TestCase
{
    public function testCrearPaciente()
    {
        $data = [
            'cedula' => '1234567890',
            'nombres' => 'Juan Pérez',
            'sexo' => 'M',
            'direccion' => 'Av. Siempre Viva 123',
            'telefono' => '0987654321',
            'fecha_nacimiento' => '1990-01-01'
        ];

        $response = $this->post('/api/pacientes', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('pacientes', ['cedula' => '1234567890']);
    }

    public function testObtenerPaciente()
    {
        $paciente = Pacientes::factory()->create();

        $response = $this->get("/api/pacientes/{$paciente->_id}");
        $response->assertStatus(200);
        $response->assertJson($paciente->toArray());
    }

    public function testActualizarPaciente()
    {
        $paciente = Pacientes::factory()->create();
        $nuevoData = ['direccion' => 'Nueva Dirección 456'];

        $response = $this->put("/api/pacientes/{$paciente->_id}", $nuevoData);
        $response->assertStatus(200);
        $this->assertDatabaseHas('pacientes', ['direccion' => 'Nueva Dirección 456']);
    }

    public function testEliminarPaciente()
    {
        $paciente = Pacientes::factory()->create();

        $response = $->delete("/api/pacientes/{$paciente->_id}");
        $response->assertStatus(200);
        $this->assertDatabaseMissing('pacientes', ['_id' => $paciente->_id]);
    }
}
