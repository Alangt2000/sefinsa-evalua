<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Acceso de candidato | SEFINSA Evalúa</title>

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
                radial-gradient(circle at top left, rgba(37, 99, 235, .18), transparent 35%),
                linear-gradient(135deg, #eef4fb, #f8fafc);
            color: var(--texto);
        }

        button,
        input {
            font: inherit;
        }

        .pagina {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1.1fr .9fr;
        }

        .presentacion {
            position: relative;
            display: flex;
            align-items: center;
            padding: 70px;
            overflow: hidden;
            background:
                linear-gradient(rgba(9, 31, 58, .88), rgba(16, 43, 78, .92)),
                url("{{ asset('images/logo-sefinsa.png') }}") center / 420px no-repeat;
            color: white;
        }

        .presentacion::before,
        .presentacion::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, .06);
        }

        .presentacion::before {
            width: 360px;
            height: 360px;
            top: -120px;
            right: -100px;
        }

        .presentacion::after {
            width: 260px;
            height: 260px;
            bottom: -100px;
            left: -80px;
        }

        .presentacion-contenido {
            position: relative;
            z-index: 2;
            max-width: 620px;
        }

        .marca {
            display: inline-flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 42px;
        }

        .marca img {
            width: 64px;
            height: 64px;
            object-fit: contain;
            padding: 7px;
            border-radius: 16px;
            background: white;
        }

        .marca strong {
            display: block;
            font-size: 19px;
        }

        .marca span {
            display: block;
            margin-top: 4px;
            color: #b8cbe1;
            font-size: 11px;
        }

        .etiqueta {
            display: inline-block;
            margin-bottom: 18px;
            padding: 8px 12px;
            border-radius: 999px;
            background: rgba(255, 255, 255, .10);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .presentacion h1 {
            max-width: 570px;
            font-size: clamp(36px, 5vw, 64px);
            line-height: 1.05;
        }

        .presentacion h1 span {
            color: #ffad55;
        }

        .presentacion p {
            max-width: 560px;
            margin-top: 22px;
            color: #d5e1ef;
            font-size: 15px;
            line-height: 1.8;
        }

        .beneficios {
            display: grid;
            gap: 14px;
            margin-top: 35px;
        }

        .beneficio {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #e9f1f9;
            font-size: 13px;
        }

        .beneficio-icono {
            width: 34px;
            height: 34px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border-radius: 10px;
            background: rgba(255, 255, 255, .10);
        }

        .acceso {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 45px 28px;
        }

        .tarjeta {
            width: min(430px, 100%);
            padding: 38px;
            border: 1px solid rgba(223, 230, 239, .85);
            border-radius: 24px;
            background: rgba(255, 255, 255, .96);
            box-shadow: 0 28px 70px rgba(26, 50, 83, .15);
            backdrop-filter: blur(12px);
        }

        .tarjeta-encabezado {
            margin-bottom: 28px;
        }

        .tarjeta-encabezado span {
            color: var(--azul);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .8px;
        }

        .tarjeta-encabezado h2 {
            margin-top: 9px;
            font-size: 28px;
        }

        .tarjeta-encabezado p {
            margin-top: 10px;
            color: var(--texto-suave);
            font-size: 12px;
            line-height: 1.7;
        }

        .alerta {
            margin-bottom: 20px;
            padding: 13px 15px;
            border: 1px solid #fecaca;
            border-radius: 12px;
            background: #fef2f2;
            color: var(--rojo);
            font-size: 12px;
            line-height: 1.6;
        }

        .alerta-exito {
            border-color: #bbf7d0;
            background: #f0fdf4;
            color: #15803d;
        }

        .campo {
            margin-bottom: 18px;
        }

        .campo label {
            display: block;
            margin-bottom: 8px;
            font-size: 11px;
            font-weight: 700;
        }

        .entrada {
            position: relative;
        }

        .entrada span {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }

        .entrada input {
            width: 100%;
            padding: 13px 14px 13px 43px;
            border: 1px solid var(--borde);
            border-radius: 12px;
            outline: none;
            background: white;
            transition: .2s;
        }

        .entrada input:focus {
            border-color: var(--azul);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, .10);
        }

        .boton {
            width: 100%;
            margin-top: 7px;
            padding: 14px 18px;
            border: 0;
            border-radius: 12px;
            background: linear-gradient(135deg, #1d4ed8, #2563eb);
            color: white;
            font-weight: 800;
            cursor: pointer;
            transition: .2s;
        }

        .boton:hover {
            transform: translateY(-1px);
            box-shadow: 0 12px 24px rgba(37, 99, 235, .22);
        }

        .aviso {
            margin-top: 22px;
            padding: 13px;
            border-radius: 11px;
            background: var(--azul-claro);
            color: #31558a;
            font-size: 10px;
            line-height: 1.6;
            text-align: center;
        }

        .pie {
            margin-top: 24px;
            color: #94a3b8;
            font-size: 10px;
            text-align: center;
        }

        @media (max-width: 900px) {
            .pagina {
                grid-template-columns: 1fr;
            }

            .presentacion {
                min-height: 370px;
                padding: 45px 28px;
            }

            .presentacion h1 {
                font-size: 40px;
            }

            .beneficios {
                display: none;
            }

            .acceso {
                padding: 38px 20px;
            }
        }

        @media (max-width: 520px) {
            .presentacion {
                min-height: 300px;
            }

            .marca {
                margin-bottom: 25px;
            }

            .presentacion h1 {
                font-size: 32px;
            }

            .presentacion p {
                font-size: 13px;
            }

            .tarjeta {
                padding: 28px 22px;
            }
        }
    </style>
</head>

<body>

<div class="pagina">

    <section class="presentacion">

        <div class="presentacion-contenido">

            <div class="marca">
                <img src="{{ asset('images/logo-sefinsa.png') }}" alt="Logo SEFINSA">

                <div>
                    <strong>SEFINSA Evalúa</strong>
                    <span>Plataforma de evaluación de candidatos</span>
                </div>
            </div>

            <span class="etiqueta">PORTAL DEL CANDIDATO</span>

            <h1>
                Tu proceso comienza
                <span>aquí.</span>
            </h1>

            <p>
                Accede con las credenciales proporcionadas por Recursos Humanos
                y completa las evaluaciones asignadas a tu proceso de selección.
            </p>

            <div class="beneficios">
                <div class="beneficio">
                    <div class="beneficio-icono">✓</div>
                    Acceso seguro mediante credenciales personales
                </div>

                <div class="beneficio">
                    <div class="beneficio-icono">📝</div>
                    Evaluaciones organizadas y fáciles de completar
                </div>

                <div class="beneficio">
                    <div class="beneficio-icono">🔒</div>
                    Información protegida durante todo el proceso
                </div>
            </div>

        </div>

    </section>

    <section class="acceso">

        <div class="tarjeta">

            <div class="tarjeta-encabezado">
                <span>ACCESO PERSONAL</span>

                <h2>Iniciar sesión</h2>

                <p>
                    Ingresa el usuario y la contraseña temporal entregados por
                    el área de Recursos Humanos.
                </p>
            </div>

            @if (session('success'))
                <div class="alerta alerta-exito">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alerta">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('candidato.autenticar') }}">
                @csrf

                <div class="campo">
                    <label for="usuario">Usuario</label>

                    <div class="entrada">
                        <span>👤</span>

                        <input
                            id="usuario"
                            name="usuario"
                            type="text"
                            value="{{ old('usuario') }}"
                            autocomplete="username"
                            autofocus
                            required
                        >
                    </div>
                </div>

                <div class="campo">
                    <label for="password">Contraseña</label>

                    <div class="entrada">
                        <span>🔑</span>

                        <input
                            id="password"
                            name="password"
                            type="password"
                            autocomplete="current-password"
                            required
                        >
                    </div>
                </div>

                <button type="submit" class="boton">
                    Entrar a mis evaluaciones
                </button>
            </form>

            <div class="aviso">
                Si no puedes acceder, comunícate con Recursos Humanos para
                verificar que tus credenciales continúen activas.
            </div>

            <div class="pie">
                SEFINSA · Plataforma interna de reclutamiento
            </div>

        </div>

    </section>

</div>

</body>
</html>
