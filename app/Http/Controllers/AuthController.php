<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Candidato;
use App\Models\Evaluacion;


class AuthController extends Controller
{
    public function mostrarLogin()
    {
        return view('welcome');
    }

    public function iniciarSesion(Request $request)
    {
        $credenciales = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Ingresa tu correo electrónico.',
            'email.email' => 'Ingresa un correo electrónico válido.',
            'password.required' => 'Ingresa tu contraseña.',
        ]);

        $recordar = $request->boolean('remember');

        if (Auth::attempt($credenciales, $recordar)) {
            $request->session()->regenerate();

            return redirect()
                ->route('dashboard')
                ->with('success', 'Bienvenido al sistema.');
        }

        return back()
            ->withErrors([
                'email' => 'El correo o la contraseña son incorrectos.',
            ])
            ->onlyInput('email');
    }

public function dashboard()
{
    $totalCandidatos = Candidato::count();

    $candidatosFinalizados = Candidato::query()
        ->where('estado', 'finalizado')
        ->count();

    $candidatosEnProceso = Candidato::query()
        ->whereHas('evaluaciones', function ($consulta) {
            $consulta->where('estado', 'en_proceso');
        })
        ->where('estado', '!=', 'finalizado')
        ->count();

    $candidatosPendientes = max(
        0,
        $totalCandidatos
        - $candidatosFinalizados
        - $candidatosEnProceso
    );

    $promedioMatematicas = Evaluacion::query()
        ->where('tipo', 'matematicas')
        ->where('estado', 'finalizada')
        ->avg('calificacion');

    $promedioPsicometrico = Evaluacion::query()
        ->where('tipo', 'psicometrico')
        ->where('estado', 'finalizada')
        ->avg('calificacion');

    $candidatosRecientes = Candidato::query()
        ->with([
            'evaluaciones' => function ($consulta) {
                $consulta
                    ->select([
                        'id',
                        'candidato_id',
                        'tipo',
                        'estado',
                        'calificacion',
                        'fecha_finalizacion',
                    ])
                    ->orderByDesc('id');
            },
        ])
        ->latest()
        ->take(6)
        ->get();

    return view('dashboard', [
        'totalCandidatos' => $totalCandidatos,
        'candidatosFinalizados' => $candidatosFinalizados,
        'candidatosEnProceso' => $candidatosEnProceso,
        'candidatosPendientes' => $candidatosPendientes,
        'promedioMatematicas' => round(
            (float) ($promedioMatematicas ?? 0),
            1
        ),
        'promedioPsicometrico' => round(
            (float) ($promedioPsicometrico ?? 0),
            1
        ),
        'candidatosRecientes' => $candidatosRecientes,
    ]);
}


    public function cerrarSesion(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
