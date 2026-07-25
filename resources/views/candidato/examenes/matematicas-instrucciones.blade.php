<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Instrucciones | Examen matemático</title>

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
            --naranja: #f28c28;
            --fondo: #f4f7fb;
            --texto: #172033;
            --texto-suave: #718096;
            --blanco: #ffffff;
            --borde: #dfe6ef;
            --rojo: #b91c1c;
            --verde: #15803d;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            font-family: "Inter", sans-serif;
            background:
                radial-gradient(circle at top left, rgba(37, 99, 235, .12), transparent 32%),
                var(--fondo);
            color: var(--texto);
        }

        button,
        a {
            font: inherit;
        }

        .barra {
            min-height: 78px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 14px 32px;
            background: white;
            border-bottom: 1px solid var(--borde);
        }

        .marca {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .marca img {
            width: 50px;
            height: 50px;
            object-fit: contain;
            padding: 6px;
            border: 1px solid var(--borde);
            border-radius: 13px;
            background: white;
        }

        .marca strong {
            display: block;
            font-size: 16px;
        }

        .marca span {
            display: block;
            margin-top: 4px;
            color: var(--texto-suave);
            font-size: 10px;
        }

        .candidato {
            text-align: right;
        }

        .candidato strong {
            display: block;
            font-size: 12px;
        }

        .candidato span {
            display: block;
            margin-top: 4px;
            color: var(--texto-suave);
            font-size: 10px;
        }

        .contenido {
            width: min(960px, calc(100% - 30px));
            margin: 38px auto 55px;
        }

        .encabezado {
            padding: 34px;
            border-radius: 24px;
            background:
                radial-gradient(circle at top right, rgba(255, 255, 255, .14), transparent 28%),
                linear-gradient(135deg, #102b4e, #245e9f);
            color: white;
            box-shadow: 0 20px 45px rgba(16, 43, 78, .16);
        }

        .encabezado-etiqueta {
            display: inline-block;
            margin-bottom: 15px;
            padding: 7px 11px;
            border-radius: 999px;
            background: rgba(255, 255, 255, .12);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .8px;
        }

        .encabezado h1 {
            font-size: clamp(27px, 4vw, 40px);
        }

        .encabezado p {
            max-width: 690px;
            margin-top: 13px;
            color: #d8e4f2;
            font-size: 13px;
            line-height: 1.8;
        }

        .resumen {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 14px;
            margin-top: 24px;
        }

        .resumen-item {
            padding: 15px;
            border-radius: 14px;
            background: rgba(255, 255, 255, .10);
        }

        .resumen-item small {
            display: block;
            color: #bcd0e5;
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: .7px;
        }

        .resumen-item strong {
            display: block;
            margin-top: 6px;
            font-size: 14px;
        }

        .panel {
            margin-top: 24px;
            padding: 30px;
            border: 1px solid var(--borde);
            border-radius: 22px;
            background: white;
            box-shadow: 0 12px 35px rgba(29, 51, 84, .07);
        }

        .panel h2 {
            font-size: 21px;
        }

        .panel > p {
            margin-top: 8px;
            color: var(--texto-suave);
            font-size: 12px;
            line-height: 1.7;
        }

        .instrucciones {
            display: grid;
            gap: 14px;
            margin-top: 23px;
        }

        .instruccion {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            padding: 16px;
            border: 1px solid #e7edf4;
            border-radius: 15px;
            background: #fbfcfe;
        }

        .numero {
            width: 34px;
            height: 34px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border-radius: 10px;
            background: var(--azul-claro);
            color: var(--azul);
            font-size: 12px;
            font-weight: 800;
        }

        .instruccion strong {
            display: block;
            font-size: 12px;
        }

        .instruccion p {
            margin-top: 5px;
            color: var(--texto-suave);
            font-size: 11px;
            line-height: 1.6;
        }

        .alerta {
            margin-top: 20px;
            padding: 16px 18px;
            border: 1px solid #fde68a;
            border-radius: 14px;
            background: #fffbeb;
            color: #92400e;
            font-size: 11px;
            line-height: 1.7;
        }

        .alerta-error {
            margin-bottom: 20px;
            border-color: #fecaca;
            background: #fef2f2;
            color: var(--rojo);
        }

        .alerta-exito {
            margin-bottom: 20px;
            border-color: #bbf7d0;
            background: #f0fdf4;
            color: var(--verde);
        }

        .acciones {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 25px;
        }

        .boton {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 44px;
            padding: 12px 18px;
            border: 0;
            border-radius: 12px;
            font-weight: 800;
            text-decoration: none;
            cursor: pointer;
        }

        .boton-regresar {
            border: 1px solid var(--borde);
            background: white;
            color: #536176;
        }

        .boton-iniciar {
            background: linear-gradient(135deg, #1d4ed8, #2563eb);
            color: white;
            box-shadow: 0 12px 24px rgba(37, 99, 235, .20);
        }

        .boton-bloqueado {
            background: #e8edf4;
            color: #8b97a8;
            cursor: not-allowed;
            box-shadow: none;
        }

        @media (max-width: 680px) {
            .barra {
                padding: 13px 17px;
            }

            .candidato {
                display: none;
            }

            .contenido {
                margin-top: 22px;
            }

            .encabezado,
            .panel {
                padding: 23px 19px;
            }

            .resumen {
                grid-template-columns: 1fr;
            }

            .acciones {
                flex-direction: column-reverse;
            }

            .boton {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<header class="barra">
    <div class="marca">
        <img src="{{ asset('images/logo-sefinsa.png') }}" alt="Logo SEFINSA">

        <div>
            <strong>SEFINSA Evalúa</strong>
            <span>Examen matemático</span>
        </div>
    </div>

    <div class="candidato">
        <strong>{{ $candidato->nombre_completo }}</strong>
        <span>{{ $candidato->puesto_solicitado }}</span>
    </div>
</header>

<main class="contenido">

    @if (session('error'))
        <div class="alerta alerta-error">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alerta alerta-exito">
            {{ session('success') }}
        </div>
    @endif

    <section class="encabezado">
        <span class="encabezado-etiqueta">EVALUACIÓN ASIGNADA</span>

        <h1>Examen matemático</h1>

        <p>
            Esta evaluación mide conocimientos matemáticos, razonamiento
            numérico y capacidad para resolver problemas relacionados con el
            puesto solicitado.
        </p>

        <div class="resumen">
            <div class="resumen-item">
                <small>Total de preguntas</small>
                <strong>{{ $totalPreguntas }}</strong>
            </div>

            <div class="resumen-item">
                <small>Modalidad</small>
                <strong>En línea</strong>
            </div>

            <div class="resumen-item">
                <small>Estado</small>
                <strong>
                    @if ($evaluacion?->estado === 'finalizada')
                        Finalizado
                    @elseif ($evaluacion?->estado === 'en_proceso')
                        En proceso
                    @else
                        Pendiente
                    @endif
                </strong>
            </div>
        </div>
    </section>

    <section class="panel">
        <h2>Instrucciones antes de comenzar</h2>

        <p>
            Lee cuidadosamente las siguientes indicaciones. El tiempo comenzará
            a contar cuando presiones el botón para iniciar.
        </p>

        <div class="instrucciones">
            <article class="instruccion">
                <div class="numero">1</div>

                <div>
                    <strong>Busca un lugar tranquilo</strong>
                    <p>
                        Evita interrupciones y mantén una conexión estable a
                        internet durante toda la evaluación.
                    </p>
                </div>
            </article>

            <article class="instruccion">
                <div class="numero">2</div>

                <div>
                    <strong>Lee cada pregunta cuidadosamente</strong>
                    <p>
                        Selecciona una sola respuesta, salvo que la pregunta
                        solicite capturar un resultado numérico o escrito.
                    </p>
                </div>
            </article>

            <article class="instruccion">
                <div class="numero">3</div>

                <div>
                    <strong>No cierres ni actualices la página</strong>
                    <p>
                        Tus respuestas se guardarán durante el examen, pero
                        cerrar el navegador puede interrumpir el proceso.
                    </p>
                </div>
            </article>

            <article class="instruccion">
                <div class="numero">4</div>

                <div>
                    <strong>El examen solo puede finalizarse una vez</strong>
                    <p>
                        Cuando confirmes la finalización, ya no podrás modificar
                        tus respuestas ni volver a presentar la evaluación.
                    </p>
                </div>
            </article>
        </div>

        <div class="alerta">
            Al iniciar confirmas que realizarás la evaluación personalmente y
            que comprendiste las instrucciones.
        </div>

        <div class="acciones">
            <a
                href="{{ route('candidato.dashboard') }}"
                class="boton boton-regresar"
            >
                Regresar al panel
            </a>

            @if ($totalPreguntas === 0)
                <button
                    type="button"
                    class="boton boton-bloqueado"
                    disabled
                >
                    Sin preguntas disponibles
                </button>
            @elseif ($evaluacion?->estado === 'finalizada')
                <button
                    type="button"
                    class="boton boton-bloqueado"
                    disabled
                >
                    Examen finalizado
                </button>
            @else
                <form
                    method="POST"
                    action="{{ route('candidato.matematicas.iniciar') }}"
                >
                    @csrf

                    <button type="submit" class="boton boton-iniciar">
                        @if ($evaluacion?->estado === 'en_proceso')
                            Continuar examen
                        @else
                            Iniciar examen
                        @endif
                    </button>
                </form>
            @endif
        </div>
    </section>

</main>

</body>
</html>

