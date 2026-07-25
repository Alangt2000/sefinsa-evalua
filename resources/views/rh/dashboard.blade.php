<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Panel RH | SEFINSA Evalúa</title>

    <style>
        :root {
            --azul-principal: #174f8f;
            --azul-oscuro: #10345f;
            --azul-claro: #eaf3ff;

            --naranja: #f28c28;
            --naranja-oscuro: #d96f0b;
            --naranja-claro: #fff3e5;

            --verde: #159447;
            --verde-claro: #eaf8f0;

            --rojo: #dc3545;
            --rojo-claro: #fdecee;

            --gris-texto: #64748b;
            --gris-borde: #dfe7f1;
            --fondo: #f4f7fb;
            --blanco: #ffffff;
            --texto: #162033;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            font-family:
                Inter,
                Arial,
                sans-serif;
            background: var(--fondo);
            color: var(--texto);
        }

        .barra-superior {
            background:
                linear-gradient(
                    120deg,
                    var(--azul-oscuro),
                    var(--azul-principal)
                );
            color: var(--blanco);
            box-shadow: 0 8px 28px rgba(16, 52, 95, 0.18);
        }

        .barra-contenido {
            max-width: 1450px;
            margin: auto;
            padding: 18px 30px;

            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
        }

        .marca {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .marca-icono {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            display: grid;
            place-items: center;

            background: var(--naranja);
            color: var(--blanco);
            font-size: 23px;
            font-weight: 800;

            box-shadow:
                0 8px 20px
                rgba(242, 140, 40, 0.32);
        }

        .marca h1 {
            font-size: 20px;
            margin-bottom: 3px;
        }

        .marca p {
            font-size: 13px;
            opacity: 0.8;
        }

        .usuario {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .usuario-datos {
            text-align: right;
        }

        .usuario-datos strong {
            display: block;
            font-size: 14px;
        }

        .usuario-datos span {
            font-size: 12px;
            opacity: 0.8;
        }

        .boton-salir {
            border: 1px solid rgba(255, 255, 255, 0.35);
            border-radius: 10px;
            padding: 10px 16px;

            background: rgba(255, 255, 255, 0.1);
            color: var(--blanco);

            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .boton-salir:hover {
            background: var(--naranja);
            border-color: var(--naranja);
        }

        .contenedor {
            max-width: 1450px;
            margin: auto;
            padding: 35px 30px 60px;
        }

        .encabezado-panel {
            margin-bottom: 28px;

            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 20px;
        }

        .encabezado-panel span {
            display: inline-block;
            margin-bottom: 8px;

            color: var(--naranja-oscuro);
            font-size: 13px;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .encabezado-panel h2 {
            font-size: 31px;
            color: var(--azul-oscuro);
            margin-bottom: 7px;
        }

        .encabezado-panel p {
            color: var(--gris-texto);
            line-height: 1.6;
        }

        .fecha {
            padding: 11px 15px;
            border-radius: 10px;

            background: var(--blanco);
            border: 1px solid var(--gris-borde);

            color: var(--gris-texto);
            font-size: 13px;
            font-weight: 700;
        }

        .indicadores {
            display: grid;
            grid-template-columns:
                repeat(4, minmax(0, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .tarjeta-indicador {
            position: relative;
            overflow: hidden;

            min-height: 155px;
            padding: 23px;

            background: var(--blanco);
            border: 1px solid var(--gris-borde);
            border-radius: 18px;

            box-shadow:
                0 12px 30px
                rgba(25, 67, 112, 0.06);
        }

        .tarjeta-indicador::after {
            content: "";
            position: absolute;
            right: -30px;
            bottom: -45px;

            width: 125px;
            height: 125px;
            border-radius: 50%;

            background: var(--azul-claro);
        }

        .tarjeta-indicador.naranja::after {
            background: var(--naranja-claro);
        }

        .tarjeta-indicador.verde::after {
            background: var(--verde-claro);
        }

        .tarjeta-indicador.rojo::after {
            background: var(--rojo-claro);
        }

        .indicador-icono {
            position: relative;
            z-index: 2;

            width: 42px;
            height: 42px;
            margin-bottom: 18px;

            display: grid;
            place-items: center;

            border-radius: 12px;
            background: var(--azul-claro);
            color: var(--azul-principal);

            font-size: 20px;
        }

        .naranja .indicador-icono {
            background: var(--naranja-claro);
            color: var(--naranja-oscuro);
        }

        .verde .indicador-icono {
            background: var(--verde-claro);
            color: var(--verde);
        }

        .rojo .indicador-icono {
            background: var(--rojo-claro);
            color: var(--rojo);
        }

        .indicador-etiqueta {
            position: relative;
            z-index: 2;

            display: block;
            margin-bottom: 5px;

            color: var(--gris-texto);
            font-size: 13px;
            font-weight: 700;
        }

        .indicador-numero {
            position: relative;
            z-index: 2;

            color: var(--azul-oscuro);
            font-size: 34px;
            font-weight: 800;
        }

        .promedios {
            display: grid;
            grid-template-columns:
                repeat(2, minmax(0, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .tarjeta-promedio {
            padding: 24px;

            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;

            border-radius: 18px;
            background:
                linear-gradient(
                    120deg,
                    var(--azul-oscuro),
                    var(--azul-principal)
                );

            color: var(--blanco);
            box-shadow:
                0 14px 30px
                rgba(16, 52, 95, 0.16);
        }

        .tarjeta-promedio.naranja {
            background:
                linear-gradient(
                    120deg,
                    var(--naranja-oscuro),
                    var(--naranja)
                );

            box-shadow:
                0 14px 30px
                rgba(242, 140, 40, 0.2);
        }

        .tarjeta-promedio span {
            display: block;
            margin-bottom: 7px;
            font-size: 13px;
            opacity: 0.84;
        }

        .tarjeta-promedio h3 {
            font-size: 19px;
        }

        .promedio-numero {
            font-size: 35px;
            font-weight: 900;
            white-space: nowrap;
        }

        .panel-tabla {
            overflow: hidden;

            background: var(--blanco);
            border: 1px solid var(--gris-borde);
            border-radius: 18px;

            box-shadow:
                0 12px 30px
                rgba(25, 67, 112, 0.06);
        }

        .panel-tabla-cabecera {
            padding: 22px 24px;

            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;

            border-bottom: 1px solid var(--gris-borde);
        }

        .panel-tabla-cabecera h3 {
            color: var(--azul-oscuro);
            font-size: 19px;
            margin-bottom: 4px;
        }

        .panel-tabla-cabecera p {
            color: var(--gris-texto);
            font-size: 13px;
        }

        .boton-candidatos {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 11px 17px;
            border-radius: 10px;

            background: var(--naranja);
            color: var(--blanco);
            text-decoration: none;

            font-size: 13px;
            font-weight: 800;
            transition: 0.2s ease;
        }

        .boton-candidatos:hover {
            background: var(--naranja-oscuro);
            transform: translateY(-1px);
        }

        .tabla-contenedor {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 16px 20px;
            text-align: left;
            white-space: nowrap;
        }

        th {
            background: #f8fafc;
            color: var(--gris-texto);

            font-size: 12px;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        td {
            border-top: 1px solid #edf1f6;
            font-size: 14px;
        }

        .nombre-candidato {
            color: var(--azul-oscuro);
            font-weight: 800;
        }

        .texto-secundario {
            display: block;
            margin-top: 3px;

            color: var(--gris-texto);
            font-size: 12px;
        }

        .estado {
            display: inline-flex;
            padding: 7px 11px;
            border-radius: 999px;

            background: var(--naranja-claro);
            color: var(--naranja-oscuro);

            font-size: 12px;
            font-weight: 800;
        }

        .estado.finalizado {
            background: var(--verde-claro);
            color: var(--verde);
        }

        .calificacion {
            color: var(--azul-principal);
            font-weight: 800;
        }

        .sin-resultado {
            color: #94a3b8;
        }

        .sin-registros {
            padding: 45px 20px;
            text-align: center;
            color: var(--gris-texto);
        }

        @media (max-width: 1050px) {
            .indicadores {
                grid-template-columns:
                    repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 750px) {
            .barra-contenido,
            .encabezado-panel,
            .panel-tabla-cabecera {
                align-items: flex-start;
                flex-direction: column;
            }

            .usuario {
                width: 100%;
                justify-content: space-between;
            }

            .usuario-datos {
                text-align: left;
            }

            .contenedor {
                padding: 25px 15px 45px;
            }

            .indicadores,
            .promedios {
                grid-template-columns: 1fr;
            }

            .encabezado-panel h2 {
                font-size: 26px;
            }

            .fecha,
            .boton-candidatos {
                width: 100%;
                text-align: center;
            }
        }

        @media (max-width: 460px) {
            .indicadores {
                grid-template-columns: 1fr;
            }

            .barra-contenido {
                padding: 16px;
            }

            .marca-icono {
                width: 42px;
                height: 42px;
            }
        }
    </style>
</head>

<body>

<header class="barra-superior">
    <div class="barra-contenido">

        <div class="marca">
            <div class="marca-icono">
                S
            </div>

            <div>
                <h1>SEFINSA Evalúa</h1>
                <p>Panel de Recursos Humanos</p>
            </div>
        </div>

        <div class="usuario">

            <div class="usuario-datos">
                <strong>
                    {{ auth()->user()->name ?? 'Administrador RH' }}
                </strong>

                <span>
                    {{ auth()->user()->email ?? '' }}
                </span>
            </div>

            <form
                method="POST"
                action="{{ route('logout') }}"
            >
                @csrf

                <button
                    type="submit"
                    class="boton-salir"
                >
                    Cerrar sesión
                </button>
            </form>

        </div>
    </div>
</header>

<main class="contenedor">

    <section class="encabezado-panel">

        <div>
            <span>Resumen general</span>

            <h2>Panel de evaluación</h2>

            <p>
                Consulta el avance y los resultados
                de los candidatos registrados.
            </p>
        </div>

        <div class="fecha">
            {{ now()->translatedFormat('d \d\e F \d\e Y') }}
        </div>

    </section>

    <section class="indicadores">

        <article class="tarjeta-indicador">
            <div class="indicador-icono">👥</div>

            <span class="indicador-etiqueta">
                Total de candidatos
            </span>

            <strong class="indicador-numero">
                {{ $totalCandidatos }}
            </strong>
        </article>

        <article class="tarjeta-indicador naranja">
            <div class="indicador-icono">⏳</div>

            <span class="indicador-etiqueta">
                En proceso
            </span>

            <strong class="indicador-numero">
                {{ $candidatosEnProceso }}
            </strong>
        </article>

        <article class="tarjeta-indicador verde">
            <div class="indicador-icono">✓</div>

            <span class="indicador-etiqueta">
                Finalizados
            </span>

            <strong class="indicador-numero">
                {{ $candidatosFinalizados }}
            </strong>
        </article>

        <article class="tarjeta-indicador rojo">
            <div class="indicador-icono">!</div>

            <span class="indicador-etiqueta">
                Pendientes
            </span>

            <strong class="indicador-numero">
                {{ $candidatosPendientes }}
            </strong>
        </article>

    </section>

    <section class="promedios">

        <article class="tarjeta-promedio">

            <div>
                <span>Promedio general</span>
                <h3>Examen matemático</h3>
            </div>

            <div class="promedio-numero">
                {{ number_format($promedioMatematicas, 1) }}%
            </div>

        </article>

        <article class="tarjeta-promedio naranja">

            <div>
                <span>Promedio general</span>
                <h3>Examen psicométrico</h3>
            </div>

            <div class="promedio-numero">
                {{ number_format($promedioPsicometrico, 1) }}%
            </div>

        </article>

    </section>

    <section class="panel-tabla">

        <div class="panel-tabla-cabecera">

            <div>
                <h3>Candidatos recientes</h3>

                <p>
                    Últimos candidatos registrados
                    en el sistema.
                </p>
            </div>

            <a href="#" class="boton-candidatos">
                Ver todos los candidatos
            </a>

        </div>

        <div class="tabla-contenedor">

            @if ($candidatosRecientes->isEmpty())

                <div class="sin-registros">
                    Todavía no hay candidatos registrados.
                </div>

            @else

                <table>
                    <thead>
                        <tr>
                            <th>Candidato</th>
                            <th>Ciudad</th>
                            <th>Puesto</th>
                            <th>Matemáticas</th>
                            <th>Psicométrico</th>
                            <th>Estado</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($candidatosRecientes as $candidato)

                            @php
                                $matematicas =
                                    $candidato
                                        ->evaluaciones
                                        ->firstWhere(
                                            'tipo',
                                            'matematicas'
                                        );

                                $psicometrico =
                                    $candidato
                                        ->evaluaciones
                                        ->firstWhere(
                                            'tipo',
                                            'psicometrico'
                                        );
                            @endphp

                            <tr>
                                <td>
                                    <span class="nombre-candidato">
                                        {{ $candidato->nombre_completo }}
                                    </span>

                                    <span class="texto-secundario">
                                        {{ $candidato->usuario }}
                                    </span>
                                </td>

                                <td>
                                    {{ $candidato->ciudad ?? 'Sin ciudad' }}
                                </td>

                                <td>
                                    {{ $candidato->puesto_solicitado
                                        ?? 'Sin puesto' }}
                                </td>

                                <td>
                                    @if (
                                        $matematicas &&
                                        $matematicas->estado === 'finalizada'
                                    )
                                        <span class="calificacion">
                                            {{
                                                number_format(
                                                    $matematicas->calificacion,
                                                    1
                                                )
                                            }}%
                                        </span>
                                    @else
                                        <span class="sin-resultado">
                                            Pendiente
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    @if (
                                        $psicometrico &&
                                        $psicometrico->estado === 'finalizada'
                                    )
                                        <span class="calificacion">
                                            {{
                                                number_format(
                                                    $psicometrico->calificacion,
                                                    1
                                                )
                                            }}%
                                        </span>
                                    @else
                                        <span class="sin-resultado">
                                            Pendiente
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    <span
                                        class="estado {{
                                            $candidato->estado === 'finalizado'
                                                ? 'finalizado'
                                                : ''
                                        }}"
                                    >
                                        {{
                                            $candidato->estado === 'finalizado'
                                                ? 'Finalizado'
                                                : 'En proceso'
                                        }}
                                    </span>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>

            @endif

        </div>
    </section>

</main>

</body>
</html>
