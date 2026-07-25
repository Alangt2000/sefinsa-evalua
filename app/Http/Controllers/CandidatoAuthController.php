<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class CandidatoAuthController extends Controller
{
    public function login(): View|RedirectResponse
    {
        if (session()->has('candidato_id')) {
            return redirect()->route('candidato.dashboard');
        }

        return view('candidato.login');
    }

    public function autenticar(Request $request): RedirectResponse
    {
        $datos = $request->validate([
            'usuario' => ['required', 'string', 'max:50'],
            'password' => ['required', 'string'],
        ], [
            'usuario.required' => 'Ingresa tu usuario.',
            'password.required' => 'Ingresa tu contraseña.',
        ]);

        $candidato = Candidato::where(
            'usuario',
            trim($datos['usuario'])
        )->first();

        if (
            ! $candidato ||
            ! Hash::check($datos['password'], $candidato->password)
        ) {
            return back()
                ->withErrors([
                    'usuario' => 'El usuario o la contraseña son incorrectos.',
                ])
                ->onlyInput('usuario');
        }

        if (! $candidato->credenciales_activas) {
            return back()
                ->withErrors([
                    'usuario' => 'Las credenciales están desactivadas.',
                ])
                ->onlyInput('usuario');
        }

        if ($candidato->estado === 'bloqueado') {
            return back()
                ->withErrors([
                    'usuario' => 'El acceso se encuentra bloqueado.',
                ])
                ->onlyInput('usuario');
        }

        $request->session()->regenerate();

        $request->session()->put([
            'candidato_id' => $candidato->id,
            'candidato_nombre' => $candidato->nombre_completo,
        ]);

        $candidato->update([
            'ultimo_acceso' => now(),
        ]);

        return redirect()->route('candidato.dashboard');
    }

    public function dashboard(Request $request): View|RedirectResponse
    {
        $candidatoId = $request->session()->get('candidato_id');

        if (! $candidatoId) {
            return redirect()->route('candidato.login');
        }

        $candidato = Candidato::find($candidatoId);

        if (! $candidato) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()
                ->route('candidato.login')
                ->withErrors([
                    'usuario' => 'No fue posible encontrar la información del candidato.',
                ]);
        }

        if (
            ! $candidato->credenciales_activas ||
            $candidato->estado === 'bloqueado'
        ) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()
                ->route('candidato.login')
                ->withErrors([
                    'usuario' => 'Tu acceso ya no se encuentra disponible.',
                ]);
        }

        return view('candidato.dashboard', compact('candidato'));
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->forget([
            'candidato_id',
            'candidato_nombre',
        ]);

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('candidato.login')
            ->with('success', 'Sesión cerrada correctamente.');
    }
}
