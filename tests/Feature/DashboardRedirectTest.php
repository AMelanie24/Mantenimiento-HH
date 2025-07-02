<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class DashboardRedirectTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Verificar que un administrador sea redirigido al dashboard de admin.
     */
    public function test_admin_redirect_to_admin_dashboard()
    {
        // Crear un usuario administrador
        $admin = User::factory()->create([
            'role' => 'admin',
            'password' => Hash::make('password123')
        ]);

        // Simular que el usuario está autenticado
        $this->actingAs($admin);

        // Hacer una solicitud GET a la ruta protegida
        $response = $this->get('/dashboard');

        // Verificar que el usuario sea redirigido a la página de administración
        $response->assertRedirect('admin/dashboard');
    }

    /**
     * Verificar que un usuario normal sea redirigido al dashboard de usuario.
     */
    public function test_user_redirect_to_user_dashboard()
    {
        // Crear un usuario normal
        $user = User::factory()->create([
            'role' => 'user',
            'password' => Hash::make('password123')
        ]);

        // Simular que el usuario está autenticado
        $this->actingAs($user);

        // Hacer una solicitud GET a la ruta protegida
        $response = $this->get('/dashboard');

        // Verificar que el usuario sea redirigido a la página de usuario
        $response->assertRedirect('user/dashboard');
    }

    /**
     * Verificar que un usuario no autenticado sea redirigido a la página de inicio de sesión.
     */
    public function test_guest_redirect_to_login()
    {
        // Hacer una solicitud GET a la ruta protegida sin estar autenticado
        $response = $this->get('/dashboard');

        // Verificar que el usuario sea redirigido a la página de inicio de sesión
        $response->assertRedirect(route('login'));
    }
}
