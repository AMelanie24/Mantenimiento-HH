<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Validation\Rule;

class ProfileUpdateRequestTest extends TestCase
{
    /**
     * Verificar que las reglas de validación estén bien definidas.
     */
    public function test_validation_rules()
    {
        // Crear un usuario de prueba
        $user = User::factory()->create();

        // Simular que el usuario está autenticado
        $this->actingAs($user);

        // Crear una instancia de la solicitud
        $request = new ProfileUpdateRequest();

        // Obtener las reglas de validación
        $rules = $request->rules();

        // Verificar que las reglas contengan los campos esperados
        $this->assertArrayHasKey('name', $rules);
        $this->assertArrayHasKey('email', $rules);
        $this->assertContains('required', $rules['name']);
        $this->assertContains('string', $rules['name']);
        $this->assertContains('max:255', $rules['name']);
        $this->assertContains('required', $rules['email']);
        $this->assertContains('email', $rules['email']);
    }

    /**
     * Verificar que la validación pase con datos válidos.
     */
    public function test_valid_data_passes_validation()
    {
        // Crear un usuario de prueba
        $user = User::factory()->create();

        // Simular que el usuario está autenticado
        $this->actingAs($user);

        // Simular los datos del formulario de actualización
        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
        ];

        // Crear la solicitud ProfileUpdateRequest
        $request = new ProfileUpdateRequest();

        // Validar los datos usando el validador de Laravel
        $validator = Validator::make($data, $request->rules());

        // Verificar que la validación pase sin errores
        $this->assertTrue($validator->passes());
    }

    /**
     * Verificar que la validación falle con datos inválidos.
     */
    public function test_invalid_data_fails_validation()
    {
        // Crear un usuario de prueba
        $user = User::factory()->create();

        // Simular que el usuario está autenticado
        $this->actingAs($user);

        // Datos inválidos (nombre vacío, email mal formado)
        $data = [
            'name' => '',
            'email' => 'invalid-email',
        ];

        // Crear la solicitud ProfileUpdateRequest
        $request = new ProfileUpdateRequest();

        // Validar los datos usando el validador de Laravel
        $validator = Validator::make($data, $request->rules());

        // Verificar que la validación falle
        $this->assertFalse($validator->passes());

        // Verificar que los mensajes de error correspondan a las reglas de validación
        $this->assertArrayHasKey('name', $validator->errors()->toArray());
        $this->assertArrayHasKey('email', $validator->errors()->toArray());
    }

    /**
     * Verificar que el email sea único excepto para el usuario actual.
     */
    public function test_email_is_unique_except_for_current_user()
    {
        // Crear dos usuarios
        $user1 = User::factory()->create(['email' => 'user1@example.com']);
        $user2 = User::factory()->create(['email' => 'user2@example.com']);

        // Simular que el usuario actual está autenticado
        $this->actingAs($user2);

        // Simular los datos del formulario de actualización con el email de user1
        $data = [
            'name' => 'Updated Name',
            'email' => 'user1@example.com',
        ];

        // Crear la solicitud ProfileUpdateRequest con el usuario actual
        $request = new ProfileUpdateRequest();

        // Validar los datos usando el validador de Laravel
        $validator = Validator::make($data, $request->rules());

        // Verificar que la validación pase porque el usuario actual tiene un email diferente
        $this->assertTrue($validator->passes());
    }
}
