<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'email' => ['required', 'email', 'exists:users']
            ],
            [
                'email.required' => 'Correo electrónico es requerido',
                'email.email' => 'Correo electrónico inválido',
                'email.exists' => 'Correo no existe'
            ]
        );

        try {
            Password::sendResetLink($request->only('email'));
            return back()->with('status', 'Te hemos enviado por correo electrónico el enlace para restablecer tu contraseña.');

        } catch(Exception $e) {
            return back()->with('status_error', 'No se pudo enviar correo electrónico.');
        }
    }
}
