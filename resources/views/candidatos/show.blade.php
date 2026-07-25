<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Expediente | SEFINSA Evalúa</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>
        :root {
            --azul-oscuro: #102b4e;
            --azul: #2563eb;
            --fondo: #f4f7fb;
            --texto: #172033;
            --texto-suave: #718096;
            --borde: #e4eaf2;
            --verde: #16a34a;
            --amarillo: #d97706;
            --rojo: #dc2626;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: "Inter", sans-serif;
            background: var(--fondo);
            color: var(--texto);
        }

        .barra {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 20px 35px;
            background: var(--azul-oscuro);
            color: white;
        }

        .barra h1 {
            margin: 0;
            font-size: 20px;
        }

        .barra p {
            margin: 5px 0 0;
            color: #bfd0e5;
            font-size: 11px;
        }

        .boton-regresar {
            padding: 11px 16px;
            border: 1px solid rgba(255,255,255,.25);
            border-radius: 11px;
            color: white;
            font-size: 11px;
            font-weight: 700;
            text-decoration: none;
        }

        main {
            max-width: 1100px;
            margin: auto;
            padding: 35px 25px;
        }

        .encabezado {
            display: flex;
            align-items: center;
            gap: 18px;
            margin-bottom: 24px;
            padding: 25px;
            border-radius: 20px;
            background: linear-gradient(135deg, #173b68, #2563a9);
            color: white;
            box-shadow: 0 18px 45px rgba(15,39,71,.15);
        }

        .avatar {
            width: 68px;
            height: 68px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border-radius: 18px;
            background: rgba(255,255,255,.15);
            font-size: 22px;
            font-weight: 800;
        }

        .encabezado h2 {
            margin: 0;
            font-size: 24px;
        }

        .encabezado p {
            margin: 7px 0 0;
            color: #d8e4f2;
            font-size: 12px;
        }

        .rejilla {
            display: grid;
            grid-template-columns: 1.3fr .7fr;
            gap: 22px;
        }

        .panel {
            overflow: hidden;
            border: 1px solid var(--borde);
            border-radius: 19px;
            background: white;
            box-shadow: 0 10px 30px rgba(29,51,84,.06);
        }

        .panel-titulo {
            padding: 20px 22px;
            border-bottom: 1px solid var(--borde);
        }

        .panel-titulo h3 {
            margin: 0;
            font-size: 15px;
        }

        .panel-titulo p {
            margin: 5px 0 0;
            color: var(--texto-suave);
            font-size: 10px;
        }

        .datos {
            padding: 8px 22px;
        }

        .dato {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 15px 0;
            border-bottom: 1px solid #eef2f6;
        }

        .dato:last-child {
            border-bottom: 0;
        }

        .dato span {
            color: var(--texto-suave);
            font-size: 11px;
        }

        .dato strong {
            font-size: 11px;
            text-align: right;
        }

        .estado {
            display: inline-flex;
            padding: 7px 10px;
            border-radius: 999px;
            font-size: 10px;
            font-weight: 800;
        }

        .estado-pendiente {
            background: #fff8e7;
            color: #b45309;
        }

        .estado-en_proceso {
            background: #eaf1ff;
            color: #1d4ed8;
        }

        .estado-finalizado {
            background: #ecfdf3;
            color: #15803d;
        }

        .estado-bloqueado {
            background: #fff1f1;
            color: #b91c1c;
        }

        .acceso-activo {
            color: var(--verde);
        }

        .acceso-inactivo {
            color: var(--rojo);
        }

        .evaluacion {
            padding: 22px;
        }

        .evaluacion-vacia {
            padding: 25px 18px;
            border: 1px dashed #cbd5e1;
            border-radius: 14px;
            background: #f8fafc;
            text-align: center;
        }

        .evaluacion-vacia strong {
            display: block;
            margin-bottom: 7px;
            font-size: 13px;
        }

        .evaluacion-vacia p {
            margin: 0;
            color: var(--texto-suave);
            font-size: 10px;
            line-height: 1.6;
        }

        .alerta-exito {
    margin-bottom: 22px;
    padding: 14px 17px;
    border: 1px solid #bbf7d0;
    border-radius: 12px;
    background: #f0fdf4;
    color: #15803d;
    font-size: 11px;
    font-weight: 700;
}

.acciones-candidato {
    display: flex;
    flex-wrap: wrap;
    gap: 11px;
    margin-bottom: 22px;
}

.acciones-candidato form {
    margin: 0;
}

.boton-accion {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 11px 15px;
    border-radius: 11px;
    font-family: inherit;
    font-size: 11px;
    font-weight: 800;
    text-decoration: none;
    cursor: pointer;
}

.boton-editar {
    border: 1px solid #bfdbfe;
    background: #eff6ff;
    color: #1d4ed8;
}

.boton-acceso {
    border: 1px solid #fed7aa;
    background: #fff7ed;
    color: #c2410c;
}

.boton-activar {
    border: 1px solid #bbf7d0;
    background: #f0fdf4;
    color: #15803d;
}

.panel-resultados {
    grid-column: 1 / -1;
}

.resultados-contenido {
    padding: 22px;
}

.resultados-rejilla {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 18px;
}

.resultado-card {
    overflow: hidden;
    border: 1px solid var(--borde);
    border-radius: 17px;
    background: #ffffff;
}

.resultado-card.matematicas {
    border-top: 5px solid #2563a9;
}

.resultado-card.psicometrico {
    border-top: 5px solid #f28c28;
}

.resultado-cabecera {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    padding: 18px 19px;
    border-bottom: 1px solid var(--borde);
}

.resultado-identidad {
    display: flex;
    align-items: center;
    gap: 12px;
}

.resultado-icono {
    width: 43px;
    height: 43px;
    display: grid;
    place-items: center;
    flex-shrink: 0;
    border-radius: 13px;
    font-size: 19px;
}

.matematicas .resultado-icono {
    background: #eaf1ff;
    color: #2563a9;
}

.psicometrico .resultado-icono {
    background: #fff3e5;
    color: #d96f0b;
}

.resultado-identidad h4 {
    margin: 0;
    font-size: 14px;
    color: var(--azul-oscuro);
}

.resultado-identidad p {
    margin: 4px 0 0;
    color: var(--texto-suave);
    font-size: 10px;
}

.insignia-evaluacion {
    display: inline-flex;
    align-items: center;
    padding: 7px 10px;
    border-radius: 999px;
    font-size: 9px;
    font-weight: 800;
}

.insignia-finalizada {
    background: #ecfdf3;
    color: #15803d;
}

.insignia-proceso {
    background: #eaf1ff;
    color: #1d4ed8;
}

.insignia-pendiente {
    background: #fff8e7;
    color: #b45309;
}

.resultado-cuerpo {
    padding: 20px;
}

.calificacion-principal {
    margin-bottom: 20px;
}

.calificacion-superior {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 15px;
    margin-bottom: 10px;
}

.calificacion-superior span {
    color: var(--texto-suave);
    font-size: 10px;
    font-weight: 600;
}

.calificacion-superior strong {
    color: var(--azul-oscuro);
    font-size: 29px;
    line-height: 1;
}

.barra-resultado {
    height: 10px;
    overflow: hidden;
    border-radius: 999px;
    background: #edf1f5;
}

.barra-resultado div {
    height: 100%;
    border-radius: inherit;
    transition: width .4s ease;
}

.barra-matematicas {
    background: linear-gradient(90deg, #173b68, #2563a9);
}

.barra-psicometrico {
    background: linear-gradient(90deg, #d96f0b, #f28c28);
}

.metricas-evaluacion {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 11px;
}

.metrica {
    padding: 13px;
    border: 1px solid #edf1f5;
    border-radius: 12px;
    background: #fafcff;
}

.metrica span {
    display: block;
    margin-bottom: 6px;
    color: var(--texto-suave);
    font-size: 9px;
}

.metrica strong {
    color: var(--texto);
    font-size: 12px;
}

.resultado-pendiente {
    padding: 24px 18px;
    border: 1px dashed #cbd5e1;
    border-radius: 14px;
    background: #f8fafc;
    text-align: center;
}

.resultado-pendiente strong {
    display: block;
    margin-bottom: 7px;
    color: var(--azul-oscuro);
    font-size: 13px;
}

.resultado-pendiente p {
    margin: 0;
    color: var(--texto-suave);
    font-size: 10px;
    line-height: 1.6;
}

.recomendacion {
    margin-top: 19px;
    padding: 21px;
    border-radius: 17px;
}

.recomendacion-verde {
    border: 1px solid #bbf7d0;
    background: linear-gradient(135deg, #f0fdf4, #ecfdf3);
}

.recomendacion-amarilla {
    border: 1px solid #fde68a;
    background: linear-gradient(135deg, #fffbeb, #fff8e7);
}

.recomendacion-roja {
    border: 1px solid #fecaca;
    background: linear-gradient(135deg, #fef2f2, #fff1f1);
}

.recomendacion-pendiente {
    border: 1px solid #bfdbfe;
    background: linear-gradient(135deg, #eff6ff, #eaf1ff);
}

.recomendacion-contenido {
    display: flex;
    align-items: center;
    gap: 15px;
}

.recomendacion-icono {
    width: 49px;
    height: 49px;
    display: grid;
    place-items: center;
    flex-shrink: 0;
    border-radius: 14px;
    background: rgba(255,255,255,.75);
    font-size: 22px;
}

.recomendacion h4 {
    margin: 0 0 5px;
    font-size: 14px;
}

.recomendacion p {
    margin: 0;
    color: #526071;
    font-size: 10px;
    line-height: 1.6;
}

.recomendacion-verde h4 {
    color: #15803d;
}

.recomendacion-amarilla h4 {
    color: #b45309;
}

.recomendacion-roja h4 {
    color: #b91c1c;
}

.recomendacion-pendiente h4 {
    color: #1d4ed8;
}

@media (max-width: 760px) {
    .resultados-rejilla {
        grid-template-columns: 1fr;
    }

    .resultado-cabecera {
        align-items: flex-start;
        flex-direction: column;
    }

    .recomendacion-contenido {
        align-items: flex-start;
    }
}

@media (max-width: 430px) {
    .metricas-evaluacion {
        grid-template-columns: 1fr;
    }
}

.boton-eliminar {
    border: 1px solid #fecaca;
    background: #fef2f2;
    color: #b91c1c;
}



        @media (max-width: 760px) {
            .barra {
                align-items: flex-start;
                padding: 18px 20px;
            }

            main {
                padding: 23px 14px;
            }

            .rejilla {
                grid-template-columns: 1fr;
            }

            .encabezado {
                align-items: flex-start;
            }

            .encabezado h2 {
                font-size: 19px;
            }

            .dato {
                align-items: flex-start;
                flex-direction: column;
                gap: 7px;
            }

            .dato strong {
                text-align: left;
            }

            .boton-evaluaciones {
    color: #ffffff;
    background: linear-gradient(135deg, #123b68, #1f6fa8);
    box-shadow: 0 10px 22px rgba(31, 111, 168, 0.22);
}

.boton-evaluaciones:hover {
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 14px 28px rgba(31, 111, 168, 0.3);
}

        }
    </style>
</head>

<body>

<header class="barra">
    <div>
        <h1>Expediente del candidato</h1>
        <p>Información general y seguimiento de evaluación.</p>
    </div>

    <a href="{{ route('candidatos.index') }}" class="boton-regresar">
        ← Regresar
    </a>
</header>

<main>

@if (session('success'))
    <div class="alerta-exito">
        {{ session('success') }}
    </div>
@endif

    @php
        $iniciales =
            strtoupper(substr($candidato->nombre, 0, 1)) .
            strtoupper(substr($candidato->apellido_paterno, 0, 1));
    @endphp

    <section class="encabezado">
        <div class="avatar">
            {{ $iniciales }}
        </div>

        <div>
            <h2>{{ $candidato->nombre_completo }}</h2>
            <p>{{ $candidato->puesto_solicitado }}</p>
        </div>
</section>

<div class="acciones-candidato">

    <a
        href="{{ route('examenes.index', $candidato) }}"
        class="boton-accion boton-evaluaciones"
    >
        📋 Ver evaluaciones
    </a>

    <a
        href="{{ route('candidatos.edit', $candidato) }}"
        class="boton-accion boton-editar"
    >
        ✏ Editar información
    </a>

    <form
        method="POST"
        action="{{ route('candidatos.cambiar-acceso', $candidato) }}"
        onsubmit="return confirm('¿Deseas cambiar el estado de acceso de este candidato?')"
    >
        @csrf
        @method('PATCH')

        <button
            type="submit"
            class="boton-accion {{ $candidato->credenciales_activas
                ? 'boton-acceso'
                : 'boton-activar' }}"
        >
            {{ $candidato->credenciales_activas
                ? '🔒 Desactivar credenciales'
                : '🔓 Activar credenciales' }}
        </button>
    </form>

    <form
        method="POST"
        action="{{ route('candidatos.destroy', $candidato) }}"
        onsubmit="return confirm('¿Eliminar definitivamente este candidato? Esta acción no se puede deshacer.')"
    >
        @csrf
        @method('DELETE')

        <button type="submit" class="boton-accion boton-eliminar">
            🗑 Eliminar candidato
        </button>
    </form>

</div>

    <section class="rejilla">

        @php
    $matematicasFinalizada =
        $evaluacionMatematicas &&
        $evaluacionMatematicas->estado === 'finalizada';

    $psicometricoFinalizado =
        $evaluacionPsicometrica &&
        $evaluacionPsicometrica->estado === 'finalizada';

    $calificacionMatematicas = $matematicasFinalizada
        ? (float) $evaluacionMatematicas->calificacion
        : 0;

    $calificacionPsicometrica = $psicometricoFinalizado
        ? (float) $evaluacionPsicometrica->calificacion
        : 0;

    $formatearDuracion = function ($segundos) {
        if (!$segundos) {
            return 'No disponible';
        }

        $minutos = intdiv((int) $segundos, 60);
        $segundosRestantes = (int) $segundos % 60;

        return "{$minutos} min {$segundosRestantes} s";
    };

    $ambasFinalizadas =
        $matematicasFinalizada &&
        $psicometricoFinalizado;

    $promedioGlobal = $ambasFinalizadas
        ? round(
            ($calificacionMatematicas + $calificacionPsicometrica) / 2,
            1
        )
        : null;

    if (!$ambasFinalizadas) {
        $claseRecomendacion = 'recomendacion-pendiente';
        $iconoRecomendacion = '⌛';
        $tituloRecomendacion = 'Evaluación incompleta';
        $textoRecomendacion =
            'La recomendación estará disponible cuando el candidato complete ambas evaluaciones.';
    } elseif ($promedioGlobal >= 80) {
        $claseRecomendacion = 'recomendacion-verde';
        $iconoRecomendacion = '✓';
        $tituloRecomendacion = 'Candidato recomendado';
        $textoRecomendacion =
            "Resultado global preliminar de {$promedioGlobal}%. El perfil presenta un desempeño favorable.";
    } elseif ($promedioGlobal >= 65) {
        $claseRecomendacion = 'recomendacion-amarilla';
        $iconoRecomendacion = '!';
        $tituloRecomendacion = 'Requiere entrevista';
        $textoRecomendacion =
            "Resultado global preliminar de {$promedioGlobal}%. Se recomienda complementar con entrevista de RH.";
    } else {
        $claseRecomendacion = 'recomendacion-roja';
        $iconoRecomendacion = '×';
        $tituloRecomendacion = 'Resultado por revisar';
        $textoRecomendacion =
            "Resultado global preliminar de {$promedioGlobal}%. RH debe revisar detalladamente el expediente.";
    }
@endphp

<article class="panel panel-resultados">

    <div class="panel-titulo">
        <h3>Resultados de evaluación</h3>

        <p>
            Calificaciones, avance y métricas registradas
            durante el proceso.
        </p>
    </div>

    <div class="resultados-contenido">

        <div class="resultados-rejilla">

            {{-- MATEMÁTICAS --}}
            <section class="resultado-card matematicas">

                <div class="resultado-cabecera">

                    <div class="resultado-identidad">
                        <div class="resultado-icono">
                            ∑
                        </div>

                        <div>
                            <h4>Examen matemático</h4>
                            <p>Razonamiento lógico y numérico</p>
                        </div>
                    </div>

                    @if ($matematicasFinalizada)
                        <span class="insignia-evaluacion insignia-finalizada">
                            Finalizado
                        </span>
                    @elseif (
                        $evaluacionMatematicas &&
                        $evaluacionMatematicas->estado === 'en_proceso'
                    )
                        <span class="insignia-evaluacion insignia-proceso">
                            En proceso
                        </span>
                    @else
                        <span class="insignia-evaluacion insignia-pendiente">
                            Pendiente
                        </span>
                    @endif

                </div>

                <div class="resultado-cuerpo">

                    @if ($evaluacionMatematicas)

                        <div class="calificacion-principal">

                            <div class="calificacion-superior">
                                <span>Calificación obtenida</span>

                                <strong>
                                    @if ($matematicasFinalizada)
                                        {{
                                            number_format(
                                                $calificacionMatematicas,
                                                1
                                            )
                                        }}%
                                    @else
                                        —
                                    @endif
                                </strong>
                            </div>

                            <div class="barra-resultado">
                                <div
                                    class="barra-matematicas"
                                    style="width: {{
                                        min(
                                            max($calificacionMatematicas, 0),
                                            100
                                        )
                                    }}%;"
                                ></div>
                            </div>

                        </div>

                        <div class="metricas-evaluacion">

                            <div class="metrica">
                                <span>Preguntas totales</span>
                                <strong>
                                    {{
                                        $evaluacionMatematicas
                                            ->total_preguntas ?? 0
                                    }}
                                </strong>
                            </div>

                            <div class="metrica">
                                <span>Respuestas correctas</span>
                                <strong>
                                    {{
                                        $evaluacionMatematicas
                                            ->respuestas_correctas ?? 0
                                    }}
                                </strong>
                            </div>

                            <div class="metrica">
                                <span>Respuestas incorrectas</span>
                                <strong>
                                    {{
                                        $evaluacionMatematicas
                                            ->respuestas_incorrectas ?? 0
                                    }}
                                </strong>
                            </div>

                            <div class="metrica">
                                <span>Sin contestar</span>
                                <strong>
                                    {{
                                        $evaluacionMatematicas
                                            ->respuestas_sin_contestar ?? 0
                                    }}
                                </strong>
                            </div>

                            <div class="metrica">
                                <span>Duración</span>
                                <strong>
                                    {{
                                        $formatearDuracion(
                                            $evaluacionMatematicas
                                                ->duracion_segundos
                                        )
                                    }}
                                </strong>
                            </div>

                            <div class="metrica">
                                <span>Fecha de finalización</span>
                                <strong>
                                    {{
                                        $evaluacionMatematicas
                                            ->fecha_finalizacion
                                            ?->format('d/m/Y H:i')
                                        ?? 'Pendiente'
                                    }}
                                </strong>
                            </div>

                        </div>

                    @else

                        <div class="resultado-pendiente">
                            <strong>Examen no iniciado</strong>

                            <p>
                                El candidato todavía no ha comenzado
                                la evaluación matemática.
                            </p>
                        </div>

                    @endif

                </div>

            </section>

            {{-- PSICOMÉTRICO --}}
            <section class="resultado-card psicometrico">

                <div class="resultado-cabecera">

                    <div class="resultado-identidad">
                        <div class="resultado-icono">
                            ◉
                        </div>

                        <div>
                            <h4>Examen psicométrico</h4>
                            <p>Perfil y características laborales</p>
                        </div>
                    </div>

                    @if ($psicometricoFinalizado)
                        <span class="insignia-evaluacion insignia-finalizada">
                            Finalizado
                        </span>
                    @elseif (
                        $evaluacionPsicometrica &&
                        $evaluacionPsicometrica->estado === 'en_proceso'
                    )
                        <span class="insignia-evaluacion insignia-proceso">
                            En proceso
                        </span>
                    @else
                        <span class="insignia-evaluacion insignia-pendiente">
                            Pendiente
                        </span>
                    @endif

                </div>

                <div class="resultado-cuerpo">

                    @if ($evaluacionPsicometrica)

                        <div class="calificacion-principal">

                            <div class="calificacion-superior">
                                <span>Resultado obtenido</span>

                                <strong>
                                    @if ($psicometricoFinalizado)
                                        {{
                                            number_format(
                                                $calificacionPsicometrica,
                                                1
                                            )
                                        }}%
                                    @else
                                        —
                                    @endif
                                </strong>
                            </div>

                            <div class="barra-resultado">
                                <div
                                    class="barra-psicometrico"
                                    style="width: {{
                                        min(
                                            max($calificacionPsicometrica, 0),
                                            100
                                        )
                                    }}%;"
                                ></div>
                            </div>

                        </div>

                        <div class="metricas-evaluacion">

                            <div class="metrica">
                                <span>Preguntas totales</span>
                                <strong>
                                    {{
                                        $evaluacionPsicometrica
                                            ->total_preguntas ?? 0
                                    }}
                                </strong>
                            </div>

                            <div class="metrica">
                                <span>Respuestas registradas</span>
                                <strong>
                                    {{
                                        $evaluacionPsicometrica
                                            ->respuestas
                                            ->count()
                                    }}
                                </strong>
                            </div>

                            <div class="metrica">
                                <span>Sin contestar</span>
                                <strong>
                                    {{
                                        $evaluacionPsicometrica
                                            ->respuestas_sin_contestar ?? 0
                                    }}
                                </strong>
                            </div>

                            <div class="metrica">
                                <span>Duración</span>
                                <strong>
                                    {{
                                        $formatearDuracion(
                                            $evaluacionPsicometrica
                                                ->duracion_segundos
                                        )
                                    }}
                                </strong>
                            </div>

                            <div class="metrica">
                                <span>Fecha de inicio</span>
                                <strong>
                                    {{
                                        $evaluacionPsicometrica
                                            ->fecha_inicio
                                            ?->format('d/m/Y H:i')
                                        ?? 'No iniciada'
                                    }}
                                </strong>
                            </div>

                            <div class="metrica">
                                <span>Fecha de finalización</span>
                                <strong>
                                    {{
                                        $evaluacionPsicometrica
                                            ->fecha_finalizacion
                                            ?->format('d/m/Y H:i')
                                        ?? 'Pendiente'
                                    }}
                                </strong>
                            </div>

                        </div>

                    @else

                        <div class="resultado-pendiente">
                            <strong>Examen no iniciado</strong>

                            <p>
                                El candidato todavía no ha comenzado
                                la evaluación psicométrica.
                            </p>
                        </div>

                    @endif

                </div>

            </section>

        </div>

        <section class="recomendacion {{ $claseRecomendacion }}">

            <div class="recomendacion-contenido">

                <div class="recomendacion-icono">
                    {{ $iconoRecomendacion }}
                </div>

                <div>
                    <h4>{{ $tituloRecomendacion }}</h4>
                    <p>{{ $textoRecomendacion }}</p>
                </div>

            </div>

        </section>

    </div>

</article>



    </section>

</main>

</body>
</html>
