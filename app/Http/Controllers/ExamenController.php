<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Evaluacion;
use App\Models\Pregunta;
use App\Models\Respuesta;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;





class ExamenController extends Controller
{
    /**
     * Panel de evaluaciones del candidato.
     */
    public function index(Candidato $candidato): View
{
    $totalMatematicas = Pregunta::query()
        ->where('examen', 'matematicas')
        ->where('activa', true)
        ->count();

    $totalPsicometrico = Pregunta::query()
        ->where('examen', 'psicometrico')
        ->where('activa', true)
        ->count();

    $evaluacionMatematicas = Evaluacion::query()
        ->with([
            'respuestas' => function ($consulta) {
                $consulta
                    ->with('pregunta')
                    ->orderBy('pregunta_id');
            },
        ])
        ->where('candidato_id', $candidato->id)
        ->where('tipo', 'matematicas')
        ->latest('id')
        ->first();

    $evaluacionPsicometrica = Evaluacion::query()
        ->with([
            'respuestas' => function ($consulta) {
                $consulta
                    ->with('pregunta')
                    ->orderBy('pregunta_id');
            },
        ])
        ->where('candidato_id', $candidato->id)
        ->where('tipo', 'psicometrico')
        ->latest('id')
        ->first();

    $preguntasMatematicas = Pregunta::query()
        ->where('examen', 'matematicas')
        ->where('activa', true)
        ->orderBy('orden')
        ->orderBy('id')
        ->get();

    $preguntasPsicometricas = Pregunta::query()
        ->where('examen', 'psicometrico')
        ->where('activa', true)
        ->orderBy('orden')
        ->orderBy('id')
        ->get();

    $respuestasCorrectas = $evaluacionMatematicas
        ? $evaluacionMatematicas->respuestas
            ->where('es_correcta', true)
            ->count()
        : 0;

    $respuestasIncorrectas = $evaluacionMatematicas
        ? $evaluacionMatematicas->respuestas
            ->where('es_correcta', false)
            ->count()
        : 0;

    $contestadasMatematicas = $evaluacionMatematicas
        ? $evaluacionMatematicas->respuestas->count()
        : 0;

    $contestadasPsicometrico = $evaluacionPsicometrica
        ? $evaluacionPsicometrica->respuestas->count()
        : 0;

    return view('examenes.index', compact(
        'candidato',
        'totalMatematicas',
        'totalPsicometrico',
        'evaluacionMatematicas',
        'evaluacionPsicometrica',
        'preguntasMatematicas',
        'preguntasPsicometricas',
        'respuestasCorrectas',
        'respuestasIncorrectas',
        'contestadasMatematicas',
        'contestadasPsicometrico'
    ));
}

/**
 * Mostrar instrucciones del examen psicométrico.
 */
public function instruccionesPsicometrico(
    Request $request
): View|RedirectResponse {

    $candidatoId = $request->session()->get('candidato_id');

    if (! $candidatoId) {
        return redirect()->route('candidato.login');
    }

    $candidato = Candidato::find($candidatoId);

    if (
        ! $candidato ||
        ! $candidato->credenciales_activas ||
        $candidato->estado === 'bloqueado'
    ) {

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('candidato.login')
            ->withErrors([
                'usuario' => 'Tu acceso no se encuentra disponible.',
            ]);
    }

    $totalPreguntas = Pregunta::query()
        ->where('examen', 'psicometrico')
        ->where('activa', true)
        ->count();

    $evaluacion = Evaluacion::query()
        ->where('candidato_id', $candidato->id)
        ->where('tipo', 'psicometrico')
        ->latest()
        ->first();

    return view(
        'candidato.examenes.psicometrico-instrucciones',
        compact(
            'candidato',
            'totalPreguntas',
            'evaluacion'
        )
    );
}
/**
 * Crear o recuperar el examen psicométrico del candidato autenticado.
 */
public function iniciarPsicometricoCandidato(
    Request $request
): RedirectResponse {
    $candidatoId = $request->session()->get('candidato_id');

    if (! $candidatoId) {
        return redirect()->route('candidato.login');
    }

    $candidato = Candidato::find($candidatoId);

    if (
        ! $candidato ||
        ! $candidato->credenciales_activas ||
        in_array($candidato->estado, ['bloqueado', 'finalizado'], true)
    ) {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('candidato.login')
            ->withErrors([
                'usuario' => 'Tu acceso no se encuentra disponible.',
            ]);
    }

    /*
     * El candidato debe finalizar Matemáticas antes
     * de comenzar el psicométrico.
     */
    $evaluacionMatematicas = Evaluacion::query()
        ->where('candidato_id', $candidato->id)
        ->where('tipo', 'matematicas')
        ->first();

    if (
        ! $evaluacionMatematicas ||
        $evaluacionMatematicas->estado !== 'finalizada'
    ) {
        return redirect()
            ->route('candidato.dashboard')
            ->with(
                'error',
                'Primero debes finalizar el examen de Matemáticas.'
            );
    }

    $totalPreguntas = Pregunta::query()
        ->where('examen', 'psicometrico')
        ->where('activa', true)
        ->count();

    if ($totalPreguntas === 0) {
        return back()->with(
            'error',
            'El examen psicométrico todavía no tiene preguntas disponibles.'
        );
    }

    $evaluacion = Evaluacion::firstOrCreate(
        [
            'candidato_id' => $candidato->id,
            'tipo' => 'psicometrico',
        ],
        [
            'estado' => 'pendiente',
            'total_preguntas' => $totalPreguntas,
            'respuestas_correctas' => 0,
            'respuestas_incorrectas' => 0,
            'respuestas_sin_contestar' => $totalPreguntas,
        ]
    );

    if ($evaluacion->estado === 'finalizada') {
        return redirect()
            ->route('candidato.dashboard')
            ->with(
                'error',
                'El examen psicométrico ya fue finalizado.'
            );
    }

    if ($evaluacion->estado === 'pendiente') {
        $evaluacion->update([
            'estado' => 'en_proceso',
            'fecha_inicio' => now(),
            'total_preguntas' => $totalPreguntas,
            'respuestas_sin_contestar' => $totalPreguntas,
        ]);
    }

    $candidato->update([
        'estado' => 'en_proceso',
    ]);

    return redirect()->route('candidato.psicometrico.examen');
}

/**
 * Mostrar el examen psicométrico del candidato autenticado.
 */
public function mostrarPsicometricoCandidato(
    Request $request
): View|RedirectResponse {
    $candidatoId = $request->session()->get('candidato_id');

    if (! $candidatoId) {
        return redirect()->route('candidato.login');
    }

    $candidato = Candidato::find($candidatoId);

    if (
        ! $candidato ||
        ! $candidato->credenciales_activas ||
        in_array($candidato->estado, ['bloqueado', 'finalizado'], true)
    ) {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('candidato.login')
            ->withErrors([
                'usuario' => 'Tu acceso no se encuentra disponible.',
            ]);
    }

    $evaluacion = Evaluacion::query()
        ->where('candidato_id', $candidato->id)
        ->where('tipo', 'psicometrico')
        ->first();

    if (! $evaluacion) {
        return redirect()
            ->route('candidato.psicometrico.instrucciones')
            ->with(
                'error',
                'Primero debes iniciar el examen desde la pantalla de instrucciones.'
            );
    }

    if ($evaluacion->estado === 'finalizada') {
        return redirect()
            ->route('candidato.dashboard')
            ->with(
                'error',
                'El examen psicométrico ya fue finalizado.'
            );
    }

    if ($evaluacion->estado !== 'en_proceso') {
        return redirect()
            ->route('candidato.psicometrico.instrucciones')
            ->with(
                'error',
                'El examen psicométrico todavía no se encuentra en proceso.'
            );
    }

    $preguntas = Pregunta::query()
        ->where('examen', 'psicometrico')
        ->where('activa', true)
        ->orderBy('orden')
        ->orderBy('id')
        ->get();

    if ($preguntas->isEmpty()) {
        return redirect()
            ->route('candidato.psicometrico.instrucciones')
            ->with(
                'error',
                'El examen psicométrico no tiene preguntas disponibles.'
            );
    }

    $respuestasGuardadas = Respuesta::query()
        ->where('evaluacion_id', $evaluacion->id)
        ->get()
        ->keyBy('pregunta_id');

    /*
     * Tiempo provisional del psicométrico: 60 minutos.
     * Después puede cambiarse si RH define otro tiempo.
     */
    $duracionExamenSegundos = 60 * 60;

    $segundosTranscurridos = $evaluacion->fecha_inicio
        ? $evaluacion->fecha_inicio->diffInSeconds(now())
        : 0;

    $segundosRestantes = max(
        0,
        $duracionExamenSegundos - $segundosTranscurridos
    );

    return view('candidato.examenes.psicometrico', compact(
        'candidato',
        'evaluacion',
        'preguntas',
        'respuestasGuardadas',
        'segundosRestantes'
    ));
}

/**
 * Guardar automáticamente una respuesta del examen psicométrico.
 */
public function guardarRespuestaPsicometrico(
    Request $request
): JsonResponse {
    $datos = $request->validate([
        'pregunta_id' => [
            'required',
            'integer',
            'exists:preguntas,id',
        ],
        'respuesta_seleccionada' => [
            'nullable',
            'string',
            'max:50',
        ],
        'respuesta_texto' => [
            'nullable',
            'string',
            'max:5000',
        ],
    ]);

    $candidatoId = $request->session()->get('candidato_id');

    if (! $candidatoId) {
        return response()->json([
            'ok' => false,
            'mensaje' => 'La sesión ha expirado.',
        ], 401);
    }

    $candidato = Candidato::find($candidatoId);

    if (
        ! $candidato ||
        ! $candidato->credenciales_activas ||
        in_array($candidato->estado, ['bloqueado', 'finalizado'], true)
    ) {
        return response()->json([
            'ok' => false,
            'mensaje' => 'Tu acceso no se encuentra disponible.',
        ], 403);
    }

    $evaluacion = Evaluacion::query()
        ->where('candidato_id', $candidato->id)
        ->where('tipo', 'psicometrico')
        ->where('estado', 'en_proceso')
        ->first();

    if (! $evaluacion) {
        return response()->json([
            'ok' => false,
            'mensaje' => 'El examen psicométrico no se encuentra en proceso.',
        ], 422);
    }

    $pregunta = Pregunta::query()
        ->where('id', $datos['pregunta_id'])
        ->where('examen', 'psicometrico')
        ->where('activa', true)
        ->first();

    if (! $pregunta) {
        return response()->json([
            'ok' => false,
            'mensaje' => 'La pregunta no pertenece al examen psicométrico.',
        ], 422);
    }

    $respuestaSeleccionada = isset($datos['respuesta_seleccionada'])
        ? strtolower(trim($datos['respuesta_seleccionada']))
        : null;

    $respuestaTexto = isset($datos['respuesta_texto'])
        ? trim($datos['respuesta_texto'])
        : null;

    Respuesta::updateOrCreate(
        [
            'evaluacion_id' => $evaluacion->id,
            'pregunta_id' => $pregunta->id,
        ],
        [
            'respuesta_seleccionada' => $respuestaSeleccionada ?: null,
            'respuesta_texto' => $respuestaTexto ?: null,

            /*
             * La calificación definitiva se realiza al finalizar.
             */
            'es_correcta' => null,
            'puntaje_obtenido' => null,
            'revisada' => false,
        ]
    );

    return response()->json([
        'ok' => true,
        'mensaje' => 'Respuesta guardada.',
    ]);
}

/**
 * Finalizar y calificar el examen psicométrico.
 */
public function finalizarPsicometrico(
    Request $request
): RedirectResponse {
    $candidatoId = $request->session()->get('candidato_id');

    if (! $candidatoId) {
        return redirect()->route('candidato.login');
    }

    $candidato = Candidato::find($candidatoId);

    if (
        ! $candidato ||
        ! $candidato->credenciales_activas ||
        in_array($candidato->estado, ['bloqueado', 'finalizado'], true)
    ) {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('candidato.login')
            ->withErrors([
                'usuario' => 'Tu acceso no se encuentra disponible.',
            ]);
    }

    DB::transaction(function () use ($candidato): void {
        $evaluacion = Evaluacion::query()
            ->where('candidato_id', $candidato->id)
            ->where('tipo', 'psicometrico')
            ->lockForUpdate()
            ->firstOrFail();

        if ($evaluacion->estado === 'finalizada') {
            return;
        }

        if ($evaluacion->estado !== 'en_proceso') {
            abort(422, 'El examen psicométrico no se encuentra en proceso.');
        }

        $preguntas = Pregunta::query()
            ->where('examen', 'psicometrico')
            ->where('activa', true)
            ->orderBy('orden')
            ->orderBy('id')
            ->get();

        $respuestas = Respuesta::query()
            ->where('evaluacion_id', $evaluacion->id)
            ->get()
            ->keyBy('pregunta_id');

        $correctas = 0;
        $incorrectas = 0;
        $sinContestar = 0;

        $puntajeObtenido = 0;
        $puntajeTotal = 0;

        foreach ($preguntas as $pregunta) {
    $respuesta = $respuestas->get($pregunta->id);

    $respuestaSeleccionada = $respuesta
        ? strtolower(trim(
            (string) $respuesta->respuesta_seleccionada
        ))
        : '';

    $respuestaTexto = $respuesta
        ? trim((string) $respuesta->respuesta_texto)
        : '';

    $estaContestada =
        $respuestaSeleccionada !== '' ||
        $respuestaTexto !== '';

    /*
     * Determinar primero si esta pregunta entra
     * en la calificación automática.
     */
    $esCalificableAutomaticamente =
        $pregunta->calificacion_automatica &&
        ! in_array(
            $pregunta->tipo_pregunta,
            ['escala', 'abierta'],
            true
        );

    /*
     * Todas las preguntas calificables deben formar
     * parte del puntaje total, aunque no se contesten.
     */
    $valorPregunta = 0;

    if ($esCalificableAutomaticamente) {
        $valorPregunta = $pregunta->valor;

        if (is_null($valorPregunta)) {
            $valorPregunta = $pregunta->puntaje_maximo;
        }

        if (is_null($valorPregunta)) {
            $valorPregunta = 1;
        }

        $valorPregunta = (float) $valorPregunta;

        $puntajeTotal += $valorPregunta;
    }

    /*
     * Pregunta sin contestar.
     */
    if (! $estaContestada) {
        $sinContestar++;

        if ($respuesta) {
            $respuesta->update([
                'es_correcta' => null,
                'puntaje_obtenido' => 0,
                'revisada' => false,
            ]);
        }

        continue;
    }

    /*
     * Personalidad, escala y preguntas abiertas:
     * se almacenan para que RH las revise,
     * pero no afectan la calificación automática.
     */
    if (! $esCalificableAutomaticamente) {
        $respuesta->update([
            'es_correcta' => null,
            'puntaje_obtenido' => 0,
            'revisada' => false,
        ]);

        continue;
    }

    $respuestaCorrecta = strtolower(trim(
        (string) $pregunta->respuesta_correcta
    ));

    /*
     * Opción múltiple:
     * comparar la letra seleccionada.
     */
    if ($pregunta->tipo_pregunta === 'opcion_multiple') {
        $esCorrecta =
            $respuestaSeleccionada !== '' &&
            $respuestaSeleccionada === $respuestaCorrecta;
    } else {
        /*
         * Respuesta corta:
         * comparar el texto escrito.
         */
        $respuestaNormalizada = mb_strtolower(
            trim($respuestaTexto),
            'UTF-8'
        );

        $correctaNormalizada = mb_strtolower(
            trim($respuestaCorrecta),
            'UTF-8'
        );

        /*
         * Permitir "10 letras A" en la pregunta 8,
         * aunque la respuesta correcta sea solamente 10.
         */
        if ((int) $pregunta->orden === 8) {
            preg_match(
                '/\d+/',
                $respuestaNormalizada,
                $coincidencias
            );

            $respuestaNormalizada = $coincidencias[0] ?? '';
        }

        $esCorrecta =
            $respuestaNormalizada !== '' &&
            $respuestaNormalizada === $correctaNormalizada;
    }

    if ($esCorrecta) {
        $correctas++;
        $puntajeObtenido += $valorPregunta;
    } else {
        $incorrectas++;
    }

    $respuesta->update([
        'es_correcta' => $esCorrecta,
        'puntaje_obtenido' => $esCorrecta
            ? $valorPregunta
            : 0,
        'revisada' => true,
    ]);
}


        $calificacion = $puntajeTotal > 0
            ? round(($puntajeObtenido / $puntajeTotal) * 100, 2)
            : 0;

        $duracionSegundos = $evaluacion->fecha_inicio
            ? (int) round(
                $evaluacion->fecha_inicio->diffInSeconds(now())
            )
            : 0;

        $evaluacion->update([
            'estado' => 'finalizada',
            'total_preguntas' => $preguntas->count(),
            'respuestas_correctas' => $correctas,
            'respuestas_incorrectas' => $incorrectas,
            'respuestas_sin_contestar' => $sinContestar,
            'calificacion' => $calificacion,
            'fecha_finalizacion' => now(),
            'duracion_segundos' => $duracionSegundos,
        ]);

        $candidato->update([
            'estado' => 'finalizado',
            'credenciales_activas' => false,
        ]);
    });

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()
        ->route('candidato.login')
        ->with(
            'success',
            'Tus evaluaciones fueron enviadas correctamente. Gracias por participar.'
        );
}





    /**
 * Mostrar instrucciones del examen matemático al candidato autenticado.
 */
public function instruccionesMatematicas(Request $request): View|RedirectResponse
{
    $candidatoId = $request->session()->get('candidato_id');

    if (! $candidatoId) {
        return redirect()->route('candidato.login');
    }

    $candidato = Candidato::find($candidatoId);

    if (
        ! $candidato ||
        ! $candidato->credenciales_activas ||
        $candidato->estado === 'bloqueado'
    ) {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('candidato.login')
            ->withErrors([
                'usuario' => 'Tu acceso no se encuentra disponible.',
            ]);
    }

    $totalPreguntas = Pregunta::query()
        ->where('examen', 'matematicas')
        ->where('activa', true)
        ->count();

    $evaluacion = Evaluacion::query()
        ->where('candidato_id', $candidato->id)
        ->where('tipo', 'matematicas')
        ->latest()
        ->first();

    return view('candidato.examenes.matematicas-instrucciones', compact(
        'candidato',
        'totalPreguntas',
        'evaluacion'
    ));
}

/**
 * Guardar automáticamente una respuesta del examen matemático.
 */
public function guardarRespuestaMatematicas(Request $request): JsonResponse
{
    $datos = $request->validate([
        'pregunta_id' => [
            'required',
            'integer',
            'exists:preguntas,id',
        ],
        'respuesta_seleccionada' => [
            'nullable',
            'string',
            'max:10',
        ],
        'respuesta_texto' => [
            'nullable',
            'string',
            'max:5000',
        ],
    ]);

    $candidatoId = $request->session()->get('candidato_id');

    if (! $candidatoId) {
        return response()->json([
            'ok' => false,
            'mensaje' => 'La sesión ha expirado.',
        ], 401);
    }

    $candidato = Candidato::find($candidatoId);

    if (
        ! $candidato ||
        ! $candidato->credenciales_activas ||
        in_array($candidato->estado, ['bloqueado', 'finalizado'], true)
    ) {
        return response()->json([
            'ok' => false,
            'mensaje' => 'Tu acceso no se encuentra disponible.',
        ], 403);
    }

    $evaluacion = Evaluacion::query()
        ->where('candidato_id', $candidato->id)
        ->where('tipo', 'matematicas')
        ->where('estado', 'en_proceso')
        ->first();

    if (! $evaluacion) {
        return response()->json([
            'ok' => false,
            'mensaje' => 'El examen no se encuentra en proceso.',
        ], 422);
    }

    $pregunta = Pregunta::query()
        ->where('id', $datos['pregunta_id'])
        ->where('examen', 'matematicas')
        ->where('activa', true)
        ->first();

    if (! $pregunta) {
        return response()->json([
            'ok' => false,
            'mensaje' => 'La pregunta no pertenece a este examen.',
        ], 422);
    }

    $respuestaSeleccionada = isset($datos['respuesta_seleccionada'])
        ? strtolower(trim($datos['respuesta_seleccionada']))
        : null;

    $respuestaTexto = isset($datos['respuesta_texto'])
        ? trim($datos['respuesta_texto'])
        : null;

    Respuesta::updateOrCreate(
        [
            'evaluacion_id' => $evaluacion->id,
            'pregunta_id' => $pregunta->id,
        ],
        [
            'respuesta_seleccionada' => $respuestaSeleccionada ?: null,
            'respuesta_texto' => $respuestaTexto ?: null,

            /*
             * La calificación definitiva se calcula al finalizar.
             */
            'es_correcta' => null,
            'puntaje_obtenido' => null,
            'revisada' => false,
        ]
    );

    return response()->json([
        'ok' => true,
        'mensaje' => 'Respuesta guardada.',
    ]);
}
/**
 * Finalizar y calificar el examen matemático.
 */
public function finalizarMatematicas(
    Request $request
): RedirectResponse {
    $candidatoId = $request->session()->get('candidato_id');

    if (! $candidatoId) {
        return redirect()->route('candidato.login');
    }

    $candidato = Candidato::find($candidatoId);

    if (
        ! $candidato ||
        ! $candidato->credenciales_activas ||
        in_array($candidato->estado, ['bloqueado', 'finalizado'], true)
    ) {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('candidato.login')
            ->withErrors([
                'usuario' => 'Tu acceso no se encuentra disponible.',
            ]);
    }

    DB::transaction(function () use ($candidato): void {
        $evaluacion = Evaluacion::query()
            ->where('candidato_id', $candidato->id)
            ->where('tipo', 'matematicas')
            ->lockForUpdate()
            ->firstOrFail();

        if ($evaluacion->estado === 'finalizada') {
            return;
        }

        if ($evaluacion->estado !== 'en_proceso') {
            abort(422, 'El examen no se encuentra en proceso.');
        }

        $preguntas = Pregunta::query()
            ->where('examen', 'matematicas')
            ->where('activa', true)
            ->orderBy('orden')
            ->orderBy('id')
            ->get();

        $respuestas = Respuesta::query()
            ->where('evaluacion_id', $evaluacion->id)
            ->get()
            ->keyBy('pregunta_id');

        $correctas = 0;
        $incorrectas = 0;
        $sinContestar = 0;

        $puntajeObtenido = 0;
        $puntajeTotal = 0;

        foreach ($preguntas as $pregunta) {
            $respuesta = $respuestas->get($pregunta->id);

            $valorPregunta = $pregunta->valor;

            if (is_null($valorPregunta)) {
                $valorPregunta = $pregunta->puntaje_maximo;
            }

            if (is_null($valorPregunta)) {
                $valorPregunta = 1;
            }

            $valorPregunta = (float) $valorPregunta;
            $puntajeTotal += $valorPregunta;

            $respuestaSeleccionada = $respuesta
                ? strtolower(trim(
                    (string) $respuesta->respuesta_seleccionada
                ))
                : '';

            $respuestaTexto = $respuesta
                ? trim((string) $respuesta->respuesta_texto)
                : '';

            $estaContestada =
                $respuestaSeleccionada !== '' ||
                $respuestaTexto !== '';

            if (! $estaContestada) {
                $sinContestar++;

                if ($respuesta) {
                    $respuesta->update([
                        'es_correcta' => false,
                        'puntaje_obtenido' => 0,
                        'revisada' => true,
                    ]);
                }

                continue;
            }

            /*
             * Las preguntas abiertas quedan pendientes de revisión por RH.
             */
            if ($pregunta->tipo_pregunta === 'abierta') {
                $respuesta->update([
                    'es_correcta' => null,
                    'puntaje_obtenido' => 0,
                    'revisada' => false,
                ]);

                continue;
            }

            $respuestaCorrecta = strtolower(trim(
                (string) $pregunta->respuesta_correcta
            ));

            $esCorrecta =
                $respuestaSeleccionada !== '' &&
                $respuestaSeleccionada === $respuestaCorrecta;

            if ($esCorrecta) {
                $correctas++;
                $puntajeObtenido += $valorPregunta;
            } else {
                $incorrectas++;
            }

            $respuesta->update([
                'es_correcta' => $esCorrecta,
                'puntaje_obtenido' => $esCorrecta
                    ? $valorPregunta
                    : 0,
                'revisada' => true,
            ]);
        }

        $calificacion = $puntajeTotal > 0
            ? round(($puntajeObtenido / $puntajeTotal) * 100, 2)
            : 0;

        $duracionSegundos = $evaluacion->fecha_inicio
            ? (int) round(
                $evaluacion->fecha_inicio->diffInSeconds(now())
            )
            : 0;

        $evaluacion->update([
            'estado' => 'finalizada',
            'total_preguntas' => $preguntas->count(),
            'respuestas_correctas' => $correctas,
            'respuestas_incorrectas' => $incorrectas,
            'respuestas_sin_contestar' => $sinContestar,
            'calificacion' => $calificacion,
            'fecha_finalizacion' => now(),
            'duracion_segundos' => $duracionSegundos,
        ]);
    });

    return redirect()
        ->route('candidato.dashboard')
        ->with(
            'success',
            'El examen matemático fue enviado correctamente. Continúa con tu siguiente evaluación.'
        );
}


/**
 * Mostrar el examen matemático del candidato autenticado.
 */
public function mostrarMatematicasCandidato(
    Request $request
): View|RedirectResponse {
    $candidatoId = $request->session()->get('candidato_id');

    if (! $candidatoId) {
        return redirect()->route('candidato.login');
    }

    $candidato = Candidato::find($candidatoId);

    if (
        ! $candidato ||
        ! $candidato->credenciales_activas ||
        $candidato->estado === 'bloqueado'
    ) {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('candidato.login')
            ->withErrors([
                'usuario' => 'Tu acceso no se encuentra disponible.',
            ]);
    }

    $evaluacion = Evaluacion::query()
        ->where('candidato_id', $candidato->id)
        ->where('tipo', 'matematicas')
        ->first();

    if (! $evaluacion) {
        return redirect()
            ->route('candidato.matematicas.instrucciones')
            ->with(
                'error',
                'Primero debes iniciar el examen desde la pantalla de instrucciones.'
            );
    }

    if ($evaluacion->estado === 'finalizada') {
        return redirect()
            ->route('candidato.dashboard')
            ->with(
                'error',
                'El examen matemático ya fue finalizado.'
            );
    }

    if ($evaluacion->estado !== 'en_proceso') {
        return redirect()
            ->route('candidato.matematicas.instrucciones')
            ->with(
                'error',
                'El examen todavía no se encuentra en proceso.'
            );
    }

    $preguntas = Pregunta::query()
        ->where('examen', 'matematicas')
        ->where('activa', true)
        ->orderBy('orden')
        ->orderBy('id')
        ->get();

    if ($preguntas->isEmpty()) {
        return redirect()
            ->route('candidato.matematicas.instrucciones')
            ->with(
                'error',
                'El examen matemático no tiene preguntas disponibles.'
            );
    }

    $respuestasGuardadas = Respuesta::query()
        ->where('evaluacion_id', $evaluacion->id)
        ->get()
        ->keyBy('pregunta_id');

    /*
     * Tiempo provisional del examen: 30 minutos.
     * Después podemos cambiarlo por el tiempo autorizado por RH.
     */
    $duracionExamenSegundos = 30 * 60;

    $segundosTranscurridos = $evaluacion->fecha_inicio
        ? $evaluacion->fecha_inicio->diffInSeconds(now())
        : 0;

    $segundosRestantes = max(
        0,
        $duracionExamenSegundos - $segundosTranscurridos
    );

    return view('candidato.examenes.matematicas', compact(
        'candidato',
        'evaluacion',
        'preguntas',
        'respuestasGuardadas',
        'segundosRestantes'
    ));
}

/**
 * Crear o recuperar el examen matemático del candidato autenticado.
 */
public function iniciarMatematicasCandidato(
    Request $request
): RedirectResponse {
    $candidatoId = $request->session()->get('candidato_id');

    if (! $candidatoId) {
        return redirect()->route('candidato.login');
    }

    $candidato = Candidato::find($candidatoId);

    if (
        ! $candidato ||
        ! $candidato->credenciales_activas ||
        $candidato->estado === 'bloqueado'
    ) {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('candidato.login')
            ->withErrors([
                'usuario' => 'Tu acceso no se encuentra disponible.',
            ]);
    }

    $totalPreguntas = Pregunta::query()
        ->where('examen', 'matematicas')
        ->where('activa', true)
        ->count();

    if ($totalPreguntas === 0) {
        return back()->with(
            'error',
            'El examen matemático todavía no tiene preguntas disponibles.'
        );
    }

    $evaluacion = Evaluacion::firstOrCreate(
        [
            'candidato_id' => $candidato->id,
            'tipo' => 'matematicas',
        ],
        [
            'estado' => 'pendiente',
            'total_preguntas' => $totalPreguntas,
            'respuestas_correctas' => 0,
            'respuestas_incorrectas' => 0,
            'respuestas_sin_contestar' => $totalPreguntas,
        ]
    );

    if ($evaluacion->estado === 'finalizada') {
        return redirect()
            ->route('candidato.dashboard')
            ->with(
                'error',
                'El examen matemático ya fue finalizado.'
            );
    }

    if ($evaluacion->estado === 'pendiente') {
        $evaluacion->update([
            'estado' => 'en_proceso',
            'fecha_inicio' => now(),
            'total_preguntas' => $totalPreguntas,
            'respuestas_sin_contestar' => $totalPreguntas,
        ]);
    }

    $candidato->update([
        'estado' => 'en_proceso',
    ]);

    return redirect()->route('candidato.matematicas.examen');
}

    /**
     * Crear o recuperar la evaluación de Matemáticas.
     */
    public function iniciarMatematicas(Candidato $candidato): RedirectResponse
    {
        $totalPreguntas = Pregunta::query()
            ->where('examen', 'matematicas')
            ->where('activa', true)
            ->count();

        if ($totalPreguntas === 0) {
            return back()->with(
                'error',
                'El examen de Matemáticas todavía no tiene preguntas disponibles.'
            );
        }

        $evaluacion = Evaluacion::firstOrCreate(
            [
                'candidato_id' => $candidato->id,
                'tipo' => 'matematicas',
            ],
            [
                'estado' => 'pendiente',
                'total_preguntas' => $totalPreguntas,
                'respuestas_correctas' => 0,
                'respuestas_incorrectas' => 0,
                'respuestas_sin_contestar' => $totalPreguntas,
            ]
        );

        if ($evaluacion->estado === 'finalizada') {
            return redirect()
                ->route('examenes.index', $candidato)
                ->with('error', 'El examen de Matemáticas ya fue finalizado.');
        }

        if ($evaluacion->estado === 'pendiente') {
            $evaluacion->update([
                'estado' => 'en_proceso',
                'fecha_inicio' => now(),
                'total_preguntas' => $totalPreguntas,
                'respuestas_sin_contestar' => $totalPreguntas,
            ]);
        }

        /*
         * En el siguiente paso crearemos esta pantalla.
         */
        return redirect()
            ->route('examenes.index', $candidato)
            ->with(
                'success',
                'El examen de Matemáticas está listo. En el siguiente paso construiremos la pantalla de preguntas.'
            );

            

    }
    

    

}
