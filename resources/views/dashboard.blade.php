<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Panel administrativo | SEFINSA Evalúa</title>

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
            --rojo: #dc2626;
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

        button,
        input {
            font: inherit;
        }

        .aplicacion {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 270px 1fr;
        }

        /* SIDEBAR */

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 270px;
            display: flex;
            flex-direction: column;
            padding: 26px 18px;
            background:
                radial-gradient(circle at top left, rgba(255,255,255,.08), transparent 30%),
                linear-gradient(180deg, #102b4e, #0a203c);
            color: white;
            z-index: 100;
        }

        .marca {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 0 10px 25px;
            border-bottom: 1px solid rgba(255,255,255,.10);
        }

        .marca img {
            width: 54px;
            height: 54px;
            object-fit: contain;
            padding: 6px;
            border-radius: 13px;
            background: white;
        }

        .marca h2 {
            font-size: 17px;
            line-height: 1.2;
        }

        .marca p {
            margin-top: 4px;
            color: #bfd0e5;
            font-size: 11px;
        }

        .menu-titulo {
            margin: 27px 12px 12px;
            color: #8fa8c5;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.4px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px 14px;
            border-radius: 12px;
            color: #d4dfec;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: .22s;
        }

        .menu a:hover,
        .menu a.activo {
            background: rgba(255,255,255,.11);
            color: white;
            transform: translateX(3px);
        }

        .menu-icono {
            width: 24px;
            font-size: 18px;
            text-align: center;
        }

        .sidebar-footer {
            margin-top: auto;
            padding: 18px 12px 0;
            border-top: 1px solid rgba(255,255,255,.10);
        }

        .usuario-sidebar {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .avatar {
            width: 40px;
            height: 40px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--naranja), #ffb45c);
            color: white;
            font-size: 15px;
            font-weight: 800;
        }

        .usuario-sidebar strong {
            display: block;
            font-size: 12px;
        }

        .usuario-sidebar span {
            display: block;
            margin-top: 3px;
            color: #9eb2ca;
            font-size: 10px;
        }

        /* CONTENIDO */

        .contenido-principal {
            grid-column: 2;
            min-width: 0;
        }

        .barra-superior {
            position: sticky;
            top: 0;
            z-index: 50;
            height: 82px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 0 34px;
            border-bottom: 1px solid var(--borde);
            background: rgba(255,255,255,.93);
            backdrop-filter: blur(14px);
        }

        .barra-superior h1 {
            font-size: 21px;
            letter-spacing: -.5px;
        }

        .barra-superior p {
            margin-top: 5px;
            color: var(--texto-suave);
            font-size: 12px;
        }

        .acciones-superiores {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .boton-icono {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            border: 1px solid var(--borde);
            border-radius: 12px;
            background: white;
            cursor: pointer;
        }

        .boton-salir {
            padding: 11px 16px;
            border: 1px solid #fecaca;
            border-radius: 12px;
            background: #fff5f5;
            color: #b91c1c;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s;
        }

        .boton-salir:hover {
            background: #fee2e2;
        }

        .contenido {
            padding: 32px 34px 45px;
        }

        /* BIENVENIDA */

        .bienvenida {
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
            margin-bottom: 27px;
            padding: 30px 32px;
            border-radius: 22px;
            background:
                radial-gradient(circle at right, rgba(255,255,255,.18), transparent 27%),
                linear-gradient(135deg, #173b68, #2563a9);
            color: white;
            box-shadow: 0 18px 45px rgba(15, 39, 71, .17);
        }

        .bienvenida::after {
            content: "";
            position: absolute;
            width: 230px;
            height: 230px;
            right: -70px;
            bottom: -130px;
            border-radius: 50%;
            background: rgba(255,255,255,.08);
        }

        .bienvenida-contenido {
            position: relative;
            z-index: 2;
        }

        .bienvenida-etiqueta {
            display: inline-block;
            margin-bottom: 12px;
            padding: 7px 11px;
            border: 1px solid rgba(255,255,255,.18);
            border-radius: 999px;
            background: rgba(255,255,255,.10);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .8px;
        }

        .bienvenida h2 {
            margin-bottom: 9px;
            font-size: 25px;
            letter-spacing: -.7px;
        }

        .bienvenida p {
            max-width: 660px;
            color: #d8e4f2;
            font-size: 13px;
            line-height: 1.7;
        }

        .boton-nuevo {
            text-decoration: none;
            position: relative;
            z-index: 2;
            flex-shrink: 0;
            padding: 13px 18px;
            border: 0;
            border-radius: 13px;
            background: white;
            color: #173b68;
            font-size: 12px;
            font-weight: 800;
            cursor: pointer;
            box-shadow: 0 10px 25px rgba(0,0,0,.14);
        }

        /* TARJETAS */

        .tarjetas {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 25px;
        }

        .tarjeta {
            padding: 21px;
            border: 1px solid var(--borde);
            border-radius: 18px;
            background: white;
            box-shadow: 0 10px 30px rgba(29, 51, 84, .055);
            transition: .22s;
        }

        .tarjeta:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 38px rgba(29, 51, 84, .10);
        }

        .tarjeta-superior {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
        }

        .tarjeta-icono {
            width: 45px;
            height: 45px;
            display: grid;
            place-items: center;
            border-radius: 13px;
            font-size: 20px;
        }

        .icono-azul {
            background: #eaf1ff;
        }

        .icono-verde {
            background: #e9f9ef;
        }

        .icono-amarillo {
            background: #fff7df;
        }

        .icono-rojo {
            background: #fff0f0;
        }

        .tarjeta-cambio {
            padding: 5px 8px;
            border-radius: 999px;
            background: #edf9f1;
            color: var(--verde);
            font-size: 9px;
            font-weight: 800;
        }

        .tarjeta h3 {
            margin-top: 18px;
            font-size: 27px;
            letter-spacing: -1px;
        }

        .tarjeta p {
            margin-top: 6px;
            color: var(--texto-suave);
            font-size: 11px;
        }

        /* SECCIONES */

        .rejilla {
            display: grid;
            grid-template-columns: minmax(0, 1.45fr) minmax(300px, .75fr);
            gap: 22px;
        }

        .panel {
            border: 1px solid var(--borde);
            border-radius: 20px;
            background: white;
            box-shadow: 0 10px 30px rgba(29, 51, 84, .05);
        }

        .panel-encabezado {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 21px 22px;
            border-bottom: 1px solid var(--borde);
        }

        .panel-encabezado h3 {
            font-size: 15px;
        }

        .panel-encabezado p {
            margin-top: 5px;
            color: var(--texto-suave);
            font-size: 10px;
        }

        .ver-todos {
            color: var(--azul);
            font-size: 11px;
            font-weight: 700;
            text-decoration: none;
        }

        /* TABLA */

        .tabla-contenedor {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px 22px;
            border-bottom: 1px solid #eef2f6;
            text-align: left;
            white-space: nowrap;
        }

        th {
            color: #8792a3;
            font-size: 9px;
            font-weight: 800;
            letter-spacing: .7px;
            text-transform: uppercase;
        }

        td {
            font-size: 11px;
        }

        tbody tr:hover {
            background: #fafcff;
        }

        .candidato {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .candidato-avatar {
            width: 34px;
            height: 34px;
            display: grid;
            place-items: center;
            border-radius: 10px;
            background: var(--azul-claro);
            color: var(--azul);
            font-size: 11px;
            font-weight: 800;
        }

        .candidato strong {
            display: block;
            font-size: 11px;
        }

        .candidato span {
            display: block;
            margin-top: 3px;
            color: #96a0af;
            font-size: 9px;
        }

        .estado {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 9px;
            border-radius: 999px;
            font-size: 9px;
            font-weight: 800;
        }

        .estado::before {
            content: "";
            width: 6px;
            height: 6px;
            border-radius: 50%;
        }

        .estado-verde {
            background: #ecfdf3;
            color: #15803d;
        }

        .estado-verde::before {
            background: #22c55e;
        }

        .estado-amarillo {
            background: #fff8e7;
            color: #b45309;
        }

        .estado-amarillo::before {
            background: #f59e0b;
        }

        .estado-rojo {
            background: #fff1f1;
            color: #b91c1c;
        }

        .estado-rojo::before {
            background: #ef4444;
        }

        .calificacion {
            font-weight: 800;
        }

        /* RESUMEN */

        .resumen {
            padding: 22px;
        }

        .resumen-item {
            margin-bottom: 21px;
        }

        .resumen-item:last-child {
            margin-bottom: 0;
        }

        .resumen-datos {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 8px;
        }

        .resumen-datos span {
            color: var(--texto-suave);
            font-size: 10px;
        }

        .resumen-datos strong {
            font-size: 11px;
        }

        .barra {
            height: 8px;
            overflow: hidden;
            border-radius: 999px;
            background: #edf1f5;
        }

        .barra div {
            height: 100%;
            border-radius: inherit;
        }

        .barra-verde {
            width: 62%;
            background: var(--verde);
        }

        .barra-amarilla {
            width: 25%;
            background: #f59e0b;
        }

        .barra-roja {
            width: 13%;
            background: var(--rojo);
        }

        /* RESPONSIVE */

        .boton-menu {
            display: none;
        }

        @media (max-width: 1180px) {
            .tarjetas {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .rejilla {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 820px) {
            .aplicacion {
                display: block;
            }

            .sidebar {
                transform: translateX(-100%);
                transition: .25s;
            }

            .sidebar.abierto {
                transform: translateX(0);
            }

            .contenido-principal {
                margin-left: 0;
            }

            .boton-menu {
                width: 42px;
                height: 42px;
                display: grid;
                place-items: center;
                border: 1px solid var(--borde);
                border-radius: 12px;
                background: white;
                cursor: pointer;
            }

            .barra-superior {
                padding: 0 20px;
            }

            .titulo-superior {
                flex: 1;
            }

            .contenido {
                padding: 24px 20px 35px;
            }

            .bienvenida {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media (max-width: 560px) {
            .tarjetas {
                grid-template-columns: 1fr;
            }

            .barra-superior h1 {
                font-size: 17px;
            }

            .barra-superior p {
                display: none;
            }

            .boton-icono {
                display: none;
            }

            .bienvenida {
                padding: 25px 22px;
            }

            .bienvenida h2 {
                font-size: 21px;
            }

            .contenido {
                padding-left: 14px;
                padding-right: 14px;
            }
        }
    </style>
</head>

<body>

    <div class="aplicacion">

        <aside class="sidebar" id="sidebar">

            <div class="marca">
                <img
                    src="{{ asset('images/logo-sefinsa.png') }}"
                    alt="Logo SEFINSA"
                >

                <div>
                    <h2>SEFINSA Evalúa</h2>
                    <p>Administración de RH</p>
                </div>
            </div>

            <p class="menu-titulo">MENÚ PRINCIPAL</p>

            <nav class="menu">
                <a href="#" class="activo">
                    <span class="menu-icono">⌂</span>
                    Dashboard
                </a>

                <a href="{{ route('candidatos.index') }}">
                    <span class="menu-icono">👥</span>
                    Candidatos
                </a>

                

            <p class="menu-titulo">ADMINISTRACIÓN</p>



            <div class="sidebar-footer">

                <div class="usuario-sidebar">
                    <div class="avatar">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>

                    <div>
                        <strong>{{ auth()->user()->name }}</strong>
                        <span>Administrador</span>
                    </div>
                </div>

            </div>

        </aside>

        <section class="contenido-principal">

            <header class="barra-superior">

                <button
                    class="boton-menu"
                    type="button"
                    onclick="alternarMenu()"
                    aria-label="Abrir menú"
                >
                    ☰
                </button>

                <div class="titulo-superior">
                    <h1>Panel administrativo</h1>
                    <p>Control general de evaluaciones y candidatos.</p>
                </div>

                <div class="acciones-superiores">

                    <button class="boton-icono" type="button" title="Notificaciones">
                        🔔
                    </button>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button class="boton-salir" type="submit">
                            Cerrar sesión
                        </button>
                    </form>

                </div>

            </header>

            <main class="contenido">

                <section class="bienvenida">

                    <div class="bienvenida-contenido">

                        <span class="bienvenida-etiqueta">
                            RESUMEN GENERAL
                        </span>

                        <h2>
                            Bienvenido, {{ auth()->user()->name }}
                        </h2>

                        <p>
                            Desde este panel podrás registrar candidatos,
                            generar accesos, consultar evaluaciones y revisar
                            los resultados del proceso de selección.
                        </p>

                    </div>

                        <a href="{{ route('candidatos.index') }}" class="boton-nuevo">
                                    + Nuevo candidato
                        </a>

                </section>

                <section class="tarjetas">

    <article class="tarjeta">
        <div class="tarjeta-superior">
            <div class="tarjeta-icono icono-azul">👥</div>
            <span class="tarjeta-cambio">TOTAL</span>
        </div>

        <h3>{{ $totalCandidatos }}</h3>
        <p>Candidatos registrados</p>
    </article>

    <article class="tarjeta">
        <div class="tarjeta-superior">
            <div class="tarjeta-icono icono-verde">✓</div>
            <span class="tarjeta-cambio">COMPLETADOS</span>
        </div>

        <h3>{{ $candidatosFinalizados }}</h3>
        <p>Evaluaciones finalizadas</p>
    </article>

    <article class="tarjeta">
        <div class="tarjeta-superior">
            <div class="tarjeta-icono icono-amarillo">⌛</div>
            <span class="tarjeta-cambio">ACTIVOS</span>
        </div>

        <h3>{{ $candidatosEnProceso }}</h3>
        <p>Candidatos en proceso</p>
    </article>

    <article class="tarjeta">
        <div class="tarjeta-superior">
            <div class="tarjeta-icono icono-rojo">!</div>
            <span class="tarjeta-cambio">PENDIENTES</span>
        </div>

        <h3>{{ $candidatosPendientes }}</h3>
        <p>Sin iniciar evaluaciones</p>
    </article>

</section>

                <section class="rejilla">

                    <article class="panel">

                        <div class="panel-encabezado">

                            <div>
                                <h3>Evaluaciones recientes</h3>
                                <p>Últimos resultados registrados en el sistema.</p>
                            </div>

                            <a href="#" class="ver-todos">
                                Ver todos
                            </a>

                        </div>

                        <div class="tabla-contenedor">

                            <table>

                                <thead>
                                    <tr>
                                        <th>Candidato</th>
                                        <th>Matemáticas</th>
                                        <th>Psicométrico</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>

                                <tbody>

    @forelse ($candidatosRecientes as $candidato)

        @php
            $matematicas = $candidato->evaluaciones
                ->firstWhere('tipo', 'matematicas');

            $psicometrico = $candidato->evaluaciones
                ->firstWhere('tipo', 'psicometrico');

            $iniciales = collect(
                preg_split(
                    '/\s+/',
                    trim($candidato->nombre_completo)
                )
            )
            ->filter()
            ->take(2)
            ->map(function ($palabra) {
                return mb_strtoupper(
                    mb_substr($palabra, 0, 1)
                );
            })
            ->implode('');

            $tieneEvaluacionEnProceso =
                $candidato->evaluaciones->contains(
                    'estado',
                    'en_proceso'
                );
        @endphp

        <tr>
            <td>
                <div class="candidato">

                    <div class="candidato-avatar">
                        {{ $iniciales ?: 'C' }}
                    </div>

                    <div>
                        <strong>
                            {{ $candidato->nombre_completo }}
                        </strong>

                        <span>
                            {{ $candidato->puesto_solicitado
                                ?? $candidato->ciudad
                                ?? $candidato->usuario }}
                        </span>
                    </div>

                </div>
            </td>

            <td class="calificacion">
                @if (
                    $matematicas &&
                    $matematicas->estado === 'finalizada'
                )
                    {{ number_format(
                        $matematicas->calificacion,
                        1
                    ) }}%
                @elseif (
                    $matematicas &&
                    $matematicas->estado === 'en_proceso'
                )
                    En proceso
                @else
                    —
                @endif
            </td>

            <td class="calificacion">
                @if (
                    $psicometrico &&
                    $psicometrico->estado === 'finalizada'
                )
                    {{ number_format(
                        $psicometrico->calificacion,
                        1
                    ) }}%
                @elseif (
                    $psicometrico &&
                    $psicometrico->estado === 'en_proceso'
                )
                    En proceso
                @else
                    —
                @endif
            </td>

            <td>
                @if ($candidato->estado === 'finalizado')

                    <span class="estado estado-verde">
                        Finalizado
                    </span>

                @elseif ($tieneEvaluacionEnProceso)

                    <span class="estado estado-amarillo">
                        En proceso
                    </span>

                @else

                    <span class="estado estado-rojo">
                        Pendiente
                    </span>

                @endif
            </td>
        </tr>

    @empty

        <tr>
            <td colspan="4" style="text-align:center; padding:30px;">
                Todavía no hay candidatos registrados.
            </td>
        </tr>

    @endforelse

</tbody>

                            </table>

                        </div>

                    </article>

                    <article class="panel">

                        <div class="panel-encabezado">

                            <div>
                                <h3>Resumen de resultados</h3>
                                <p>Distribución actual de candidatos.</p>
                            </div>

                        </div>

                        <div class="resumen">

                            <div class="resumen-item">

                                <div class="resumen-datos">
                                    <span>Promedio matemático</span>
                                    <strong>{{ number_format($promedioMatematicas, 1) }}%</strong>
                                </div>

                                <div class="barra">
                                    <div
                                        class="barra-verde"
                                        style="width: {{ min($promedioMatematicas, 100) }}%;"
                                    ></div>
                                </div>

                            </div>

                            <div class="resumen-item">

                                <div class="resumen-datos">
                                    <span>Promedio psicométrico</span>
                                    <strong>{{ number_format($promedioPsicometrico, 1) }}%</strong>
                                </div>

                                <div class="barra">
  <div
    class="barra-amarilla"
    style="width: {{ min($promedioPsicometrico, 100) }}%;"
></div>
                                </div>

                            </div>

                            <div class="resumen-item">

                                <div class="resumen-datos">
                                    <span>Evaluaciones finalizadas</span>

<strong>
    {{ $candidatosFinalizados }}
    de
    {{ $totalCandidatos }}
</strong>
                                </div>

                                <div class="barra">
                                   <div
    class="barra-roja"
    style="width: {{
        $totalCandidatos > 0
            ? ($candidatosFinalizados / $totalCandidatos) * 100
            : 0
    }}%;"
></div>
                                </div>

                            </div>

                        </div>

                    </article>

                </section>

            </main>

        </section>

    </div>

    <script>
        function alternarMenu() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('abierto');
        }
    </script>

</body>
</html>

