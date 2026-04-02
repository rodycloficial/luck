<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // 👈 Agrega esto
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

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
        
        if ((int) Auth::user()->id_rol === 1) {
            return redirect()->intended(route('admin.dashboard'));
        }
        
        return redirect()->intended('/');
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}