<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Examen matemático | SEFINSA Evalúa</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">


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
            --azul-claro: #eaf1ff;
            --fondo: #f4f7fb;
            --texto: #172033;
            --texto-suave: #718096;
            --blanco: #ffffff;
            --borde: #dfe6ef;
            --verde: #15803d;
            --amarillo: #b45309;
            --rojo: #b91c1c;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            min-height: 100vh;
            font-family: "Inter", sans-serif;
            background: var(--fondo);
            color: var(--texto);
        }

        button,
        input,
        textarea {
            font: inherit;
        }

        .barra {
            position: sticky;
            top: 0;
            z-index: 100;
            min-height: 78px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 13px 30px;
            border-bottom: 1px solid var(--borde);
            background: rgba(255, 255, 255, .96);
            box-shadow: 0 5px 18px rgba(29, 51, 84, .06);
            backdrop-filter: blur(12px);
        }

        .marca {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .marca img {
            width: 49px;
            height: 49px;
            object-fit: contain;
            padding: 6px;
            border: 1px solid var(--borde);
            border-radius: 13px;
            background: white;
        }

        .marca strong {
            display: block;
            font-size: 15px;
        }

        .marca span {
            display: block;
            margin-top: 4px;
            color: var(--texto-suave);
            font-size: 10px;
        }

        .barra-derecha {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .progreso-superior {
            min-width: 180px;
        }

        .progreso-superior-texto {
            display: flex;
            justify-content: space-between;
            margin-bottom: 6px;
            color: var(--texto-suave);
            font-size: 9px;
            font-weight: 700;
        }

        .progreso-linea {
            height: 7px;
            overflow: hidden;
            border-radius: 999px;
            background: #e9eef5;
        }

        .progreso-linea span {
            display: block;
            width: 0;
            height: 100%;
            border-radius: inherit;
            background: var(--azul);
            transition: width .25s ease;
        }

        .cronometro {
            min-width: 125px;
            padding: 10px 14px;
            border: 1px solid #bfdbfe;
            border-radius: 12px;
            background: #eff6ff;
            text-align: center;
        }

        .cronometro small {
            display: block;
            color: #64748b;
            font-size: 8px;
            font-weight: 800;
            letter-spacing: .7px;
            text-transform: uppercase;
        }

        .cronometro strong {
            display: block;
            margin-top: 3px;
            color: var(--azul-oscuro);
            font-size: 17px;
        }

        .cronometro.alerta-tiempo {
            border-color: #fde68a;
            background: #fffbeb;
        }

        .cronometro.alerta-tiempo strong {
            color: var(--amarillo);
        }

        .cronometro.tiempo-agotado {
            border-color: #fecaca;
            background: #fef2f2;
        }

        .cronometro.tiempo-agotado strong {
            color: var(--rojo);
        }

        .contenido {
            width: min(1180px, calc(100% - 34px));
            margin: 28px auto 55px;
        }

        .encabezado {
            display: flex;
            justify-content: space-between;
            gap: 25px;
            padding: 27px 30px;
            border-radius: 21px;
            background:
                radial-gradient(
                    circle at top right,
                    rgba(255, 255, 255, .14),
                    transparent 30%
                ),
                linear-gradient(135deg, #102b4e, #245e9f);
            color: white;
            box-shadow: 0 18px 40px rgba(16, 43, 78, .14);
        }

        .encabezado-etiqueta {
            display: inline-block;
            margin-bottom: 11px;
            padding: 6px 10px;
            border-radius: 999px;
            background: rgba(255, 255, 255, .12);
            font-size: 9px;
            font-weight: 800;
            letter-spacing: .8px;
        }

        .encabezado h1 {
            font-size: 27px;
        }

        .encabezado p {
            max-width: 710px;
            margin-top: 10px;
            color: #d8e4f2;
            font-size: 12px;
            line-height: 1.7;
        }

        .encabezado-candidato {
            min-width: 220px;
            padding: 15px;
            border-radius: 14px;
            background: rgba(255, 255, 255, .10);
        }

        .encabezado-candidato small {
            display: block;
            color: #bcd0e5;
            font-size: 8px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .encabezado-candidato strong {
            display: block;
            margin-top: 5px;
            font-size: 11px;
        }

        .encabezado-candidato div + div {
            margin-top: 12px;
        }

        .distribucion {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 240px;
            align-items: start;
            gap: 20px;
            margin-top: 22px;
        }

        .lista-preguntas {
            display: grid;
            gap: 17px;
        }

        .pregunta {
            scroll-margin-top: 105px;
            padding: 24px;
            border: 1px solid var(--borde);
            border-radius: 18px;
            background: white;
            box-shadow: 0 9px 25px rgba(29, 51, 84, .05);
            transition: border-color .2s, box-shadow .2s;
        }

        .pregunta.respondida {
            border-color: #bbf7d0;
            box-shadow: 0 9px 25px rgba(22, 163, 74, .07);
        }

        .pregunta-encabezado {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
        }

        .pregunta-numero {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 38px;
            height: 30px;
            padding: 0 10px;
            border-radius: 9px;
            background: var(--azul-claro);
            color: var(--azul);
            font-size: 10px;
            font-weight: 800;
        }

        .pregunta-categoria {
            padding: 6px 9px;
            border-radius: 999px;
            background: #f1f5f9;
            color: #64748b;
            font-size: 8px;
            font-weight: 800;
        }

        .pregunta h2 {
            margin-top: 17px;
            font-size: 15px;
            line-height: 1.7;
        }

        .opciones {
            display: grid;
            gap: 10px;
            margin-top: 18px;
        }

        .opcion {
            position: relative;
            display: flex;
            align-items: center;
            gap: 12px;
            min-height: 48px;
            padding: 11px 14px;
            border: 1px solid #e3e9f1;
            border-radius: 12px;
            background: #fbfcfe;
            cursor: pointer;
            transition: .2s;
        }

        .opcion:hover {
            border-color: #93c5fd;
            background: #f5f9ff;
        }

        .opcion:has(input:checked) {
            border-color: var(--azul);
            background: var(--azul-claro);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, .08);
        }

        .opcion input {
            width: 17px;
            height: 17px;
            flex-shrink: 0;
            accent-color: var(--azul);
        }

        .letra {
            width: 28px;
            height: 28px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border-radius: 8px;
            background: white;
            color: #475569;
            font-size: 10px;
            font-weight: 800;
        }

        .opcion-texto {
            font-size: 11px;
            line-height: 1.5;
        }

        .respuesta-abierta {
            width: 100%;
            min-height: 52px;
            margin-top: 18px;
            padding: 13px 15px;
            border: 1px solid #dfe6ef;
            border-radius: 12px;
            outline: none;
            resize: vertical;
        }

        .respuesta-abierta:focus {
            border-color: var(--azul);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, .09);
        }

        .lateral {
            position: sticky;
            top: 100px;
            padding: 18px;
            border: 1px solid var(--borde);
            border-radius: 17px;
            background: white;
            box-shadow: 0 9px 25px rgba(29, 51, 84, .05);
        }

        .lateral h3 {
            font-size: 13px;
        }

        .lateral p {
            margin-top: 5px;
            color: var(--texto-suave);
            font-size: 9px;
            line-height: 1.5;
        }

        .navegacion {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 7px;
            margin-top: 16px;
        }

        .navegacion a {
            height: 34px;
            display: grid;
            place-items: center;
            border: 1px solid #dfe6ef;
            border-radius: 8px;
            background: #f8fafc;
            color: #64748b;
            font-size: 9px;
            font-weight: 800;
            text-decoration: none;
        }

        .navegacion a.respondida {
            border-color: #86efac;
            background: #f0fdf4;
            color: var(--verde);
        }

        .estado-guardado {
            margin-top: 17px;
            padding: 11px;
            border-radius: 10px;
            background: #f8fafc;
            color: #64748b;
            font-size: 9px;
            line-height: 1.5;
            text-align: center;
        }

        .estado-guardado.guardando {
            background: #eff6ff;
            color: var(--azul);
        }

        .estado-guardado.guardado {
            background: #f0fdf4;
            color: var(--verde);
        }

        .estado-guardado.error {
            background: #fef2f2;
            color: var(--rojo);
        }

        .boton-finalizar {
            width: 100%;
            margin-top: 13px;
            padding: 12px 14px;
            border: 0;
            border-radius: 11px;
            background: var(--azul-oscuro);
            color: white;
            font-size: 10px;
            font-weight: 800;
            cursor: pointer;
        }

        .boton-finalizar:disabled {
            background: #cbd5e1;
            cursor: not-allowed;
        }

        .nota {
            margin-top: 13px;
            color: #94a3b8;
            font-size: 8px;
            line-height: 1.5;
            text-align: center;
        }

        @media (max-width: 900px) {
            .progreso-superior {
                display: none;
            }

            .encabezado {
                flex-direction: column;
            }

            .encabezado-candidato {
                min-width: 0;
            }

            .distribucion {
                grid-template-columns: 1fr;
            }

            .lateral {
                position: static;
                order: -1;
            }

            .navegacion {
                grid-template-columns: repeat(10, 1fr);
            }
        }

        @media (max-width: 620px) {
            .barra {
                padding: 11px 14px;
            }

            .marca div {
                display: none;
            }

            .marca img {
                width: 43px;
                height: 43px;
            }

            .cronometro {
                min-width: 112px;
            }

            .contenido {
                width: min(100% - 22px, 1180px);
                margin-top: 16px;
            }

            .encabezado {
                padding: 22px 18px;
            }

            .pregunta {
                padding: 19px 16px;
            }

            .navegacion {
                grid-template-columns: repeat(5, 1fr);
            }

            .pregunta-encabezado {
                align-items: center;
            }
        }
    </style>
</head>

<body>

<header class="barra">
    <div class="marca">
        <img
            src="{{ asset('images/logo-sefinsa.png') }}"
            alt="Logo SEFINSA"
        >

        <div>
            <strong>SEFINSA Evalúa</strong>
            <span>Examen matemático</span>
        </div>
    </div>

    <div class="barra-derecha">
        <div class="progreso-superior">
            <div class="progreso-superior-texto">
                <span>Progreso</span>

                <span id="textoProgreso">
                    0 de {{ $preguntas->count() }}
                </span>
            </div>

            <div class="progreso-linea">
                <span id="barraProgreso"></span>
            </div>
        </div>

        <div class="cronometro" id="contenedorCronometro">
            <small>Tiempo restante</small>
            <strong id="cronometro">00:00</strong>
        </div>
    </div>
</header>

<main class="contenido">

    <section class="encabezado">
        <div>
            <span class="encabezado-etiqueta">
                EVALUACIÓN EN PROCESO
            </span>

            <h1>Examen matemático</h1>

            <p>
                Contesta las 25 preguntas. Puedes desplazarte entre ellas y
                revisar tus respuestas antes de finalizar.
            </p>
        </div>

        <div class="encabezado-candidato">
            <div>
                <small>Candidato</small>
                <strong>{{ $candidato->nombre_completo }}</strong>
            </div>

            <div>
                <small>Puesto solicitado</small>
                <strong>{{ $candidato->puesto_solicitado }}</strong>
            </div>
        </div>
    </section>

    <div class="distribucion">

        <section class="lista-preguntas">
            @foreach ($preguntas as $indice => $pregunta)
                @php
                    $respuestaGuardada =
                        $respuestasGuardadas->get($pregunta->id);

                    $respuestaActual =
                        $respuestaGuardada?->respuesta_seleccionada;

                    $respuestaTexto =
                        $respuestaGuardada?->respuesta_texto;
                @endphp

                <article
                    class="pregunta
                        {{ $respuestaActual || $respuestaTexto ? 'respondida' : '' }}"
                    id="pregunta-{{ $pregunta->id }}"
                    data-pregunta-id="{{ $pregunta->id }}"
                >
                    <div class="pregunta-encabezado">
                        <span class="pregunta-numero">
                            Pregunta {{ $indice + 1 }}
                        </span>

                        <span class="pregunta-categoria">
                            {{ $pregunta->categoria }}
                        </span>
                    </div>

                    <h2>{{ $pregunta->pregunta }}</h2>

                    @if ($pregunta->tipo_pregunta === 'abierta')
                        <textarea
                            class="respuesta-abierta"
                            data-tipo="texto"
                            data-pregunta="{{ $pregunta->id }}"
                            placeholder="Escribe tu respuesta"
                        >{{ $respuestaTexto }}</textarea>
                    @else
                        <div class="opciones">
                            @foreach ([
                                'a' => $pregunta->opcion_a,
                                'b' => $pregunta->opcion_b,
                                'c' => $pregunta->opcion_c,
                                'd' => $pregunta->opcion_d,
                                'e' => $pregunta->opcion_e,
                            ] as $letra => $opcion)
                                @if (! is_null($opcion) && $opcion !== '')
                                    <label class="opcion">
                                        <input
                                            type="radio"
                                            name="pregunta_{{ $pregunta->id }}"
                                            value="{{ $letra }}"
                                            data-tipo="seleccion"
                                            data-pregunta="{{ $pregunta->id }}"
                                            @checked($respuestaActual === $letra)
                                        >

                                        <span class="letra">
                                            {{ strtoupper($letra) }}
                                        </span>

                                        <span class="opcion-texto">
                                            {{ $opcion }}
                                        </span>
                                    </label>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </article>
            @endforeach
        </section>

        <aside class="lateral">
            <h3>Navegación</h3>

            <p>
                Las preguntas contestadas aparecerán marcadas en verde.
            </p>

            <div class="navegacion">
                @foreach ($preguntas as $indice => $pregunta)
                    @php
                        $guardada =
                            $respuestasGuardadas->get($pregunta->id);

                        $estaRespondida =
                            $guardada?->respuesta_seleccionada ||
                            $guardada?->respuesta_texto;
                    @endphp

                    <a
                        href="#pregunta-{{ $pregunta->id }}"
                        id="nav-{{ $pregunta->id }}"
                        class="{{ $estaRespondida ? 'respondida' : '' }}"
                    >
                        {{ $indice + 1 }}
                    </a>
                @endforeach
            </div>

            <div class="estado-guardado" id="estadoGuardado">
                Preparado para guardar respuestas
            </div>

            <button
                type="button"
                class="boton-finalizar"
                id="botonFinalizar"
            >
                Finalizar examen
            </button>

<div class="nota">
    Tus respuestas se guardan automáticamente. Una vez enviado el
    examen, no podrás modificarlo.
</div>

        </aside>

    </div>

</main>

<script>
    const totalPreguntas = {{ $preguntas->count() }};
    let segundosRestantes = {{ $segundosRestantes }};

    const urlGuardar =
        @json(route('candidato.matematicas.guardar'));

    const urlFinalizar =
        @json(route('candidato.matematicas.finalizar'));

    const tokenCsrf = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute('content');

    const cronometro = document.getElementById('cronometro');

    const contenedorCronometro =
        document.getElementById('contenedorCronometro');

    const barraProgreso =
        document.getElementById('barraProgreso');

    const textoProgreso =
        document.getElementById('textoProgreso');

    const estadoGuardado =
        document.getElementById('estadoGuardado');

    const botonFinalizar =
        document.getElementById('botonFinalizar');

    const temporizadoresGuardado = {};

    function formatearTiempo(segundos) {
        const minutos = Math.floor(segundos / 60);
        const segundosFinales = segundos % 60;

        return String(minutos).padStart(2, '0') +
            ':' +
            String(segundosFinales).padStart(2, '0');
    }

    function actualizarCronometro() {
        cronometro.textContent =
            formatearTiempo(segundosRestantes);

        if (
            segundosRestantes <= 300 &&
            segundosRestantes > 0
        ) {
            contenedorCronometro.classList.add(
                'alerta-tiempo'
            );
        }

        if (segundosRestantes <= 0) {
            segundosRestantes = 0;

            contenedorCronometro.classList.remove(
                'alerta-tiempo'
            );

            contenedorCronometro.classList.add(
                'tiempo-agotado'
            );

            cronometro.textContent = '00:00';

            clearInterval(intervaloCronometro);
            return;
        }

        segundosRestantes--;
    }

    function preguntaEstaRespondida(preguntaId) {
        const seleccionada = document.querySelector(
            `input[data-pregunta="${preguntaId}"]:checked`
        );

        const texto = document.querySelector(
            `textarea[data-pregunta="${preguntaId}"]`
        );

        return Boolean(
            seleccionada ||
            (texto && texto.value.trim() !== '')
        );
    }

    function actualizarProgreso() {
        let respondidas = 0;

        document
            .querySelectorAll('.pregunta')
            .forEach((tarjeta) => {
                const preguntaId =
                    tarjeta.dataset.preguntaId;

                const respondida =
                    preguntaEstaRespondida(preguntaId);

                const navegacion = document.getElementById(
                    `nav-${preguntaId}`
                );

                tarjeta.classList.toggle(
                    'respondida',
                    respondida
                );

                if (navegacion) {
                    navegacion.classList.toggle(
                        'respondida',
                        respondida
                    );
                }

                if (respondida) {
                    respondidas++;
                }
            });

        const porcentaje = totalPreguntas > 0
            ? (respondidas / totalPreguntas) * 100
            : 0;

        barraProgreso.style.width = porcentaje + '%';

        textoProgreso.textContent =
            `${respondidas} de ${totalPreguntas}`;
    }

    function mostrarEstado(tipo, mensaje) {
        estadoGuardado.className =
            'estado-guardado ' + tipo;

        estadoGuardado.textContent = mensaje;
    }

    async function guardarRespuesta(campo) {
        const preguntaId = campo.dataset.pregunta;
        const tipo = campo.dataset.tipo;

        const datos = {
            pregunta_id: preguntaId,
            respuesta_seleccionada: null,
            respuesta_texto: null,
        };

        if (tipo === 'seleccion') {
            datos.respuesta_seleccionada = campo.value;
        } else {
            datos.respuesta_texto = campo.value.trim();
        }

        mostrarEstado(
            'guardando',
            'Guardando respuesta...'
        );

        try {
            const respuesta = await fetch(urlGuardar, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': tokenCsrf,
                },
                body: JSON.stringify(datos),
            });

            const resultado = await respuesta.json();

            if (! respuesta.ok || ! resultado.ok) {
                throw new Error(
                    resultado.mensaje ||
                    'No fue posible guardar.'
                );
            }

            mostrarEstado(
                'guardado',
                'Respuesta guardada correctamente'
            );
        } catch (error) {
            console.error(error);

            mostrarEstado(
                'error',
                'No se pudo guardar. Revisa tu conexión.'
            );
        }
    }

    document
        .querySelectorAll('input[data-pregunta]')
        .forEach((campo) => {
            campo.addEventListener('change', function () {
                actualizarProgreso();
                guardarRespuesta(this);
            });
        });

    document
        .querySelectorAll('textarea[data-pregunta]')
        .forEach((campo) => {
            campo.addEventListener('input', function () {
                actualizarProgreso();

                const preguntaId = this.dataset.pregunta;

                clearTimeout(
                    temporizadoresGuardado[preguntaId]
                );

                temporizadoresGuardado[preguntaId] =
                    setTimeout(() => {
                        guardarRespuesta(this);
                    }, 700);
            });

            campo.addEventListener('blur', function () {
                const preguntaId = this.dataset.pregunta;

                clearTimeout(
                    temporizadoresGuardado[preguntaId]
                );

                guardarRespuesta(this);
            });
        });

    botonFinalizar.addEventListener(
        'click',
        async function () {
            const respondidas = document.querySelectorAll(
                '.pregunta.respondida'
            ).length;

            const faltantes =
                totalPreguntas - respondidas;

            let mensaje =
                '¿Estás seguro de finalizar el examen?';

            if (faltantes > 0) {
                mensaje =
                    `Tienes ${faltantes} pregunta(s) sin contestar. ` +
                    '¿Deseas finalizar de todas formas?';
            }

            const confirmar = window.confirm(mensaje);

            if (! confirmar) {
                return;
            }

            botonFinalizar.disabled = true;
            botonFinalizar.textContent = 'Enviando examen...';

            const formulario = document.createElement('form');

            formulario.method = 'POST';
            formulario.action = urlFinalizar;

            const token = document.createElement('input');

            token.type = 'hidden';
            token.name = '_token';
            token.value = tokenCsrf;

            formulario.appendChild(token);
            document.body.appendChild(formulario);
            formulario.submit();
        }
    );

    actualizarCronometro();
    actualizarProgreso();

    const intervaloCronometro = setInterval(
        actualizarCronometro,
        1000
    );
</script>


</body>
</html>

