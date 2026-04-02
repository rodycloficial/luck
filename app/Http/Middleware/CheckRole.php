<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role): Response
    {
        Log::info('CheckRole middleware ejecutado', [
            'auth_check' => Auth::check(),
            'role_requerido' => $role
        ]);

        if (!Auth::check()) {
            Log::info('No autenticado, redirigiendo a login');
            return redirect('login');
        }

        $userRole = (int) Auth::user()->id_rol;
        $requiredRole = (int) $role;
        
        Log::info('Verificando rol:', [
            'user_role' => $userRole,
            'required_role' => $requiredRole,
            'match' => $userRole === $requiredRole
        ]);

        if ($userRole !== $requiredRole) {
            Log::info('Rol incorrecto, abortando con 403');
            abort(403, 'No tienes permisos');
        }

        Log::info('Rol correcto, continuando');
        return $next($request);
    }
}