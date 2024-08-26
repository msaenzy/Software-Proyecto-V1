<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Citas;

class CitasTest extends TestCase
{
    public function testCrearCita()
    {
        $data = [
            'asistida' => false,
            'anulada' => false,
            'horario' => '2024-08-25 10:00:00'
        ];

        $response = $this->post('/api/citas', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('citas', ['horario' => '2024-08-25 10:00:00']);
    }

    public function testObtenerCita()
    {
        $cita = Citas::factory()->create();

        $response = $this->get("/api/citas/{$cita->_id}");
        $response->assertStatus(200);
        $response->assertJson($cita->toArray());
    }

    public function testActualizarCita()
    {
        $cita = Citas::factory()->create();
        $nuevoData = ['anulada' => true];

        $response = $this->put("/api/citas/{$cita->_id}", $nuevoData);
        $response->assertStatus(200);
        $this->assertDatabaseHas('citas', ['anulada' => true]);
    }

    public function testCancelarCita()
    {
        $cita = Citas::factory()->create();

        $response = $this->post("/api/citas/{$cita->_id}/cancel");
        $response->assertStatus(200);
        $this->assertDatabaseHas('citas', ['_id' => $cita->_id, 'anulada' => true]);
    }
}
