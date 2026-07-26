<!DOCTYPE html>
<html lang="es">

<head>

    <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>SEFINSA Evalúa</title>

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
<link rel="shortcut icon" href="{{ asset('favicon.png') }}">
<link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">

    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>
        :root {
            --azul: #083ca8;
            --azul-oscuro: #052b7a;
            --azul-claro: #edf3ff;
            --naranja: #f58216;
            --texto: #172033;
            --texto-suave: #64748b;
            --borde: #e2e8f0;
            --blanco: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            font-family: "Inter", sans-serif;
            color: var(--texto);
            background:
                radial-gradient(
                    circle at top left,
                    rgba(245, 130, 22, 0.06),
                    transparent 28%
                ),
                radial-gradient(
                    circle at bottom right,
                    rgba(8, 60, 168, 0.07),
                    transparent 30%
                ),
                var(--blanco);
        }

        .pagina {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
        }

        /* =====================================
           PANEL IZQUIERDO
        ===================================== */

        .panel-informativo {
            position: relative;
            display: flex;
            align-items: center;
            padding: 55px 70px;
            overflow: hidden;
            background: transparent;
            color: var(--texto);
        }

        .panel-informativo::before {
            content: "";
            position: absolute;
            width: 380px;
            height: 380px;
            top: -220px;
            left: -180px;
            border-radius: 50%;
            background: rgba(245, 130, 22, 0.05);
        }

        .panel-informativo::after {
            content: "";
            position: absolute;
            width: 350px;
            height: 350px;
            right: -190px;
            bottom: -200px;
            border-radius: 50%;
            background: rgba(8, 60, 168, 0.05);
        }

        .contenido {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 760px;
            margin: 0 auto;
        }

        /* =====================================
           NOMBRE DEL SISTEMA
        ===================================== */

        .marca {
            display: block;
            margin-bottom: 45px;
        }

        .marca-texto h2 {
            margin: 0;
            color: var(--azul);
            font-size: clamp(38px, 4vw, 58px);
            font-weight: 800;
            line-height: 1;
            letter-spacing: -2px;
        }

        .marca-texto h2 span {
            color: var(--naranja);
        }

        .marca-texto p {
            margin-top: 14px;
            color: var(--texto-suave);
            font-size: 18px;
            line-height: 1.5;
        }

        /* =====================================
           CARRUSEL AUTOMÁTICO
        ===================================== */

        .carrusel-marcas {
            position: relative;
            width: 100%;
            height: 285px;
            display: flex;
            align-items: center;
            margin-bottom: 42px;
            overflow: hidden;
            border: 1px solid var(--borde);
            border-radius: 27px;
            background: rgba(255, 255, 255, 0.96);
            box-shadow: 0 22px 55px rgba(30, 55, 95, 0.09);
        }

        /* Degradados laterales para que los logos
           entren y salgan suavemente */

        .carrusel-marcas::before,
        .carrusel-marcas::after {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            z-index: 5;
            width: 85px;
            pointer-events: none;
        }

        .carrusel-marcas::before {
            left: 0;
            background: linear-gradient(
                to right,
                #ffffff 15%,
                rgba(255, 255, 255, 0)
            );
        }

        .carrusel-marcas::after {
            right: 0;
            background: linear-gradient(
                to left,
                #ffffff 15%,
                rgba(255, 255, 255, 0)
            );
        }

        .carrusel-track {
            display: flex;
            align-items: center;
            width: max-content;
            animation: moverCarrusel 24s linear infinite;
            will-change: transform;
        }

        /* El carrusel se pausa al poner el mouse */

        .carrusel-marcas:hover .carrusel-track {
            animation-play-state: paused;
        }

        .grupo-logos {
            display: flex;
            align-items: center;
            gap: 65px;
            padding: 0 32px;
        }

        .logo-marca {
            width: 175px;
            height: 125px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-marca img {
            display: block;
            max-width: 100%;
            max-height: 100px;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .logo-marca:hover img {
            transform: scale(1.08);
        }

        @keyframes moverCarrusel {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-50%);
            }
        }

        /* =====================================
           TARJETAS INFERIORES
        ===================================== */

        .beneficios {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-top: 0;
        }

        .beneficio {
            position: relative;
            min-height: 190px;
            padding: 24px 20px;
            overflow: hidden;
            border: 1px solid var(--borde);
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.96);
            box-shadow: 0 14px 35px rgba(30, 55, 95, 0.07);
            transition:
                transform 0.3s ease,
                box-shadow 0.3s ease,
                border-color 0.3s ease;
        }

        .beneficio:hover {
            transform: translateY(-6px);
            border-color: rgba(8, 60, 168, 0.22);
            box-shadow: 0 20px 45px rgba(30, 55, 95, 0.13);
        }

        .beneficio::after {
            content: "";
            position: absolute;
            left: 20px;
            bottom: 20px;
            width: 42px;
            height: 4px;
            border-radius: 20px;
            background: var(--naranja);
        }

        .beneficio strong {
            display: block;
            margin-bottom: 13px;
            color: var(--azul);
            font-size: 15px;
            font-weight: 800;
        }

        .beneficio span {
            display: block;
            padding-bottom: 25px;
            color: var(--texto-suave);
            font-size: 13px;
            line-height: 1.6;
        }

        /* =====================================
           PANEL DE LOGIN
        ===================================== */

        .panel-login {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            background: transparent;
        }

        .login {
            width: 100%;
            max-width: 430px;
            padding: 42px;
            border: 1px solid var(--borde);
            border-radius: 28px;
            background: rgba(255, 255, 255, 0.96);
            box-shadow: 0 30px 80px rgba(29, 51, 84, 0.14);
        }

        .etiqueta {
            display: inline-block;
            margin-bottom: 18px;
            padding: 8px 13px;
            border-radius: 999px;
            background: var(--azul-claro);
            color: var(--azul);
            font-size: 12px;
            font-weight: 700;
        }

        .login h2 {
            margin-bottom: 10px;
            color: var(--azul);
            font-size: 31px;
            letter-spacing: -1px;
        }

        .descripcion {
            margin-bottom: 32px;
            color: #6c7789;
            font-size: 14px;
            line-height: 1.6;
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

        .campo {
            margin-bottom: 20px;
        }

        .campo label {
            display: block;
            margin-bottom: 8px;
            color: var(--azul-oscuro);
            font-size: 13px;
            font-weight: 700;
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
            border-color: var(--azul);
            background: white;
            box-shadow: 0 0 0 4px rgba(8, 60, 168, 0.10);
        }

        .password-contenedor{
    position:relative;
}

.password-contenedor input{
    padding-right:55px;
}

.boton-ojo{
    position:absolute;
    top:50%;
    right:12px;
    transform:translateY(-50%);
    width:38px;
    height:38px;
    border:none;
    background:transparent;
    color:#94a3b8;
    cursor:pointer;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:18px;
    border-radius:50%;
    transition:.25s;
}

.boton-ojo:hover{
    background:#edf3ff;
    color:#083ca8;
}

.boton-ojo:focus{
    outline:none;
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

        .opciones input {
            accent-color: var(--azul);
        }

        .opciones a {
            color: var(--azul);
            font-weight: 600;
            text-decoration: none;
        }

        .boton {
            width: 100%;
            height: 55px;
            border: 0;
            border-radius: 15px;
            background: linear-gradient(
                135deg,
                var(--azul-oscuro),
                #1463e8
            );
            color: white;
            font: inherit;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 14px 25px rgba(8, 60, 168, 0.22);
            transition: 0.25s;
        }

        .boton:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 30px rgba(8, 60, 168, 0.30);
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

        /* =====================================
           DISEÑO PARA TABLET
        ===================================== */

        @media (max-width: 1050px) {
            .pagina {
                grid-template-columns: 1fr;
            }

            .panel-informativo {
                min-height: auto;
                padding: 45px 30px;
            }

            .contenido {
                max-width: 800px;
            }

            .marca {
                text-align: center;
            }

            .panel-login {
                padding: 20px 20px 45px;
            }

            .login {
                max-width: 600px;
            }
        }

        /* =====================================
           DISEÑO PARA CELULAR
        ===================================== */

        @media (max-width: 650px) {
            .panel-informativo {
                padding: 35px 18px;
            }

            .marca {
                margin-bottom: 30px;
            }

            .marca-texto h2 {
                font-size: 39px;
                letter-spacing: -1.5px;
            }

            .marca-texto p {
                font-size: 15px;
            }

            .carrusel-marcas {
                height: 205px;
                margin-bottom: 28px;
                border-radius: 21px;
            }

            .carrusel-marcas::before,
            .carrusel-marcas::after {
                width: 45px;
            }

            .grupo-logos {
                gap: 40px;
                padding: 0 20px;
            }

            .logo-marca {
                width: 140px;
                height: 95px;
            }

            .logo-marca img {
                max-height: 76px;
            }

            .beneficios {
                grid-template-columns: 1fr;
            }

            .beneficio {
                min-height: auto;
            }

            .panel-login {
                padding: 10px 18px 35px;
            }

            .login {
                padding: 28px 22px;
                border-radius: 22px;
            }

            .opciones {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .carrusel-track {
                animation-play-state: paused;
            }
        }
    </style>
</head>

<body>

    <main class="pagina">

        <!-- PANEL IZQUIERDO -->
        <section class="panel-informativo">

            <div class="contenido">

                <!-- NOMBRE, SIN LOGO -->
                <div class="marca">

                    <div class="marca-texto">

                        <h2>
                            SEFINSA <span>Evalúa</span>
                        </h2>

                        <p>
                        
                        </p>

                    </div>

                </div>

                <!-- CARRUSEL AUTOMÁTICO SIN FLECHAS -->
                <div class="carrusel-marcas">

                    <div class="carrusel-track">

                        <!-- PRIMER GRUPO DE LOGOS -->
                        <div class="grupo-logos">

                            <div class="logo-marca">
                                <img
                                    src="{{ asset('images/marcas/sefinsa.png') }}"
                                    alt="Grupo SEFINSA"
                                >
                            </div>

                            <div class="logo-marca">
                                <img
                                    src="{{ asset('images/marcas/procrese.png') }}"
                                    alt="procrese"
                                >
                            </div>

                            <div class="logo-marca">
                                <img
                                    src="{{ asset('images/marcas/credigrup.png') }}"
                                    alt="credi"
                                >
                            </div>

                            <div class="logo-marca">
                                <img
                                    src="{{ asset('images/marcas/plus.png') }}"
                                    alt="plus"
                                >
                            </div>

                            <div class="logo-marca">
                                <img
                                    src="{{ asset('images/marcas/grusef.png') }}"
                                    alt="LanaMX"
                                >
                            </div>

                        </div>

                        <!-- COPIA DEL MISMO GRUPO
                             NECESARIA PARA QUE NO SE CORTE -->
                        <div class="grupo-logos"
                             aria-hidden="true">

                            <div class="logo-marca">
                                <img
                                    src="{{ asset('images/marcas/sefinsa.png') }}"
                                    alt=""
                                >
                            </div>

                            <div class="logo-marca">
                                <img
                                    src="{{ asset('images/marcas/procrese.png') }}"
                                    alt=""
                                >
                            </div>

                            <div class="logo-marca">
                                <img
                                    src="{{ asset('images/marcas/credigrup.png') }}"
                                    alt=""
                                >
                            </div>

                            <div class="logo-marca">
                                <img
                                    src="{{ asset('images/marcas/plus.png') }}"
                                    alt=""
                                >
                            </div>

                            <div class="logo-marca">
                                <img
                                    src="{{ asset('images/marcas/grusef.png') }}"
                                    alt=""
                                >
                            </div>

                        </div>

                    </div>

                </div>

                <!-- TARJETAS ORIGINALES -->
                <div class="beneficios">

                    <article class="beneficio">

                        <strong>
                            Accesos seguros
                        </strong>

                        <span>
                            Credenciales individuales y temporales para cada candidato.
                        </span>

                    </article>

                    <article class="beneficio">

                        <strong>
                            Calificación automática
                        </strong>

                        <span>
                            Resultados disponibles al finalizar cada evaluación.
                        </span>

                    </article>

                    <article class="beneficio">

                        <strong>
                            Control de RH
                        </strong>

                        <span>
                            Seguimiento completo del proceso de evaluación.
                        </span>

                    </article>

                </div>

            </div>

        </section>

        <!-- PANEL DE LOGIN ORIGINAL -->
        <section class="panel-login">

            <div class="login">

                <span class="etiqueta">
                    PORTAL DE ACCESO
                </span>

                <h2>
                    Bienvenido
                </h2>

                <p class="descripcion">
                    Ingresa las credenciales de Administrador
                </p>

                @if ($errors->any())
                    <div class="alerta-error">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form
                    method="POST"
                    action="{{ route('login.procesar') }}"
                >

                    @csrf

                    <div class="campo">

                        <label for="email">
                            Correo electrónico
                        </label>

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

    <label for="password">
        Contraseña
    </label>

    <div class="password-contenedor">

        <input
            id="password"
            name="password"
            type="password"
            placeholder="Ingresa tu contraseña"
            autocomplete="current-password"
            required
        >

<button
    type="button"
    class="boton-ojo"
    onclick="togglePassword()"
    aria-label="Mostrar contraseña"
>
    <i class="fa-regular fa-eye"></i>
</button>

    </div>

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

                        <a href="#"></a>

                    </div>

                    <button
                        class="boton"
                        type="submit"
                    >
                        Iniciar sesión
                    </button>

                </form>

                <p class="seguridad">
                    Acceso exclusivo para personal de SefinsaTest.com
                </p>

            </div>

        </section>

    </main>

<script>

function togglePassword(){

    const input = document.getElementById('password');
    const icono = document.querySelector('.boton-ojo i');

    if(input.type === "password"){

        input.type = "text";

        icono.classList.remove("fa-eye");
        icono.classList.add("fa-eye-slash");

    }else{

        input.type = "password";

        icono.classList.remove("fa-eye-slash");
        icono.classList.add("fa-eye");

    }

}

</script>

</body>
</html>