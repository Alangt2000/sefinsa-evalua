<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Revisión de evaluaciones | SEFINSA
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    <style>
        :root {
            --azul: #123b68;
            --azul-claro: #1f6fa8;
            --naranja: #f28c28;
            --naranja-oscuro: #d96f0b;
            --verde: #198754;
            --rojo: #dc3545;
            --amarillo: #f59e0b;
            --fondo: #f3f6fa;
            --texto: #172033;
            --muted: #6b7280;
            --borde: #e3e8ef;
        }

        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            color: var(--texto);
            background:
                radial-gradient(
                    circle at top left,
                    rgba(31, 111, 168, 0.12),
                    transparent 30%
                ),
                radial-gradient(
                    circle at top right,
                    rgba(242, 140, 40, 0.12),
                    transparent 28%
                ),
                var(--fondo);
            font-family:
                Inter,
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;
        }

        .topbar {
            position: sticky;
            z-index: 100;
            top: 0;
            background: rgba(255, 255, 255, 0.94);
            border-bottom: 1px solid var(--borde);
            backdrop-filter: blur(14px);
        }

        .brand-symbol {
            width: 46px;
            height: 46px;
            display: grid;
            place-items: center;
            color: #ffffff;
            background: linear-gradient(
                135deg,
                var(--azul),
                var(--azul-claro)
            );
            border-radius: 14px;
            box-shadow: 0 10px 25px rgba(18, 59, 104, 0.22);
        }

        .brand-title {
            margin: 0;
            color: var(--azul);
            font-size: 1rem;
            font-weight: 900;
            letter-spacing: 0.04em;
        }

        .brand-subtitle {
            margin: 0;
            color: var(--muted);
            font-size: 0.76rem;
        }

        .main-container {
            width: min(1220px, calc(100% - 30px));
            margin: 0 auto;
            padding: 36px 0 70px;
        }

        .hero {
            position: relative;
            overflow: hidden;
            padding: 34px;
            color: #ffffff;
            background: linear-gradient(
                125deg,
                var(--azul) 0%,
                var(--azul-claro) 72%,
                #378ac0 100%
            );
            border-radius: 28px;
            box-shadow: 0 24px 58px rgba(18, 59, 104, 0.22);
        }

        .hero::before {
            content: "";
            position: absolute;
            top: -100px;
            right: -70px;
            width: 280px;
            height: 280px;
            border: 45px solid rgba(255, 255, 255, 0.07);
            border-radius: 50%;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 7px 13px;
            margin-bottom: 17px;
            background: rgba(255, 255, 255, 0.14);
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 999px;
            font-size: 0.78rem;
            font-weight: 800;
        }

        .hero h1 {
            margin: 0 0 10px;
            font-size: clamp(1.9rem, 4vw, 3rem);
            font-weight: 900;
        }

        .hero p {
            max-width: 720px;
            margin: 0;
            color: rgba(255, 255, 255, 0.82);
            line-height: 1.7;
        }

        .candidate-data {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 24px;
        }

        .candidate-chip {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            background: rgba(255, 255, 255, 0.13);
            border: 1px solid rgba(255, 255, 255, 0.16);
            border-radius: 16px;
        }

        .candidate-chip i {
            color: #ffffff;
        }

        .candidate-chip small {
            display: block;
            color: rgba(255, 255, 255, 0.65);
            font-size: 0.68rem;
            font-weight: 700;
            text-transform: uppercase;
        }

        .candidate-chip strong {
            font-size: 0.9rem;
        }

        .section-title {
            margin: 38px 0 18px;
            font-size: 1.45rem;
            font-weight: 900;
        }

        .summary-card {
            height: 100%;
            padding: 23px;
            background: rgba(255, 255, 255, 0.96);
            border: 1px solid var(--borde);
            border-radius: 21px;
            box-shadow: 0 15px 38px rgba(23, 32, 51, 0.07);
        }

        .summary-icon {
            width: 46px;
            height: 46px;
            display: grid;
            place-items: center;
            margin-bottom: 16px;
            border-radius: 14px;
            font-size: 1.1rem;
        }

        .icon-blue {
            color: var(--azul);
            background: rgba(31, 111, 168, 0.11);
        }

        .icon-orange {
            color: var(--naranja-oscuro);
            background: rgba(242, 140, 40, 0.14);
        }

        .icon-green {
            color: var(--verde);
            background: rgba(25, 135, 84, 0.11);
        }

        .icon-red {
            color: var(--rojo);
            background: rgba(220, 53, 69, 0.11);
        }

        .summary-label {
            margin-bottom: 5px;
            color: var(--muted);
            font-size: 0.76rem;
            font-weight: 800;
            text-transform: uppercase;
        }

        .summary-value {
            margin: 0;
            font-size: 1.65rem;
            font-weight: 900;
        }

        .summary-help {
            margin: 6px 0 0;
            color: var(--muted);
            font-size: 0.82rem;
        }

        .exam-panel {
            overflow: hidden;
            margin-top: 24px;
            background: rgba(255, 255, 255, 0.97);
            border: 1px solid var(--borde);
            border-radius: 24px;
            box-shadow: 0 18px 45px rgba(23, 32, 51, 0.08);
        }

        .exam-panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 25px 27px;
            color: #ffffff;
        }

        .math-header {
            background: linear-gradient(
                135deg,
                var(--azul),
                var(--azul-claro)
            );
        }

        .psycho-header {
            background: linear-gradient(
                135deg,
                var(--naranja-oscuro),
                var(--naranja)
            );
        }

        .exam-title-group {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .exam-title-icon {
            width: 48px;
            height: 48px;
            display: grid;
            flex: 0 0 48px;
            place-items: center;
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.16);
            border-radius: 15px;
        }

        .exam-panel-header h2 {
            margin: 0;
            font-size: 1.25rem;
            font-weight: 900;
        }

        .exam-panel-header p {
            margin: 3px 0 0;
            color: rgba(255, 255, 255, 0.75);
            font-size: 0.82rem;
        }

        .status-badge {
            padding: 8px 13px;
            border-radius: 999px;
            font-size: 0.73rem;
            font-weight: 900;
            text-transform: uppercase;
        }

        .badge-finished {
            color: #d1fae5;
            background: rgba(16, 185, 129, 0.2);
            border: 1px solid rgba(209, 250, 229, 0.22);
        }

        .badge-progress {
            color: #dbeafe;
            background: rgba(59, 130, 246, 0.2);
            border: 1px solid rgba(219, 234, 254, 0.2);
        }

        .badge-pending {
            color: #fff7ed;
            background: rgba(255, 255, 255, 0.14);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .exam-metrics {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 13px;
            padding: 22px 27px;
            background: #f8fafc;
            border-bottom: 1px solid var(--borde);
        }

        .metric {
            padding: 15px;
            background: #ffffff;
            border: 1px solid var(--borde);
            border-radius: 15px;
        }

        .metric span {
            display: block;
            margin-bottom: 5px;
            color: var(--muted);
            font-size: 0.69rem;
            font-weight: 800;
            text-transform: uppercase;
        }

        .metric strong {
            font-size: 1rem;
            font-weight: 900;
        }

        .questions-wrapper {
            padding: 25px 27px;
        }

        .question-card {
            margin-bottom: 16px;
            padding: 20px;
            background: #ffffff;
            border: 1px solid var(--borde);
            border-radius: 18px;
            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }

        .question-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(23, 32, 51, 0.07);
        }

        .question-card.correct {
            border-left: 5px solid var(--verde);
        }

        .question-card.incorrect {
            border-left: 5px solid var(--rojo);
        }

        .question-card.unanswered {
            border-left: 5px solid var(--amarillo);
        }

        .question-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 15px;
        }

        .question-number {
            display: inline-flex;
            padding: 6px 10px;
            color: var(--azul);
            background: rgba(31, 111, 168, 0.09);
            border-radius: 999px;
            font-size: 0.7rem;
            font-weight: 900;
        }

        .result-chip {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 0.7rem;
            font-weight: 900;
        }

        .result-correct {
            color: #157347;
            background: #d1e7dd;
        }

        .result-incorrect {
            color: #b02a37;
            background: #f8d7da;
        }

        .result-unanswered {
            color: #997404;
            background: #fff3cd;
        }

        .question-text {
            margin: 0 0 17px;
            font-size: 1rem;
            font-weight: 800;
            line-height: 1.55;
        }

        .answer-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .answer-box {
            padding: 14px;
            background: #f8fafc;
            border: 1px solid var(--borde);
            border-radius: 14px;
        }

        .answer-box span {
            display: block;
            margin-bottom: 5px;
            color: var(--muted);
            font-size: 0.7rem;
            font-weight: 800;
            text-transform: uppercase;
        }

        .answer-box strong {
            font-size: 0.88rem;
            line-height: 1.5;
        }

        .empty-state {
            padding: 45px 25px;
            text-align: center;
        }

        .empty-icon {
            width: 65px;
            height: 65px;
            display: grid;
            place-items: center;
            margin: 0 auto 17px;
            color: var(--muted);
            background: #eef2f6;
            border-radius: 20px;
            font-size: 1.4rem;
        }

        .empty-state h3 {
            font-size: 1.1rem;
            font-weight: 900;
        }

        .empty-state p {
            max-width: 500px;
            margin: 8px auto 0;
            color: var(--muted);
        }

        .btn-back {
            color: var(--azul);
            background: #ffffff;
            border: 1px solid var(--borde);
            border-radius: 999px;
            font-weight: 800;
        }

        .btn-back:hover {
            color: #ffffff;
            background: var(--azul);
            border-color: var(--azul);
        }

        .accordion-button {
            padding: 18px 22px;
            font-weight: 900;
        }

        .accordion-button:not(.collapsed) {
            color: var(--azul);
            background: rgba(31, 111, 168, 0.07);
            box-shadow: none;
        }

        .accordion-button:focus {
            box-shadow: none;
        }

        @media (max-width: 991px) {
            .exam-metrics {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 767px) {
            .main-container {
                width: min(100% - 20px, 1220px);
                padding-top: 22px;
            }

            .hero {
                padding: 27px 22px;
                border-radius: 22px;
            }

            .exam-panel-header {
                align-items: flex-start;
                flex-direction: column;
                padding: 22px;
            }

            .exam-metrics {
                grid-template-columns: 1fr 1fr;
                padding: 18px;
            }

            .questions-wrapper {
                padding: 18px;
            }

            .answer-grid {
                grid-template-columns: 1fr;
            }

            .question-top {
                flex-direction: column;
            }
        }

        @media print {
            .topbar,
            .btn-print {
                display: none !important;
            }

            body {
                background: #ffffff;
            }

            .main-container {
                width: 100%;
                padding: 0;
            }

            .hero,
            .summary-card,
            .exam-panel,
            .question-card {
                box-shadow: none;
            }

            .accordion-collapse {
                display: block !important;
            }

            .accordion-button::after {
                display: none;
            }
        }
    </style>
</head>

<body>

@php
    $estadoTexto = function (?string $estado): string {
        return match ($estado) {
            'finalizada' => 'Finalizada',
            'en_proceso' => 'En proceso',
            default => 'Pendiente',
        };
    };

    $estadoClase = function (?string $estado): string {
        return match ($estado) {
            'finalizada' => 'badge-finished',
            'en_proceso' => 'badge-progress',
            default => 'badge-pending',
        };
    };

    $formatearDuracion = function (?int $segundos): string {
        if (!$segundos) {
            return 'Sin registro';
        }

        $horas = intdiv($segundos, 3600);
        $minutos = intdiv($segundos % 3600, 60);
        $segundosRestantes = $segundos % 60;

        if ($horas > 0) {
            return "{$horas} h {$minutos} min";
        }

        if ($minutos > 0) {
            return "{$minutos} min {$segundosRestantes} s";
        }

        return "{$segundosRestantes} s";
    };

    $obtenerTextoOpcion = function ($pregunta, $valor): string {
        if ($valor === null || $valor === '') {
            return 'Sin respuesta';
        }

        $valorOriginal = trim((string) $valor);
        $valorNormalizado = strtolower($valorOriginal);

        $mapa = [
            'a' => 'opcion_a',
            'opcion_a' => 'opcion_a',
            'b' => 'opcion_b',
            'opcion_b' => 'opcion_b',
            'c' => 'opcion_c',
            'opcion_c' => 'opcion_c',
            'd' => 'opcion_d',
            'opcion_d' => 'opcion_d',
            'e' => 'opcion_e',
            'opcion_e' => 'opcion_e',
        ];

        if (
            isset($mapa[$valorNormalizado]) &&
            !empty($pregunta->{$mapa[$valorNormalizado]})
        ) {
            return strtoupper(substr($valorNormalizado, -1))
                . '. '
                . $pregunta->{$mapa[$valorNormalizado]};
        }

        return $valorOriginal;
    };

    $calificacionMatematicas = $evaluacionMatematicas?->calificacion;

    $calificacionClase = match (true) {
        $calificacionMatematicas === null => 'icon-orange',
        (float) $calificacionMatematicas >= 90 => 'icon-green',
        (float) $calificacionMatematicas >= 80 => 'icon-orange',
        default => 'icon-red',
    };
@endphp

<nav class="topbar">
    <div class="container py-3">
        <div class="d-flex align-items-center justify-content-between gap-3">
            <div class="d-flex align-items-center gap-3">
                <div class="brand-symbol">
                    <i class="fa-solid fa-chart-column"></i>
                </div>

                <div>
                    <p class="brand-title">
                        SEFINSA EVALÚA
                    </p>

                    <p class="brand-subtitle">
                        Centro de revisión para Recursos Humanos
                    </p>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button
                    type="button"
                    class="btn btn-sm btn-outline-primary rounded-pill px-3 btn-print"
                    onclick="window.print()"
                >
                    <i class="fa-solid fa-print me-1"></i>
                    Imprimir
                </button>

                <a
                    href="{{ route('candidatos.show', $candidato) }}"
                    class="btn btn-sm btn-back px-3"
                >
                    <i class="fa-solid fa-arrow-left me-1"></i>
                    Expediente
                </a>
            </div>
        </div>
    </div>
</nav>

<main class="main-container">

    <section class="hero">
        <div class="hero-content">
            <div class="hero-label">
                <i class="fa-solid fa-file-shield"></i>
                Expediente de evaluación
            </div>

            <h1>
                {{ $candidato->nombre_completo }}
            </h1>

            <p>
                Consulta los resultados generales y revisa cada respuesta
                registrada durante las evaluaciones del candidato.
            </p>

            <div class="candidate-data">
                <div class="candidate-chip">
                    <i class="fa-solid fa-briefcase"></i>

                    <div>
                        <small>Puesto solicitado</small>
                        <strong>
                            {{ $candidato->puesto_solicitado ?: 'No registrado' }}
                        </strong>
                    </div>
                </div>

                <div class="candidate-chip">
                    <i class="fa-solid fa-user"></i>

                    <div>
                        <small>Usuario</small>
                        <strong>
                            {{ $candidato->usuario }}
                        </strong>
                    </div>
                </div>

                <div class="candidate-chip">
                    <i class="fa-solid fa-circle-check"></i>

                    <div>
                        <small>Estado general</small>
                        <strong>
                            {{ $evaluacionPsicometrica?->estado === 'finalizada'
                                ? 'Proceso finalizado'
                                : 'Proceso activo' }}
                        </strong>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <h2 class="section-title">
        <i class="fa-solid fa-chart-pie me-2"></i>
        Resumen general
    </h2>

    <div class="row g-4">

        <div class="col-md-6 col-xl-3">
            <article class="summary-card">
                <div class="summary-icon {{ $calificacionClase }}">
                    <i class="fa-solid fa-percent"></i>
                </div>

                <div class="summary-label">
                    Calificación matemática
                </div>

                <p class="summary-value">
                    {{ $calificacionMatematicas !== null
                        ? number_format((float) $calificacionMatematicas, 2) . '%'
                        : '—' }}
                </p>

                <p class="summary-help">
                    Resultado automático del examen.
                </p>
            </article>
        </div>

        <div class="col-md-6 col-xl-3">
            <article class="summary-card">
                <div class="summary-icon icon-green">
                    <i class="fa-solid fa-check"></i>
                </div>

                <div class="summary-label">
                    Respuestas correctas
                </div>

                <p class="summary-value">
                    {{ $evaluacionMatematicas?->respuestas_correctas
                        ?? $respuestasCorrectas }}
                </p>

                <p class="summary-help">
                    Reactivos matemáticos acertados.
                </p>
            </article>
        </div>

        <div class="col-md-6 col-xl-3">
            <article class="summary-card">
                <div class="summary-icon icon-red">
                    <i class="fa-solid fa-xmark"></i>
                </div>

                <div class="summary-label">
                    Respuestas incorrectas
                </div>

                <p class="summary-value">
                    {{ $evaluacionMatematicas?->respuestas_incorrectas
                        ?? $respuestasIncorrectas }}
                </p>

                <p class="summary-help">
                    Reactivos matemáticos incorrectos.
                </p>
            </article>
        </div>

        <div class="col-md-6 col-xl-3">
            <article class="summary-card">
                <div class="summary-icon icon-orange">
                    <i class="fa-solid fa-brain"></i>
                </div>

                <div class="summary-label">
                    Psicométrico
                </div>

                <p class="summary-value">
                    {{ $contestadasPsicometrico }}
                </p>

                <p class="summary-help">
                    Respuestas psicométricas registradas.
                </p>
            </article>
        </div>

    </div>

    {{-- MATEMÁTICAS --}}
    <section class="exam-panel">
        <div class="exam-panel-header math-header">
            <div class="exam-title-group">
                <div class="exam-title-icon">
                    <i class="fa-solid fa-calculator"></i>
                </div>

                <div>
                    <h2>Evaluación de Matemáticas</h2>

                    <p>
                        Revisión detallada de respuestas y calificación.
                    </p>
                </div>
            </div>

            <span class="status-badge {{ $estadoClase($evaluacionMatematicas?->estado) }}">
                {{ $estadoTexto($evaluacionMatematicas?->estado) }}
            </span>
        </div>

        @if ($evaluacionMatematicas)
            <div class="exam-metrics">
                <div class="metric">
                    <span>Calificación</span>

                    <strong>
                        {{ $evaluacionMatematicas->calificacion !== null
                            ? number_format((float) $evaluacionMatematicas->calificacion, 2) . '%'
                            : 'Sin calcular' }}
                    </strong>
                </div>

                <div class="metric">
                    <span>Contestadas</span>

                    <strong>
                        {{ $contestadasMatematicas }}
                        de
                        {{ $totalMatematicas }}
                    </strong>
                </div>

                <div class="metric">
                    <span>Duración</span>

                    <strong>
                        {{ $formatearDuracion($evaluacionMatematicas->duracion_segundos) }}
                    </strong>
                </div>

                <div class="metric">
                    <span>Finalización</span>

                    <strong>
                        {{ $evaluacionMatematicas->fecha_finalizacion
                            ? $evaluacionMatematicas->fecha_finalizacion->format('d/m/Y H:i')
                            : 'Sin finalizar' }}
                    </strong>
                </div>
            </div>

            <div class="questions-wrapper">
                <div class="accordion" id="accordionMatematicas">

                    <div class="accordion-item border-0">
                        <h2 class="accordion-header">
                            <button
                                class="accordion-button"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#detalleMatematicas"
                            >
                                <i class="fa-solid fa-list-check me-2"></i>
                                Ver respuestas de Matemáticas
                            </button>
                        </h2>

                        <div
                            id="detalleMatematicas"
                            class="accordion-collapse collapse show"
                        >
                            <div class="accordion-body px-0 pb-0">

                                @foreach ($preguntasMatematicas as $indice => $pregunta)
                                    @php
                                        $respuesta = $evaluacionMatematicas
                                            ->respuestas
                                            ->firstWhere('pregunta_id', $pregunta->id);

                                        $respondida = $respuesta !== null;

                                        $esCorrecta = $respondida
                                            ? $respuesta->es_correcta
                                            : null;

                                        $clasePregunta = !$respondida
                                            ? 'unanswered'
                                            : ($esCorrecta ? 'correct' : 'incorrect');

                                        $respuestaCandidato = $respondida
                                            ? (
                                                $respuesta->respuesta_texto
                                                ?: $obtenerTextoOpcion(
                                                    $pregunta,
                                                    $respuesta->respuesta_seleccionada
                                                )
                                            )
                                            : 'Sin respuesta';

                                        $respuestaCorrecta = $obtenerTextoOpcion(
                                            $pregunta,
                                            $pregunta->respuesta_correcta
                                        );
                                    @endphp

                                    <article class="question-card {{ $clasePregunta }}">
                                        <div class="question-top">
                                            <span class="question-number">
                                                Pregunta {{ $indice + 1 }}
                                            </span>

                                            @if (!$respondida)
                                                <span class="result-chip result-unanswered">
                                                    <i class="fa-solid fa-minus"></i>
                                                    Sin contestar
                                                </span>
                                            @elseif ($esCorrecta)
                                                <span class="result-chip result-correct">
                                                    <i class="fa-solid fa-check"></i>
                                                    Correcta
                                                </span>
                                            @else
                                                <span class="result-chip result-incorrect">
                                                    <i class="fa-solid fa-xmark"></i>
                                                    Incorrecta
                                                </span>
                                            @endif
                                        </div>

                                        <p class="question-text">
                                            {{ $pregunta->pregunta }}
                                        </p>

                                        <div class="answer-grid">
                                            <div class="answer-box">
                                                <span>
                                                    Respuesta del candidato
                                                </span>

                                                <strong>
                                                    {{ $respuestaCandidato }}
                                                </strong>
                                            </div>

                                            <div class="answer-box">
                                                <span>
                                                    Respuesta correcta
                                                </span>

                                                <strong>
                                                    {{ $respuestaCorrecta }}
                                                </strong>
                                            </div>

                                            <div class="answer-box">
                                                <span>
                                                    Categoría
                                                </span>

                                                <strong>
                                                    {{ $pregunta->categoria ?: 'General' }}
                                                </strong>
                                            </div>

                                            <div class="answer-box">
                                                <span>
                                                    Puntaje obtenido
                                                </span>

                                                <strong>
                                                    {{ $respuesta?->puntaje_obtenido !== null
                                                        ? number_format(
                                                            (float) $respuesta->puntaje_obtenido,
                                                            2
                                                        )
                                                        : '0' }}
                                                    /
                                                    {{ $pregunta->valor ?? $pregunta->puntaje_maximo ?? 0 }}
                                                </strong>
                                            </div>
                                        </div>
                                    </article>
                                @endforeach

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @else
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="fa-solid fa-calculator"></i>
                </div>

                <h3>Evaluación no iniciada</h3>

                <p>
                    El candidato todavía no cuenta con una evaluación
                    matemática registrada.
                </p>
            </div>
        @endif
    </section>

    {{-- PSICOMÉTRICO --}}
    <section class="exam-panel">
        <div class="exam-panel-header psycho-header">
            <div class="exam-title-group">
                <div class="exam-title-icon">
                    <i class="fa-solid fa-brain"></i>
                </div>

                <div>
                    <h2>Evaluación Psicométrica</h2>

                    <p>
                        Consulta las respuestas de personalidad y competencias.
                    </p>
                </div>
            </div>

            <span class="status-badge {{ $estadoClase($evaluacionPsicometrica?->estado) }}">
                {{ $estadoTexto($evaluacionPsicometrica?->estado) }}
            </span>
        </div>

        @if ($evaluacionPsicometrica)
            <div class="exam-metrics">
                <div class="metric">
                    <span>Reactivos totales</span>

                    <strong>
                        {{ $totalPsicometrico }}
                    </strong>
                </div>

                <div class="metric">
                    <span>Contestadas</span>

                    <strong>
                        {{ $contestadasPsicometrico }}
                    </strong>
                </div>

                <div class="metric">
                    <span>Duración</span>

                    <strong>
                        {{ $formatearDuracion(
                            $evaluacionPsicometrica->duracion_segundos
                        ) }}
                    </strong>
                </div>

                <div class="metric">
                    <span>Finalización</span>

                    <strong>
                        {{ $evaluacionPsicometrica->fecha_finalizacion
                            ? $evaluacionPsicometrica->fecha_finalizacion
                                ->format('d/m/Y H:i')
                            : 'Sin finalizar' }}
                    </strong>
                </div>
            </div>

            <div class="questions-wrapper">
                <div class="accordion" id="accordionPsicometrico">

                    <div class="accordion-item border-0">
                        <h2 class="accordion-header">
                            <button
                                class="accordion-button collapsed"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#detallePsicometrico"
                            >
                                <i class="fa-solid fa-clipboard-list me-2"></i>
                                Ver respuestas psicométricas
                            </button>
                        </h2>

                        <div
                            id="detallePsicometrico"
                            class="accordion-collapse collapse"
                        >
                            <div class="accordion-body px-0 pb-0">

                                @foreach ($preguntasPsicometricas as $indice => $pregunta)
                                    @php
                                        $respuesta = $evaluacionPsicometrica
                                            ->respuestas
                                            ->firstWhere('pregunta_id', $pregunta->id);

                                        $respuestaCandidato = $respuesta
                                            ? (
                                                $respuesta->respuesta_texto
                                                ?: $obtenerTextoOpcion(
                                                    $pregunta,
                                                    $respuesta->respuesta_seleccionada
                                                )
                                            )
                                            : 'Sin respuesta';
                                    @endphp

                                    <article class="question-card {{ $respuesta ? '' : 'unanswered' }}">
                                        <div class="question-top">
                                            <span class="question-number">
                                                Reactivo {{ $indice + 1 }}
                                            </span>

                                            @if ($respuesta)
                                                <span class="result-chip result-correct">
                                                    <i class="fa-solid fa-check"></i>
                                                    Contestada
                                                </span>
                                            @else
                                                <span class="result-chip result-unanswered">
                                                    <i class="fa-solid fa-minus"></i>
                                                    Sin contestar
                                                </span>
                                            @endif
                                        </div>

                                        <p class="question-text">
                                            {{ $pregunta->pregunta }}
                                        </p>

                                        <div class="answer-grid">
                                            <div class="answer-box">
                                                <span>
                                                    Respuesta seleccionada
                                                </span>

                                                <strong>
                                                    {{ $respuestaCandidato }}
                                                </strong>
                                            </div>

                                            <div class="answer-box">
                                                <span>
                                                    Categoría
                                                </span>

                                                <strong>
                                                    {{ $pregunta->categoria ?: 'General' }}
                                                </strong>
                                            </div>

                                            <div class="answer-box">
                                                <span>
                                                    Sección
                                                </span>

                                                <strong>
                                                    {{ $pregunta->seccion ?: 'General' }}
                                                </strong>
                                            </div>

                                            <div class="answer-box">
                                                <span>
                                                    Tiempo de respuesta
                                                </span>

                                                <strong>
                                                    {{ $respuesta?->tiempo_respuesta_segundos
                                                        ? $respuesta->tiempo_respuesta_segundos . ' segundos'
                                                        : 'Sin registro' }}
                                                </strong>
                                            </div>
                                        </div>
                                    </article>
                                @endforeach

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @else
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="fa-solid fa-brain"></i>
                </div>

                <h3>Evaluación no iniciada</h3>

                <p>
                    El candidato todavía no cuenta con una evaluación
                    psicométrica registrada.
                </p>
            </div>
        @endif
    </section>

</main>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>

</body>
</html>

