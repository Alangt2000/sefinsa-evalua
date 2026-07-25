<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SEFINSA Evalúa</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            font-family: "Inter", sans-serif;
            background:
                radial-gradient(circle at top left, rgba(37, 99, 235, 0.22), transparent 35%),
                radial-gradient(circle at bottom right, rgba(15, 118, 110, 0.18), transparent 35%),
                #f4f7fb;
            color: #172033;
        }

        .pagina {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
        }

        .panel-informativo {
            position: relative;
            display: flex;
            align-items: center;
            padding: 70px;
            overflow: hidden;
            background: linear-gradient(145deg, #0f2747, #153b67);
            color: white;
        }

        .panel-informativo::before,
        .panel-informativo::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.06);
        }

        .panel-informativo::before {
            width: 340px;
            height: 340px;
            top: -120px;
            right: -100px;
        }

        .panel-informativo::after {
            width: 280px;
            height: 280px;
            bottom: -120px;
            left: -80px;
        }

        .contenido {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 700px;
        }

        .marca {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 55px;
        }

        .marca-texto {
    min-width: 0;
}

.marca-texto h2 {
    margin: 0;
    font-size: 22px;
    letter-spacing: 0.4px;
}

.marca-texto p {
    margin-top: 3px;
    color: #bed0e6;
    font-size: 13px;
}

        .logo-sefinsa {
            width: 150px;
            height: auto;
            display: block;
            object-fit: contain;
            padding: 8px 12px;
            border-radius: 12px;
            background: white;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.18);
        }


        .contenido h1 {
            max-width: 560px;
            margin-bottom: 22px;
            font-size: clamp(42px, 5vw, 68px);
            line-height: 1.05;
            letter-spacing: -2px;
        }

        .contenido > p {
            max-width: 530px;
            color: #cfdaea;
            font-size: 17px;
            line-height: 1.8;
        }

        .beneficios {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-top: 45px;
        }

        .beneficio {
            padding: 18px;
            border: 1px solid rgba(255, 255, 255, 0.14);
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.07);
            backdrop-filter: blur(10px);
        }

        .beneficio strong {
            display: block;
            margin-bottom: 7px;
            font-size: 14px;
        }

        .beneficio span {
            color: #bdcce0;
            font-size: 12px;
            line-height: 1.5;
        }

        .panel-login {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        .login {
            width: 100%;
            max-width: 430px;
            padding: 42px;
            border: 1px solid rgba(207, 218, 232, 0.8);
            border-radius: 28px;
            background: rgba(255, 255, 255, 0.92);
            box-shadow: 0 30px 80px rgba(29, 51, 84, 0.14);
        }

        .etiqueta {
            display: inline-block;
            margin-bottom: 18px;
            padding: 8px 13px;
            border-radius: 999px;
            background: #e8f0ff;
            color: #2456a4;
            font-size: 12px;
            font-weight: 700;
        }

        .login h2 {
            margin-bottom: 10px;
            font-size: 31px;
            letter-spacing: -1px;
        }

        .descripcion {
            margin-bottom: 32px;
            color: #6c7789;
            font-size: 14px;
            line-height: 1.6;
        }

        .campo {
            margin-bottom: 20px;
        }

        .campo label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 700;
            color: #3a4659;
        }

        .campo input {
            width: 100%;
            height: 54px;
            padding: 0 16px;
            border: 1px solid #d7dfeb;
            border-radius: 14px;
            outline: none;
            background: #fbfcfe;
            font: inherit;
            transition: 0.25s;
        }

        .campo input:focus {
            border-color: #2563eb;
            background: white;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }

        .opciones {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
            color: #697588;
            font-size: 13px;
        }

        .opciones label {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .opciones a {
            color: #1f5fc4;
            font-weight: 600;
            text-decoration: none;
        }

        .boton {
            width: 100%;
            height: 55px;
            border: 0;
            border-radius: 15px;
            background: linear-gradient(135deg, #1d4f91, #2563eb);
            color: white;
            font: inherit;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 14px 25px rgba(37, 99, 235, 0.22);
            transition: 0.25s;
        }

        .boton:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 30px rgba(37, 99, 235, 0.3);
        }

        .seguridad {
            margin-top: 25px;
            padding-top: 22px;
            border-top: 1px solid #edf0f4;
            color: #8a94a4;
            font-size: 12px;
            line-height: 1.6;
            text-align: center;
        }

        @media (max-width: 950px) {
            .pagina {
                grid-template-columns: 1fr;
            }

            .panel-informativo {
                min-height: auto;
                padding: 45px 30px;
            }

            .contenido h1 {
                font-size: 42px;
            }

            .beneficios {
                grid-template-columns: 1fr;
            }

            .panel-login {
                padding: 35px 20px;
            }
        }

        @media (max-width: 520px) {
            .panel-informativo {
                padding: 35px 22px;
            }

            .marca {
                margin-bottom: 35px;
            }

            .contenido h1 {
                font-size: 36px;
            }

            .login {
                padding: 28px 22px;
                border-radius: 22px;
            }

            .opciones {
                align-items: flex-start;
                flex-direction: column;
            }

            .alerta-error {
                margin-bottom: 20px;
                padding: 13px 15px;
                border: 1px solid #fecaca;
                border-radius: 12px;
                background: #fef2f2;
                color: #b91c1c;
                font-size: 13px;
                line-height: 1.5;
            }

        }
    </style>
</head>

<body>
    <main class="pagina">

        <section class="panel-informativo">
            <div class="contenido">

<div class="marca">

    <img
        src="{{ asset('images/logo-sefinsa.png') }}"
        alt="Logo de SEFINSA"
        class="logo-sefinsa"
    >

    <div class="marca-texto">
        <h2>SEFINSA Evalúa</h2>
        <p>Sistema de evaluación de personal</p>
    </div>

</div>

                <h1>Evaluaciones más claras, rápidas y confiables.</h1>

                <p>
                    Plataforma digital para administrar candidatos, aplicar
                    evaluaciones y consultar resultados desde un solo lugar.
                </p>

                <div class="beneficios">

                    <article class="beneficio">
                        <strong>Accesos seguros</strong>
                        <span>Credenciales individuales y temporales para cada candidato.</span>
                    </article>

                    <article class="beneficio">
                        <strong>Calificación automática</strong>
                        <span>Resultados disponibles al finalizar cada evaluación.</span>
                    </article>

                    <article class="beneficio">
                        <strong>Control de RH</strong>
                        <span>Seguimiento completo del proceso de evaluación.</span>
                    </article>

                </div>
            </div>
        </section>

        <section class="panel-login">

            <div class="login">

                <span class="etiqueta">PORTAL DE ACCESO</span>

                <h2>Bienvenido</h2>

                <p class="descripcion">
                    Ingresa las credenciales proporcionadas por el área de
                    Recursos Humanos.
                </p>
                    
                @if ($errors->any())
                <div class="alerta-error">
                        {{ $errors->first() }}
                </div>
                @endif

                <form method="POST" action="{{ route('login.procesar') }}">
                        @csrf

                    <div class="campo">
                        <label for="email">Correo electrónico</label>

                        <input
                                id="email"
                                name="email"
                                type="email"
                                value="{{ old('email') }}"
                                placeholder="Ingresa tu correo"
                                autocomplete="email"
                                required
                        >
                    </div>

                    <div class="campo">
                        <label for="password">Contraseña</label>

<input
    id="password"
    name="password"
    type="password"
    placeholder="Ingresa tu contraseña"
    autocomplete="current-password"
    required
>
                    </div>

                    <div class="opciones">
                        <label>
<input
    type="checkbox"
    name="remember"
    value="1"
    {{ old('remember') ? 'checked' : '' }}
>
                            Recordar usuario
                        </label>

                        <a href="#">Ayuda de acceso</a>
                    </div>

                    <button class="boton" type="submit">
                        Iniciar sesión
                    </button>

                </form>

                <p class="seguridad">
                    Acceso exclusivo para personal autorizado y candidatos
                    registrados por SEFINSA.
                </p>

            </div>
        </section>

    </main>
</body>
</html>