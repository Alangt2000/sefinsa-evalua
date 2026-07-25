<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mis evaluaciones | SEFINSA Evalúa</title>

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
            --borde: #e4eaf2;
            --verde: #16a34a;
            --amarillo: #d97706;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            font-family: "Inter", sans-serif;
            background: var(--fondo);
            color: var(--texto);
        }

        button {
            font: inherit;
        }

        .barra {
            min-height: 82px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 16px 34px;
            background: white;
            border-bottom: 1px solid var(--borde);
        }

        .marca {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .marca img {
            width: 52px;
            height: 52px;
            object-fit: contain;
            padding: 6px;
            border-radius: 13px;
            background: white;
            border: 1px solid var(--borde);
        }

        .marca strong {
            display: block;
            font-size: 17px;
        }

        .marca span {
            display: block;
            margin-top: 4px;
            color: var(--texto-suave);
            font-size: 10px;
        }

        .usuario {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .usuario-datos {
            text-align: right;
        }

        .usuario-datos strong {
            display: block;
            font-size: 12px;
        }

        .usuario-datos span {
            display: block;
            margin-top: 4px;
            color: var(--texto-suave);
            font-size: 10px;
        }

        .boton-salir {
            padding: 10px 14px;
            border: 1px solid #fecaca;
            border-radius: 11px;
            background: #fff5f5;
            color: #b91c1c;
            font-weight: 700;
            cursor: pointer;
        }

        .contenido {
            width: min(1180px, calc(100% - 36px));
            margin: 32px auto 50px;
        }

        .hero {
            display: flex;
            justify-content: space-between;
            gap: 30px;
            padding: 32px;
            border-radius: 24px;
            background:
                radial-gradient(circle at top right, rgba(255,255,255,.14), transparent 30%),
                linear-gradient(135deg, #102b4e, #245e9f);
            color: white;
            box-shadow: 0 20px 45px rgba(16, 43, 78, .16);
        }

        .hero span {
            display: inline-block;
            margin-bottom: 12px;
            padding: 7px 11px;
            border-radius: 999px;
            background: rgba(255,255,255,.12);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .8px;
        }

        .hero h1 {
            font-size: 29px;
        }

        .hero p {
            max-width: 680px;
            margin-top: 10px;
            color: #d8e4f2;
            font-size: 13px;
            line-height: 1.7;
        }

        .hero-datos {
            min-width: 240px;
            padding: 18px;
            border-radius: 16px;
            background: rgba(255,255,255,.10);
        }

        .hero-datos div + div {
            margin-top: 13px;
        }

        .hero-datos small {
            display: block;
            color: #bcd0e5;
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: .7px;
        }

        .hero-datos strong {
            display: block;
            margin-top: 5px;
            font-size: 12px;
        }

        .seccion {
            margin-top: 28px;
        }

        .seccion-encabezado {
            margin-bottom: 16px;
        }

        .seccion-encabezado h2 {
            font-size: 20px;
        }

        .seccion-encabezado p {
            margin-top: 6px;
            color: var(--texto-suave);
            font-size: 12px;
        }

.evaluaciones {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 18px;
}

        .tarjeta {
            padding: 22px;
            border: 1px solid var(--borde);
            border-radius: 19px;
            background: white;
            box-shadow: 0 10px 28px rgba(29, 51, 84, .05);
        }

        .tarjeta-icono {
            width: 48px;
            height: 48px;
            display: grid;
            place-items: center;
            margin-bottom: 17px;
            border-radius: 14px;
            background: var(--azul-claro);
            font-size: 23px;
        }

        .tarjeta h3 {
            font-size: 16px;
        }

        .tarjeta p {
            min-height: 58px;
            margin-top: 9px;
            color: var(--texto-suave);
            font-size: 11px;
            line-height: 1.7;
        }

        .estado {
            display: inline-flex;
            margin-top: 16px;
            padding: 6px 9px;
            border-radius: 999px;
            background: #fff8e7;
            color: #b45309;
            font-size: 9px;
            font-weight: 800;
        }

        .boton-iniciar {
            display: block;
            text-align: center;
            text-decoration: none;
            width: 100%;
            margin-top: 17px;
            padding: 12px 15px;
            border: 0;
            border-radius: 11px;
            background: var(--azul);
            color: white;
            font-weight: 800;
            cursor: pointer;
        }

        .boton-bloqueado {
            background: #e9eef5;
            color: #8a96a7;
            cursor: not-allowed;
        }

        .aviso {
            margin-top: 25px;
            padding: 18px 20px;
            border: 1px solid #bfdbfe;
            border-radius: 15px;
            background: #eff6ff;
            color: #31558a;
            font-size: 11px;
            line-height: 1.7;
        }

        @media (max-width: 900px) {
            .hero {
                flex-direction: column;
            }

            .hero-datos {
                min-width: 0;
            }

            .evaluaciones {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 620px) {
            .barra {
                align-items: flex-start;
                padding: 14px 18px;
            }

            .usuario-datos {
                display: none;
            }

            .contenido {
                width: min(100% - 24px, 1180px);
                margin-top: 20px;
            }

            .hero {
                padding: 24px 20px;
            }

            .hero h1 {
                font-size: 23px;
            }

            .evaluaciones {
                grid-template-columns: 1fr;
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
            <span>Portal del candidato</span>
        </div>
    </div>

    <div class="usuario">
        <div class="usuario-datos">
            <strong>{{ $candidato->nombre_completo }}</strong>
            <span>{{ $candidato->usuario }}</span>
        </div>

        <form method="POST" action="{{ route('candidato.logout') }}">
            @csrf

            <button type="submit" class="boton-salir">
                Cerrar sesión
            </button>
        </form>
    </div>
</header>

<main class="contenido">

    <section class="hero">
        <div>
            <span>PROCESO DE EVALUACIÓN</span>

            <h1>Hola, {{ $candidato->nombre }}.</h1>

            <p>
                Desde este panel podrás consultar y completar las evaluaciones
                asignadas a tu proceso de selección. Lee las instrucciones antes
                de comenzar cada examen.
            </p>
        </div>

        <div class="hero-datos">
            <div>
                <small>Puesto solicitado</small>
                <strong>{{ $candidato->puesto_solicitado }}</strong>
            </div>

            <div>
                <small>Ciudad</small>
                <strong>{{ $candidato->ciudad ?: 'No registrada' }}</strong>
            </div>

            <div>
                <small>Estado del proceso</small>
                <strong>
                    {{ ucfirst(str_replace('_', ' ', $candidato->estado)) }}
                </strong>
            </div>
        </div>
    </section>

    <section class="seccion">
        <div class="seccion-encabezado">
            <h2>Mis evaluaciones</h2>

            <p>
                Completa cada evaluación siguiendo las indicaciones mostradas.
            </p>
        </div>

  <div class="evaluaciones">

    <article class="tarjeta">
        <div class="tarjeta-icono">➗</div>

        <h3>Examen matemático</h3>

        <p>
            Evaluación de operaciones básicas, razonamiento numérico,
            lógica matemática y resolución de problemas.
        </p>

        <span class="estado">Disponible</span>

<a
    href="{{ route('candidato.matematicas.instrucciones') }}"
    class="boton-iniciar"
>
    Ver instrucciones
</a>
    </article>

@php
    $evaluacionMatematicas = \App\Models\Evaluacion::where(
        'candidato_id',
        $candidato->id
    )
    ->where('tipo', 'matematicas')
    ->first();

    $evaluacionPsicometrico = \App\Models\Evaluacion::where(
        'candidato_id',
        $candidato->id
    )
    ->where('tipo', 'psicometrico')
    ->first();
@endphp

<article class="tarjeta">

    <div class="tarjeta-icono">🧠</div>

    <h3>Examen psicométrico</h3>

    <p>
        Evaluación de aptitudes, razonamiento, atención y características
        relacionadas con el perfil del puesto solicitado.
    </p>

    @if(!$evaluacionMatematicas || $evaluacionMatematicas->estado != 'finalizada')

        <span class="estado">
            Disponible después del examen matemático
        </span>

        <button
            type="button"
            class="boton-iniciar boton-bloqueado"
            disabled
        >
            No disponible
        </button>

    @elseif($evaluacionPsicometrico && $evaluacionPsicometrico->estado == 'finalizada')

        <span class="estado">
            Completado
        </span>

        <button
            type="button"
            class="boton-iniciar boton-bloqueado"
            disabled
        >
            Evaluación completada
        </button>

    @else

        <span class="estado">
            Disponible
        </span>

        <a
            href="{{ route('candidato.psicometrico.instrucciones') }}"
            class="boton-iniciar"
        >
            Ver instrucciones
        </a>

    @endif

</article>

</div>


        <div class="aviso">
            No cierres el navegador mientras una evaluación esté en curso.
            Cuando iniciemos el examen de matemáticas agregaremos cronómetro,
            guardado de respuestas y finalización automática.
        </div>
    </section>

</main>

</body>
</html>

