<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\RespuestaCuestionario;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RespuestaCuestionarioTest extends TestCase
{
    use RefreshDatabase; // Para reiniciar la base de datos en cada prueba

    public function test_puede_crear_respuesta_cuestionario()
    {
        // Crear un usuario de prueba
        $user = User::factory()->create();

        // Datos para crear una RespuestaCuestionario
        $data = [
            'usuario_id' => $user->id,
            'respuestas' => ['pregunta_1' => 'respuesta_1', 'pregunta_2' => 'respuesta_2'],
            'puntuacion_total' => 85,
            'huella_hidrica' => 120,
        ];

        // Crear el registro
        $respuestaCuestionario = RespuestaCuestionario::create($data);

        // Verificar que los datos se hayan guardado correctamente
        $this->assertDatabaseHas('respuesta_cuestionarios', [
            'usuario_id' => $user->id,
            'puntuacion_total' => 85,
            'huella_hidrica' => 120,
        ]);

        // Verificar que el campo 'respuestas' sea un arreglo
        $this->assertIsArray($respuestaCuestionario->respuestas);
        $this->assertEquals('respuesta_1', $respuestaCuestionario->respuestas['pregunta_1']);
    }

}
