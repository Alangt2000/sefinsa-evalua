<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Evaluacion;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class RhController extends Controller
{
    /**
     * Mostrar el panel principal de Recursos Humanos.
     */
    public function dashboard(Request $request): View
    {
        $totalCandidatos = Candidato::count();

        $candidatosFinalizados = Candidato::query()
            ->where('estado', 'finalizado')
            ->count();

        $candidatosEnProceso = Candidato::query()
            ->where('estado', 'en_proceso')
            ->count();

        $candidatosPendientes = Candidato::query()
            ->whereNotIn('estado', [
                'en_proceso',
                'finalizado',
            ])
            ->count();

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
            ->take(10)
            ->get();

        return view('rh.dashboard', [
            'totalCandidatos' => $totalCandidatos,
            'candidatosFinalizados' => $candidatosFinalizados,
            'candidatosEnProceso' => $candidatosEnProceso,
            'candidatosPendientes' => $candidatosPendientes,
            'promedioMatematicas' => round(
                (float) ($promedioMatematicas ?? 0),
                2
            ),
            'promedioPsicometrico' => round(
                (float) ($promedioPsicometrico ?? 0),
                2
            ),
            'candidatosRecientes' => $candidatosRecientes,
        ]);
    }
}
