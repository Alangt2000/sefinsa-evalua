<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>
        Examen Psicométrico
    </title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            color: #1f2937;
        }

        .encabezado {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: #ffffff;
            border-bottom: 1px solid #dbe2ea;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }

        .encabezado-contenido {
            max-width: 1100px;
            margin: auto;
            padding: 18px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .titulo h1 {
            font-size: 24px;
            color: #172554;
            margin-bottom: 4px;
        }

        .titulo p {
            font-size: 14px;
            color: #64748b;
        }

        .temporizador {
            min-width: 140px;
            padding: 12px 18px;
            border-radius: 12px;
            background: #172554;
            color: white;
            text-align: center;
        }

        .temporizador span {
            display: block;
            font-size: 13px;
            margin-bottom: 3px;
            opacity: 0.85;
        }

        .temporizador strong {
            font-size: 23px;
        }

        .contenedor {
            max-width: 1100px;
            margin: 35px auto;
            padding: 0 24px 50px;
        }

        .aviso {
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            color: #1e3a8a;
            border-radius: 12px;
            padding: 16px 18px;
            margin-bottom: 24px;
            line-height: 1.5;
        }

        .seccion-titulo {
            margin: 35px 0 18px;
            padding: 16px 20px;
            background: #172554;
            color: white;
            border-radius: 12px;
        }

        .seccion-titulo h2 {
            font-size: 20px;
            margin-bottom: 4px;
        }

        .seccion-titulo p {
            font-size: 14px;
            opacity: 0.85;
        }

        .pregunta-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 20px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.05);
        }

        .pregunta-numero {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 8px;
            background: #e0e7ff;
            color: #3730a3;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 12px;
        }

        .pregunta-texto {
            font-size: 17px;
            line-height: 1.55;
            margin-bottom: 18px;
            white-space: pre-line;
        }

        .opciones {
            display: grid;
            gap: 12px;
        }

        .opcion {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 14px 16px;
            border: 1px solid #cbd5e1;
            border-radius: 12px;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .opcion:hover {
            background: #f8fafc;
            border-color: #64748b;
        }

        .opcion input {
            margin-top: 3px;
            transform: scale(1.2);
        }

        .campo-texto,
        .campo-area {
            width: 100%;
            border: 1px solid #cbd5e1;
            border-radius: 12px;
            padding: 14px 16px;
            font-size: 16px;
            outline: none;
            transition: 0.2s ease;
        }

        .campo-texto:focus,
        .campo-area:focus {
            border-color: #1d4ed8;
            box-shadow: 0 0 0 3px rgba(29, 78, 216, 0.12);
        }

        .campo-area {
            min-height: 130px;
            resize: vertical;
        }

        .escala {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 10px;
        }

        .escala label {
            cursor: pointer;
        }

        .escala input {
            display: none;
        }

        .escala-boton {
            display: flex;
            min-height: 55px;
            align-items: center;
            justify-content: center;
            border: 1px solid #cbd5e1;
            border-radius: 12px;
            background: white;
            font-size: 18px;
            font-weight: bold;
            transition: 0.2s ease;
        }

        .escala input:checked + .escala-boton {
            background: #172554;
            border-color: #172554;
            color: white;
        }

        .estado-guardado {
            margin-top: 12px;
            min-height: 18px;
            font-size: 13px;
            color: #15803d;
        }

        .acciones {
            margin-top: 35px;
            display: flex;
            justify-content: flex-end;
        }

        .boton-finalizar {
            border: none;
            border-radius: 12px;
            padding: 15px 28px;
            background: #172554;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .boton-finalizar:hover {
            background: #1e3a8a;
            transform: translateY(-1px);
        }

        .boton-finalizar:disabled {
            opacity: 0.65;
            cursor: not-allowed;
        }

        @media (max-width: 700px) {
            .encabezado-contenido {
                align-items: flex-start;
                flex-direction: column;
            }

            .temporizador {
                width: 100%;
            }

            .contenedor {
                padding: 0 14px 35px;
            }

            .pregunta-card {
                padding: 18px;
            }

            .escala {
                grid-template-columns: repeat(5, 1fr);
            }

            .escala-boton {
                min-height: 48px;
            }

            .acciones {
                justify-content: stretch;
            }

            .boton-finalizar {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<header class="encabezado">
    <div class="encabezado-contenido">

        <div class="titulo">
            <h1>Examen Psicométrico</h1>

            <p>
                Candidato:
                {{ $candidato->nombre_completo }}
            </p>
        </div>

        <div class="temporizador">
            <span>Tiempo restante</span>

            <strong id="temporizador">
                60:00
            </strong>
        </div>

    </div>
</header>

<main class="contenedor">

    <div class="aviso">
        Tus respuestas se guardan automáticamente.
        Contesta con honestidad y evita cerrar o actualizar esta página.
    </div>

    @php
        $seccionActual = null;

        $respuestasGuardadas = $respuestasGuardadas ?? collect();

        $obtenerRespuesta = function ($preguntaId) use ($respuestasGuardadas) {
            return $respuestasGuardadas->get($preguntaId);
        };
    @endphp

    @foreach ($preguntas as $pregunta)

        @if ($seccionActual !== $pregunta->seccion)

            @php
                $seccionActual = $pregunta->seccion;
            @endphp

            <div class="seccion-titulo">
                <h2>
                    {{ $pregunta->seccion ?: 'Sección general' }}
                </h2>

                <p>
                    Lee cada pregunta y selecciona o escribe tu respuesta.
                </p>
            </div>

        @endif

        @php
            $respuestaGuardada = $obtenerRespuesta($pregunta->id);

            $seleccionGuardada =
                $respuestaGuardada?->respuesta_seleccionada;

            $textoGuardado =
                $respuestaGuardada?->respuesta_texto;
        @endphp

        <section class="pregunta-card"
                 data-pregunta-id="{{ $pregunta->id }}">

            <span class="pregunta-numero">
                Pregunta {{ $pregunta->orden }}
            </span>

            <div class="pregunta-texto">
                {{ $pregunta->pregunta }}
            </div>

            @if ($pregunta->tipo_pregunta === 'opcion_multiple')

                <div class="opciones">

                    @foreach (['a', 'b', 'c', 'd', 'e'] as $letra)

                        @php
                            $campo = 'opcion_' . $letra;
                            $textoOpcion = $pregunta->$campo;
                        @endphp

                        @if (!empty($textoOpcion))

                            <label class="opcion">

                                <input
                                    type="radio"
                                    name="pregunta_{{ $pregunta->id }}"
                                    value="{{ $letra }}"
                                    class="respuesta-seleccionada"
                                    @checked(
                                        strtolower((string) $seleccionGuardada)
                                        === $letra
                                    )
                                >

                                <span>
                                    <strong>
                                        {{ strtoupper($letra) }}.
                                    </strong>

                                    {{ $textoOpcion }}
                                </span>

                            </label>

                        @endif

                    @endforeach

                </div>

            @elseif ($pregunta->tipo_pregunta === 'respuesta_corta')

                <input
                    type="text"
                    class="campo-texto respuesta-texto"
                    value="{{ $textoGuardado }}"
                    placeholder="Escribe tu respuesta"
                    autocomplete="off"
                >

            @elseif ($pregunta->tipo_pregunta === 'escala')

                <div class="escala">

                    @for ($valor = 1; $valor <= 5; $valor++)

                        <label>

                            <input
                                type="radio"
                                name="pregunta_{{ $pregunta->id }}"
                                value="{{ $valor }}"
                                class="respuesta-seleccionada"
                                @checked(
                                    (string) $seleccionGuardada
                                    === (string) $valor
                                )
                            >

                            <span class="escala-boton">
                                {{ $valor }}
                            </span>

                        </label>

                    @endfor

                </div>

            @elseif ($pregunta->tipo_pregunta === 'abierta')

                <textarea
                    class="campo-area respuesta-texto"
                    placeholder="Escribe tu respuesta"
                >{{ $textoGuardado }}</textarea>

            @else

                <div class="aviso">
                    Tipo de pregunta no reconocido:
                    {{ $pregunta->tipo_pregunta }}
                </div>

            @endif

            <div class="estado-guardado"></div>

        </section>

    @endforeach

    <form
        id="form-finalizar"
        method="POST"
        action="{{ route('candidato.psicometrico.finalizar') }}"
    >
        @csrf

        <div class="acciones">

            <button
                type="submit"
                class="boton-finalizar"
                id="boton-finalizar"
            >
                Finalizar y enviar examen
            </button>

        </div>
    </form>

</main>

<script>
    const urlGuardar =
        @json(route('candidato.psicometrico.guardar'));

    const tokenCsrf =
        document.querySelector('meta[name="csrf-token"]').content;

    let tiempoRestante =
        Number(@json($tiempoRestante ?? 3600));

    let examenFinalizando = false;

    const temporizador =
        document.getElementById('temporizador');

    const formularioFinalizar =
        document.getElementById('form-finalizar');

    const botonFinalizar =
        document.getElementById('boton-finalizar');

    function mostrarTiempo() {
        const minutos =
            Math.floor(tiempoRestante / 60);

        const segundos =
            tiempoRestante % 60;

        temporizador.textContent =
            String(minutos).padStart(2, '0') +
            ':' +
            String(segundos).padStart(2, '0');
    }

    async function guardarRespuesta(tarjeta) {
        const preguntaId =
            tarjeta.dataset.preguntaId;

        const seleccion =
            tarjeta.querySelector(
                '.respuesta-seleccionada:checked'
            );

        const campoTexto =
            tarjeta.querySelector('.respuesta-texto');

        const estado =
            tarjeta.querySelector('.estado-guardado');

        const datos = {
            pregunta_id: preguntaId,
            respuesta_seleccionada:
                seleccion ? seleccion.value : null,
            respuesta_texto:
                campoTexto ? campoTexto.value.trim() : null
        };

        estado.textContent = 'Guardando...';

        try {
            const respuesta = await fetch(urlGuardar, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': tokenCsrf
                },
                body: JSON.stringify(datos)
            });

            const resultado = await respuesta.json();

            if (!respuesta.ok || !resultado.ok) {
                throw new Error(
                    resultado.mensaje ||
                    'No fue posible guardar.'
                );
            }

            estado.textContent = 'Respuesta guardada';

            setTimeout(() => {
                if (estado.textContent === 'Respuesta guardada') {
                    estado.textContent = '';
                }
            }, 1800);

        } catch (error) {
            estado.textContent =
                error.message || 'Error al guardar.';
        }
    }

    document.querySelectorAll('.pregunta-card')
        .forEach((tarjeta) => {

            tarjeta
                .querySelectorAll('.respuesta-seleccionada')
                .forEach((campo) => {
                    campo.addEventListener('change', () => {
                        guardarRespuesta(tarjeta);
                    });
                });

            const campoTexto =
                tarjeta.querySelector('.respuesta-texto');

            if (campoTexto) {
                let temporizadorEscritura;

                campoTexto.addEventListener('input', () => {
                    clearTimeout(temporizadorEscritura);

                    temporizadorEscritura = setTimeout(() => {
                        guardarRespuesta(tarjeta);
                    }, 700);
                });

                campoTexto.addEventListener('blur', () => {
                    clearTimeout(temporizadorEscritura);
                    guardarRespuesta(tarjeta);
                });
            }
        });

    formularioFinalizar.addEventListener('submit', (evento) => {
        if (examenFinalizando) {
            return;
        }

        const confirmar = window.confirm(
            '¿Seguro que deseas finalizar? ' +
            'Después de enviarlo ya no podrás ingresar nuevamente.'
        );

        if (!confirmar) {
            evento.preventDefault();
            return;
        }

        examenFinalizando = true;
        botonFinalizar.disabled = true;
        botonFinalizar.textContent = 'Enviando examen...';
    });

    mostrarTiempo();

    const intervalo = setInterval(() => {
        if (examenFinalizando) {
            clearInterval(intervalo);
            return;
        }

        tiempoRestante--;

        if (tiempoRestante <= 0) {
            tiempoRestante = 0;
            mostrarTiempo();

            examenFinalizando = true;
            botonFinalizar.disabled = true;
            botonFinalizar.textContent =
                'Tiempo agotado. Enviando...';

            clearInterval(intervalo);

            formularioFinalizar.submit();
            return;
        }

        mostrarTiempo();
    }, 1000);
</script>

</body>
</html>

