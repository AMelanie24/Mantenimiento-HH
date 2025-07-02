<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Middleware\RedirectAfterLogin;
use Symfony\Component\HttpFoundation\Response;

class RedirectAfterLoginTest extends TestCase
{
    /**
     * Verifica que un administrador sea redirigido correctamente.
     */
    public function test_admin_redirect()
    {
        // Crear un usuario administrador
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        // Simular que el usuario está autenticado como administrador
        $this->actingAs($admin);

        // Crear una solicitud simulada
        $request = Request::create('/home', 'GET');

        // Crear una instancia del middleware
        $middleware = new RedirectAfterLogin();

        // Ejecutar el middleware
        $response = $middleware->handle($request, function () {
            return new Response('Response');
        });

        // Verificar que la redirección sea la correcta para el rol admin
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertEquals('preguntas/usodirecto', $response->headers->get('Location'));
    }

    /**
     * Verifica que un usuario normal sea redirigido correctamente.
     */
    public function test_user_redirect()
    {
        // Crear un usuario normal
        $user = User::factory()->create([
            'role' => 'user',
        ]);

        // Simular que el usuario está autenticado
        $this->actingAs($user);

        // Crear una solicitud simulada
        $request = Request::create('/home', 'GET');

        // Crear una instancia del middleware
        $middleware = new RedirectAfterLogin();

        // Ejecutar el middleware
        $response = $middleware->handle($request, function () {
            return new Response('Response');
        });

        // Verificar que la redirección sea la correcta para el rol user
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertEquals('preguntas/usodirecto', $response->headers->get('Location'));
    }

    /**
     * Verifica que un usuario no autenticado continúe sin redirección.
     */
    public function test_guest_redirect()
    {
        // Crear una solicitud simulada
        $request = Request::create('/home', 'GET');

        // Crear una instancia del middleware
        $middleware = new RedirectAfterLogin();

        // Ejecutar el middleware sin un usuario autenticado
        $response = $middleware->handle($request, function () {
            return new Response('Response');
        });

        // Verificar que el middleware permite continuar la solicitud
        $this->assertEquals('Response', $response->getContent());
    }
}
