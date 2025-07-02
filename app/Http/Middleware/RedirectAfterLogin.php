<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RedirectAfterLogin
{
   /**
     * Maneja una solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Verifica si el usuario está autenticado
        if (Auth::check()) {
            $user = Auth::user(); // Obtiene el usuario autenticado

            // Lógica para redirección personalizada
            if ($user->role === 'admin') { 
                return redirect('preguntas/usodirecto'); // Redirige a los administradores
            } elseif ($user->role === 'user') {
                return redirect('preguntas/usodirecto'); // Redirige a los usuarios normales
            }

            // Redirección predeterminada
            return redirect('preguntas/usodirecto');
        }

        // Si no está autenticado, continúa con la solicitud
        return $next($request);
    }
}
