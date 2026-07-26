<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Candidatos | SEFINSA Evalúa</title>

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
            border-radius: 12px;
            background: linear-gradient(135deg, var(--naranja), #ffb45c);
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

        .contenido-principal {
            grid-column: 2;
            min-width: 0;
        }

        .barra-superior {
            position: sticky;
            top: 0;
            z-index: 50;
            min-height: 82px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 18px 34px;
            border-bottom: 1px solid var(--borde);
            background: rgba(255,255,255,.94);
            backdrop-filter: blur(14px);
        }

        .barra-superior h1 {
            font-size: 21px;
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

        .boton-regresar,
        .boton-salir {
            padding: 11px 16px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
        }

        .boton-regresar {
            border: 1px solid var(--borde);
            background: white;
            color: var(--texto);
        }

        .boton-salir {
            border: 1px solid #fecaca;
            background: #fff5f5;
            color: #b91c1c;
        }

        .contenido {
            padding: 32px 34px 45px;
        }

        .encabezado-modulo {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
            margin-bottom: 24px;
            padding: 28px 30px;
            border-radius: 22px;
            background: linear-gradient(135deg, #173b68, #2563a9);
            color: white;
            box-shadow: 0 18px 45px rgba(15, 39, 71, .17);
        }

        .encabezado-modulo span {
            display: inline-block;
            margin-bottom: 10px;
            padding: 7px 11px;
            border-radius: 999px;
            background: rgba(255,255,255,.12);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .8px;
        }

        .encabezado-modulo h2 {
            font-size: 25px;
        }

        .encabezado-modulo p {
            margin-top: 8px;
            color: #d8e4f2;
            font-size: 13px;
            line-height: 1.6;
        }

        .boton-nuevo {
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

        .buscador{
    display:flex;
    align-items:center;
    gap:12px;
    flex-wrap:wrap;
}

.buscador span{
    display:none;
}

.buscador input{
    flex:1;
    min-width:260px;
    padding:12px 15px;
    border:1px solid var(--borde);
    border-radius:12px;
    outline:none;
}

.buscador input:focus{
    border-color:var(--azul);
    box-shadow:0 0 0 3px rgba(37,99,235,.10);
}

.buscador select{
    padding:12px 15px;
    border:1px solid var(--borde);
    border-radius:12px;
    outline:none;
    background:#fff;
    min-width:170px;
    cursor:pointer;
}

.buscador select:focus{
    border-color:var(--azul);
    box-shadow:0 0 0 3px rgba(37,99,235,.10);
}

.buscador button,
.buscador a{
    padding:12px 18px;
    border-radius:12px;
    font-weight:600;
    text-decoration:none;
    transition:.25s;
}

.buscador button{
    border:none;
    background:var(--azul);
    color:#fff;
    cursor:pointer;
}

.buscador button:hover{
    opacity:.9;
}

.buscador a{
    border:1px solid var(--borde);
    color:#555;
    background:#fff;
}

.buscador a:hover{
    background:#f5f5f5;
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
            padding: 15px 20px;
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
            width: 36px;
            height: 36px;
            display: grid;
            place-items: center;
            border-radius: 10px;
            background: var(--azul-claro);
            color: var(--azul);
            font-weight: 800;
        }

        .candidato strong {
            display: block;
            font-size: 11px;
        }

        .candidato small {
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

        .estado-pendiente {
            background: #fff8e7;
            color: #b45309;
        }

        .estado-pendiente::before {
            background: #f59e0b;
        }

        .estado-en_proceso {
            background: #eaf1ff;
            color: #1d4ed8;
        }

        .estado-en_proceso::before {
            background: #2563eb;
        }

        .estado-finalizado {
            background: #ecfdf3;
            color: #15803d;
        }

        .estado-finalizado::before {
            background: #22c55e;
        }

        .estado-bloqueado {
            background: #fff1f1;
            color: #b91c1c;
        }

        .estado-bloqueado::before {
            background: #ef4444;
        }

        .sin-registros {
            padding: 55px 25px;
            text-align: center;
            color: var(--texto-suave);
        }

        .sin-registros strong {
            display: block;
            margin-bottom: 7px;
            color: var(--texto);
            font-size: 15px;
        }

        .alerta-error {
            margin-bottom: 20px;
            padding: 15px 18px;
            border: 1px solid #fecaca;
            border-radius: 13px;
            background: #fef2f2;
            color: #b91c1c;
            font-size: 12px;
            line-height: 1.7;
        }

        .modal-fondo {
            position: fixed;
            inset: 0;
            z-index: 500;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: rgba(8, 24, 45, .62);
            backdrop-filter: blur(5px);
        }

        .modal-fondo.activo {
            display: flex;
        }

        .modal {
            width: min(720px, 100%);
            max-height: 92vh;
            overflow-y: auto;
            border-radius: 22px;
            background: white;
            box-shadow: 0 30px 80px rgba(0,0,0,.25);
        }

        .modal-encabezado {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 24px 26px;
            border-bottom: 1px solid var(--borde);
        }

        .modal-encabezado h3 {
            font-size: 18px;
        }

        .modal-encabezado p {
            margin-top: 5px;
            color: var(--texto-suave);
            font-size: 11px;
        }

        .cerrar-modal {
            width: 38px;
            height: 38px;
            border: 0;
            border-radius: 11px;
            background: #f2f5f8;
            cursor: pointer;
        }

        .formulario {
            padding: 25px 26px 28px;
        }

        .rejilla-formulario {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .campo-completo {
            grid-column: 1 / -1;
        }

        .campo label {
            display: block;
            margin-bottom: 8px;
            font-size: 11px;
            font-weight: 700;
        }

.campo input,
.campo select {
    width: 100%;
    padding: 12px 14px;
    border: 1px solid var(--borde);
    border-radius: 11px;
    outline: none;
    background: white;
}

.campo input:focus,
.campo select:focus {
    border-color: var(--azul);
    box-shadow: 0 0 0 3px rgba(37,99,235,.10);
}

        .acciones-formulario {
            display: flex;
            justify-content: flex-end;
            gap: 11px;
            margin-top: 24px;
        }

        .boton-cancelar,
        .boton-guardar {
            padding: 12px 18px;
            border-radius: 11px;
            font-weight: 700;
            cursor: pointer;
        }

        .boton-cancelar {
            border: 1px solid var(--borde);
            background: white;
        }

        .boton-guardar {
            border: 0;
            background: var(--azul);
            color: white;
        }

        .credenciales {
            text-align: center;
            padding: 30px;
        }

        .credenciales-icono {
            width: 68px;
            height: 68px;
            display: grid;
            place-items: center;
            margin: 0 auto 18px;
            border-radius: 20px;
            background: #ecfdf3;
            font-size: 30px;
        }

        .credenciales h3 {
            font-size: 20px;
        }

        .credenciales p {
            margin-top: 8px;
            color: var(--texto-suave);
            font-size: 12px;
        }

        .credenciales-caja {
            margin-top: 22px;
            padding: 20px;
            border: 1px dashed #bfd0e5;
            border-radius: 16px;
            background: #f8fbff;
            text-align: left;
        }

        .credencial-linea {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            padding: 10px 0;
            border-bottom: 1px solid #e7edf5;
        }

        .credencial-linea:last-child {
            border-bottom: 0;
        }

        .credencial-linea span {
            color: var(--texto-suave);
            font-size: 11px;
        }

        .credencial-linea strong {
            font-size: 12px;
        }

        .credenciales-aviso {
            margin-top: 17px;
            padding: 12px;
            border-radius: 11px;
            background: #fff8e7;
            color: #92400e;
            font-size: 10px;
            line-height: 1.6;
        }

        .boton-cerrar-credenciales {
            margin-top: 20px;
            padding: 12px 18px;
            border: 0;
            border-radius: 11px;
            background: var(--azul-oscuro);
            color: white;
            font-weight: 700;
            cursor: pointer;
        }

        .boton-menu {
            display: none;
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
            }

            .barra-superior {
                padding: 16px 20px;
            }

            .contenido {
                padding: 24px 20px 35px;
            }

            .encabezado-modulo {
                align-items: flex-start;
                flex-direction: column;
            }

            .rejilla-formulario {
                grid-template-columns: 1fr;
            }

            .campo-completo {
                grid-column: auto;
            }
        }

        @media (max-width: 560px) {
            .contenido {
                padding-left: 14px;
                padding-right: 14px;
            }

            .barra-superior p {
                display: none;
            }

            .boton-regresar {
                display: none;
            }

            .encabezado-modulo {
                padding: 24px 21px;
            }

            .encabezado-modulo h2 {
                font-size: 21px;
            }

            .panel-encabezado {
                align-items: stretch;
                flex-direction: column;
            }

            .acciones-superiores {
                gap: 6px;
            }

            .boton-ver {
                display: inline-flex;
                align-items: center;
                padding: 8px 11px;
                border: 1px solid #bfdbfe;
                border-radius: 9px;
                background: #eff6ff;
                color: #1d4ed8;
                font-size: 10px;
                font-weight: 800;
                text-decoration: none;
                transition: .2s;
}

.boton-ver:hover {
    background: #dbeafe;
    transform: translateY(-1px);
}

.alerta-exito {
    margin-bottom: 20px;
    padding: 15px 18px;
    border: 1px solid #bbf7d0;
    border-radius: 13px;
    background: #f0fdf4;
    color: #15803d;
    font-size: 12px;
    font-weight: 700;
}

        }
    </style>
</head>

<body>

<div class="aplicacion">

    <aside class="sidebar" id="sidebar">

        <div class="marca">
            <img src="{{ asset('images/logo-sefinsa.png') }}" alt="Logo SEFINSA">

            <div>
                <h2>SEFINSA Evalúa</h2>
                <p>Administración de RH</p>
            </div>
        </div>

        <p class="menu-titulo">MENÚ PRINCIPAL</p>

        <nav class="menu">
            <a href="{{ route('dashboard') }}">
                <span class="menu-icono">⌂</span>
                Inicio
            </a>

            <a href="{{ route('candidatos.index') }}" class="activo">
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
            >
                ☰
            </button>

            <div>
                <h1>Gestión de candidatos</h1>
                <p>Registro y control de accesos para evaluaciones.</p>
            </div>

            <div class="acciones-superiores">

                <a href="{{ route('dashboard') }}" class="boton-regresar"> Inicio
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="boton-salir">
                        Cerrar sesión
                    </button>
                </form>

            </div>

        </header>

        <main class="contenido">

        @if (session('success'))
    <div class="alerta-exito">
        {{ session('success') }}
    </div>
@endif

            @if ($errors->any())
                <div class="alerta-error">
                    <strong>No fue posible registrar al candidato.</strong><br>

                    {{ $errors->first() }}
                </div>
            @endif

            <section class="encabezado-modulo">

                <div>
                    <span>MÓDULO DE RECLUTAMIENTO</span>

                    <h2>Candidatos registrados</h2>

                    <p>
                        Registra candidatos, genera credenciales temporales
                        y consulta el estado de cada evaluación.
                    </p>
                </div>

                <button class="boton-nuevo" type="button" onclick="abrirModal()">
                    + Nuevo candidato
                </button>

            </section>

            <section class="panel">

                <div class="panel-encabezado">

                    <form method="GET"
      action="{{ route('candidatos.index') }}"
      class="buscador d-flex align-items-center gap-3 flex-wrap">

    <span>🔍</span>

    <input
        type="search"
        name="buscar"
        value="{{ $busqueda }}"
        placeholder="Buscar por nombre, correo, puesto, ciudad o usuario..."
    >

    <select name="estado" onchange="this.form.submit()">
        <option value="">Todos los estados</option>
        <option value="pendiente" {{ $estado=='pendiente' ? 'selected' : '' }}>
            Pendiente
        </option>
        <option value="en_proceso" {{ $estado=='en_proceso' ? 'selected' : '' }}>
            En proceso
        </option>
        <option value="finalizado" {{ $estado=='finalizado' ? 'selected' : '' }}>
            Finalizado
        </option>
        <option value="bloqueado" {{ $estado=='bloqueado' ? 'selected' : '' }}>
            Bloqueado
        </option>
    </select>

    <select name="puesto" onchange="this.form.submit()">
        <option value="">Todos los puestos</option>

        @foreach($puestos as $item)
            <option
                value="{{ $item }}"
                {{ $puesto==$item ? 'selected' : '' }}>
                {{ $item }}
            </option>
        @endforeach
    </select>

    <select name="ciudad" onchange="this.form.submit()">
        <option value="">Todas las ciudades</option>

        @foreach($ciudades as $item)
            <option
                value="{{ $item }}"
                {{ $ciudad==$item ? 'selected' : '' }}>
                {{ $item }}
            </option>
        @endforeach
    </select>

    <button class="btn btn-primary">
        Buscar
    </button>

    <a href="{{ route('candidatos.index') }}"
       class="btn btn-outline-secondary">
        Limpiar
    </a>

</form>

                </div>

                @if ($candidatos->count())

                    <div class="tabla-contenedor">

                        <table>
                            <thead>
                                <tr>
                                    <th>Candidato</th>
                                    <th>Puesto</th>
                                    <th>Ciudad</th>
                                    <th>Usuario</th>
                                    <th>Estado</th>
                                    <th>Acceso</th>
                                    <th>Registro</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($candidatos as $candidato)

                                    @php
                                        $iniciales =
                                            strtoupper(substr($candidato->nombre, 0, 1)) .
                                            strtoupper(substr($candidato->apellido_paterno, 0, 1));
                                    @endphp

                                    <tr>
                                        <td>
                                            <div class="candidato">
                                                <div class="candidato-avatar">
                                                    {{ $iniciales }}
                                                </div>

                                                <div>
                                                    <strong>
                                                        {{ $candidato->nombre_completo }}
                                                    </strong>

                                                    <small>
                                                        {{ $candidato->correo ?: 'Sin correo registrado' }}
                                                    </small>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                                         {{ $candidato->puesto_solicitado }}
                                        </td>

                                        <td>
                                                         {{ $candidato->ciudad }}
                                        </td>

                                        <td>
                                                <strong>{{ $candidato->usuario }}</strong>
                                        </td>

                                        <td>
                                            <span class="estado estado-{{ $candidato->estado }}">
                                                {{ ucfirst(str_replace('_', ' ', $candidato->estado)) }}
                                            </span>
                                        </td>

                                        <td>
                                            {{ $candidato->credenciales_activas ? 'Activo' : 'Desactivado' }}
                                        </td>

                                        <td>
                                            {{ $candidato->created_at->format('d/m/Y') }}
                                        </td>
                                        <td>
                                            <a
                                                href="{{ route('candidatos.show', $candidato) }}"
                                                class="boton-ver"
                                                >
                                                Ver expediente
                                            </a>
                                        </td>
                                    </tr>

                                @endforeach

                            </tbody>
                        </table>

                    </div>

                @else

                    <div class="sin-registros">
                        <strong>No hay candidatos registrados</strong>

                        Registra el primer candidato para generar sus credenciales.
                    </div>

                @endif

            </section>

        </main>

    </section>

</div>

<div class="modal-fondo {{ $errors->any() ? 'activo' : '' }}" id="modalRegistro">

    <div class="modal">

        <div class="modal-encabezado">

            <div>
                <h3>Registrar candidato</h3>

                <p>
                    Captura los datos para generar sus credenciales.
                </p>
            </div>

            <button type="button" class="cerrar-modal" onclick="cerrarModal()">
                ✕
            </button>

        </div>

        <form
            method="POST"
            action="{{ route('candidatos.store') }}"
            class="formulario"
        >
            @csrf

            <div class="rejilla-formulario">

                <div class="campo">
                    <label for="nombre">Nombre(s) *</label>

                    <input
                        id="nombre"
                        name="nombre"
                        type="text"
                        value="{{ old('nombre') }}"
                        required
                    >
                </div>

                <div class="campo">
                    <label for="apellido_paterno">Apellido paterno *</label>

                    <input
                        id="apellido_paterno"
                        name="apellido_paterno"
                        type="text"
                        value="{{ old('apellido_paterno') }}"
                        required
                    >
                </div>

                <div class="campo">
                    <label for="apellido_materno">Apellido materno</label>

                    <input
                        id="apellido_materno"
                        name="apellido_materno"
                        type="text"
                        value="{{ old('apellido_materno') }}"
                    >
                </div>

                <div class="campo">
                    <label for="telefono">Teléfono</label>

                    <input
                        id="telefono"
                        name="telefono"
                        type="text"
                        value="{{ old('telefono') }}"
                    >
                </div>

                <div class="campo campo-completo">
                    <label for="correo">Correo electrónico</label>

                    <input
                        id="correo"
                        name="correo"
                        type="email"
                        value="{{ old('correo') }}"
                    >
                </div>

                <div class="campo campo-completo">
                    <label for="puesto_solicitado">Puesto solicitado *</label>

                    <input
                        id="puesto_solicitado"
                        name="puesto_solicitado"
                        type="text"
                        value="{{ old('puesto_solicitado') }}"
                        required
                    >
                </div>


                <div class="campo campo-completo">
    <label for="ciudad">Ciudad *</label>

    <select
        id="ciudad"
        name="ciudad"
        required
    >
        <option value="">Seleccione una ciudad</option>

        <option value="Torreón" {{ old('ciudad') == 'Torreón' ? 'selected' : '' }}>
            Torreón
        </option>

        <option value="Saltillo" {{ old('ciudad') == 'Saltillo' ? 'selected' : '' }}>
            Saltillo
        </option>

        <option value="Monclova" {{ old('ciudad') == 'Monclova' ? 'selected' : '' }}>
            Monclova
        </option>

        <option value="Monterrey" {{ old('ciudad') == 'Monterrey' ? 'selected' : '' }}>
            Monterrey
        </option>
    </select>
</div>

            </div>

            <div class="acciones-formulario">

                <button
                    type="button"
                    class="boton-cancelar"
                    onclick="cerrarModal()"
                >
                    Cancelar
                </button>

                <button type="submit" class="boton-guardar">
                    Guardar candidato
                </button>

            </div>

        </form>

    </div>

</div>

@if (session('registro_exitoso'))

    @php
        $registrado = session('candidato_registrado');
    @endphp

    <div class="modal-fondo activo" id="modalCredenciales">

        <div class="modal">

            <div class="credenciales">

                <div class="credenciales-icono">✓</div>

                <h3>Candidato registrado correctamente</h3>

                <p>
                    Entrega estas credenciales al candidato.
                </p>

                <div class="credenciales-caja">

                    <div class="credencial-linea">
                        <span>Nombre</span>
                        <strong>{{ $registrado['nombre'] }}</strong>
                    </div>

                    <div class="credencial-linea">
                        <span>Puesto</span>
                        <strong>{{ $registrado['puesto'] }}</strong>
                    </div>

                    <div class="credencial-linea">
                        <span>Usuario</span>
                        <strong>{{ $registrado['usuario'] }}</strong>
                    </div>

                    <div class="credencial-linea">
                        <span>Contraseña temporal</span>
                        <strong>{{ $registrado['password'] }}</strong>
                    </div>

                </div>

                <div class="credenciales-aviso">
                    La contraseña se muestra únicamente en este momento.
                    Guárdala o entrégala al candidato antes de cerrar.
                </div>

                <button
                    type="button"
                    class="boton-cerrar-credenciales"
                    onclick="cerrarCredenciales()"
                >
                    Cerrar
                </button>

            </div>

        </div>

    </div>

@endif

<script>
    function abrirModal() {
        document.getElementById('modalRegistro').classList.add('activo');
    }

    function cerrarModal() {
        document.getElementById('modalRegistro').classList.remove('activo');
    }

    function cerrarCredenciales() {
        const modal = document.getElementById('modalCredenciales');

        if (modal) {
            modal.classList.remove('activo');
        }
    }

    function alternarMenu() {
        document.getElementById('sidebar').classList.toggle('abierto');
    }

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            cerrarModal();
            cerrarCredenciales();
        }
    });
</script>

</body>
</html>
