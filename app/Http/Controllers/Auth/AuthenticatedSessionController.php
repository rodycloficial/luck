<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Log para ver qué está llegando
        Log::info('Intento de login con:', [
            'correo' => $request->input('correo'),
            'contrasena' => $request->input('contrasena') ? '***' : 'vacio'
        ]);

        $request->authenticate();

        Log::info('Autenticación exitosa para: ' . $request->input('correo'));

        $request->session()->regenerate();

        // Log para ver el rol del usuario autenticado
        Log::info('Usuario logueado:', [
            'id' => Auth::user()->id,
            'id_rol' => Auth::user()->id_rol,
            'correo' => Auth::user()->correo
        ]);
        
        if ((int) Auth::user()->id_rol === 1) {
            Log::info('Redirigiendo a admin.dashboard');
            return redirect()->intended(route('admin.dashboard'));
        }
        
        Log::info('Redirigiendo a home');
        return redirect()->intended('/');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}