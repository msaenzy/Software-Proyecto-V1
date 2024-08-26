<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Horarios;

class HorariosTest extends TestCase
{
    public function testCrearHorario()
    {
        $data = [
            'dia' => 'Lunes',
            'inicio' => '09:00',
            'fin' => '17:00'
        ];

        $response = $this->post('/api/horarios', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('horarios', ['dia' => 'Lunes', 'inicio' => '09:00']);
    }

    public function testObtenerHorarioPorDia()
    {
        $horario = Horarios::factory()->create(['dia' => 'Lunes']);

        $response = $this->get('/api/horarios/Lunes');
        $response->assertStatus(200);
        $response->assertJsonFragment(['dia' => 'Lunes']);
    }

    public function testActualizarHorario()
    {
        $horario = Horarios::factory()->create();
        $nuevoData = ['fin' => '18:00'];

        $response = $this->put("/api/horarios/{$horario->_id}", $nuevoData);
        $response->assertStatus(200);
        $this->assertDatabaseHas('horarios', ['fin' => '18:00']);
    }

    public function testEliminarHorario()
    {
        $horario = Horarios::factory()->create();

        $response = $this->delete("/api/horarios/{$horario->_id}");
        $response->assertStatus(200);
        $this->assertDatabaseMissing('horarios', ['_id' => $horario->_id]);
    }
}
