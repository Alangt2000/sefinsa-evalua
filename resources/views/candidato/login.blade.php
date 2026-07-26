<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Acceso de candidato | SEFINSA Evalúa</title>

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
            --azul-oscuro: #052b7a;
            --azul: #083ca8;
            --azul-claro: #edf3ff;
            --naranja: #f58216;
            --fondo: #ffffff;
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
            color: var(--texto);
            background:
                radial-gradient(
                    circle at top left,
                    rgba(245, 130, 22, 0.06),
                    transparent 30%
                ),
                radial-gradient(
                    circle at bottom right,
                    rgba(8, 60, 168, 0.08),
                    transparent 32%
                ),
                var(--fondo);
        }

        button,
        input {
            font: inherit;
        }

        .pagina {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
        }

        /* =====================================
           PANEL IZQUIERDO
        ===================================== */

        .presentacion {
            position: relative;
            display: flex;
            align-items: center;
            padding: 55px 70px;
            overflow: hidden;
            background: transparent;
            color: var(--texto);
        }

        .presentacion::before {
            content: "";
            position: absolute;
            width: 380px;
            height: 380px;
            top: -220px;
            left: -180px;
            border-radius: 50%;
            background: rgba(245, 130, 22, 0.05);
        }

        .presentacion::after {
            content: "";
            position: absolute;
            width: 360px;
            height: 360px;
            right: -200px;
            bottom: -210px;
            border-radius: 50%;
            background: rgba(8, 60, 168, 0.05);
        }

        .presentacion-contenido {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 760px;
            margin: 0 auto;
        }

        /* =====================================
           MARCA
        ===================================== */

        .marca {
            display: block;
            margin-bottom: 35px;
        }

        .marca strong {
            display: block;
            color: var(--azul);
            font-size: clamp(38px, 4vw, 58px);
            font-weight: 800;
            line-height: 1;
            letter-spacing: -2px;
        }

        .marca strong span {
            color: var(--naranja);
        }

        .marca > span {
            display: block;
            margin-top: 14px;
            color: var(--texto-suave);
            font-size: 17px;
            line-height: 1.5;
        }

        /* =====================================
           CARRUSEL AUTOMÁTICO
        ===================================== */

        .carrusel-marcas {
            position: relative;
            width: 100%;
            height: 250px;
            display: flex;
            align-items: center;
            margin-bottom: 36px;
            overflow: hidden;
            border: 1px solid var(--borde);
            border-radius: 27px;
            background: rgba(255, 255, 255, 0.97);
            box-shadow: 0 22px 55px rgba(30, 55, 95, 0.09);
        }

        .carrusel-marcas::before,
        .carrusel-marcas::after {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            z-index: 5;
            width: 80px;
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
            animation: moverCarrusel 22s linear infinite;
            will-change: transform;
        }

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
            height: 115px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-marca img {
            display: block;
            max-width: 100%;
            max-height: 95px;
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
           INFORMACIÓN DEL CANDIDATO
        ===================================== */

        .etiqueta {
            display: inline-block;
            margin-bottom: 18px;
            padding: 8px 13px;
            border-radius: 999px;
            background: var(--azul-claro);
            color: var(--azul);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .presentacion h1 {
            max-width: 570px;
            color: var(--azul);
            font-size: clamp(36px, 5vw, 58px);
            line-height: 1.05;
            letter-spacing: -2px;
        }

        .presentacion h1 span {
            color: var(--naranja);
        }

        .presentacion p {
            max-width: 560px;
            margin-top: 20px;
            color: var(--texto-suave);
            font-size: 15px;
            line-height: 1.8;
        }

        /* =====================================
           BENEFICIOS
        ===================================== */

        .beneficios {
            display: grid;
            gap: 13px;
            margin-top: 30px;
        }

        .beneficio {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 15px;
            border: 1px solid var(--borde);
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.96);
            color: var(--azul-oscuro);
            font-size: 13px;
            box-shadow: 0 10px 25px rgba(30, 55, 95, 0.06);
        }

        .beneficio-icono {
            width: 34px;
            height: 34px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border-radius: 10px;
            background: var(--azul-claro);
            color: var(--azul);
            font-weight: 800;
        }

        /* =====================================
           PANEL DE ACCESO
        ===================================== */

        .acceso {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 45px 28px;
        }

        .tarjeta {
            width: min(430px, 100%);
            padding: 38px;
            border: 1px solid rgba(223, 230, 239, 0.95);
            border-radius: 26px;
            background: rgba(255, 255, 255, 0.97);
            box-shadow: 0 28px 70px rgba(26, 50, 83, 0.15);
            backdrop-filter: blur(12px);
        }

        .tarjeta-encabezado {
            margin-bottom: 28px;
        }

        .tarjeta-encabezado span {
            display: inline-block;
            padding: 8px 13px;
            border-radius: 999px;
            background: var(--azul-claro);
            color: var(--azul);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.8px;
        }

        .tarjeta-encabezado h2 {
            margin-top: 17px;
            color: var(--azul);
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
            color: var(--azul-oscuro);
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
            transition: 0.2s;
        }

        .entrada input:focus {
            border-color: var(--azul);
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




        .boton {
            width: 100%;
            margin-top: 7px;
            padding: 14px 18px;
            border: 0;
            border-radius: 12px;
            background: linear-gradient(
                135deg,
                var(--azul-oscuro),
                #1463e8
            );
            color: white;
            font-weight: 800;
            cursor: pointer;
            transition: 0.2s;
            box-shadow: 0 14px 25px rgba(8, 60, 168, 0.22);
        }

        .boton:hover {
            transform: translateY(-1px);
            box-shadow: 0 17px 28px rgba(8, 60, 168, 0.30);
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

        /* =====================================
           TABLET
        ===================================== */

        @media (max-width: 1050px) {
            .pagina {
                grid-template-columns: 1fr;
            }

            .presentacion {
                min-height: auto;
                padding: 45px 30px;
            }

            .presentacion-contenido {
                max-width: 800px;
            }

            .marca {
                text-align: center;
            }

            .acceso {
                padding: 20px 20px 45px;
            }

            .tarjeta {
                max-width: 600px;
            }
        }

        /* =====================================
           CELULAR
        ===================================== */

        @media (max-width: 650px) {
            .presentacion {
                padding: 35px 18px;
            }

            .marca {
                margin-bottom: 28px;
            }

            .marca strong {
                font-size: 39px;
                letter-spacing: -1.5px;
            }

            .marca > span {
                font-size: 14px;
            }

            .carrusel-marcas {
                height: 195px;
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
                height: 90px;
            }

            .logo-marca img {
                max-height: 74px;
            }

            .presentacion h1 {
                font-size: 35px;
            }

            .presentacion p {
                font-size: 13px;
            }

            .beneficios {
                display: none;
            }

            .acceso {
                padding: 10px 18px 35px;
            }

            .tarjeta {
                padding: 28px 22px;
                border-radius: 22px;
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

<div class="pagina">

    <!-- PANEL IZQUIERDO -->
    <section class="presentacion">

        <div class="presentacion-contenido">

            <!-- NOMBRE DEL SISTEMA -->
            <div class="marca">

                <strong>
                    SEFINSA <span>Evalúa</span>
                </strong>

                <span>
            
                </span>

            </div>

            <!-- CARRUSEL AUTOMÁTICO -->
            <div class="carrusel-marcas">

                <div class="carrusel-track">

                    <!-- PRIMER GRUPO -->
                    <div class="grupo-logos">

                        <div class="logo-marca">
                            <img
                                src="{{ asset('images/marcas/sefinsa.png') }}"
                                alt="SEFINSA"
                            >
                        </div>

                        <div class="logo-marca">
                            <img
                                src="{{ asset('images/marcas/procrese.png') }}"
                                alt="PROCRESE"
                            >
                        </div>

                        <div class="logo-marca">
                            <img
                                src="{{ asset('images/marcas/credigrup.png') }}"
                                alt="Credigrup"
                            >
                        </div>

                        <div class="logo-marca">
                            <img
                                src="{{ asset('images/marcas/grusef.png') }}"
                                alt="LanaMX"
                            >
                        </div>

                    </div>

                    <!-- COPIA PARA EL MOVIMIENTO CONTINUO -->
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
                                src="{{ asset('images/marcas/grusef.png') }}"
                                alt=""
                            >
                        </div>

                    </div>

                </div>

            </div>

            <!-- INFORMACIÓN ORIGINAL -->
            <span class="etiqueta">
                PORTAL DEL CANDIDATO
            </span>

            <h1>
                Tu proceso comienza
                <span>aquí.</span>
            </h1>

            <p>
                Accede con las credenciales proporcionadas por Recursos Humanos
                y completa las evaluaciones asignadas a tu proceso de selección.
            </p>

            <!-- BENEFICIOS ORIGINALES -->
            <div class="beneficios">

                <div class="beneficio">

                    <div class="beneficio-icono">
                        ✓
                    </div>

                    Acceso seguro mediante credenciales personales

                </div>

                <div class="beneficio">

                    <div class="beneficio-icono">
                        📝
                    </div>

                    Evaluaciones organizadas y fáciles de completar

                </div>

                <div class="beneficio">

                    <div class="beneficio-icono">
                        🔒
                    </div>

                    Información protegida durante todo el proceso

                </div>

            </div>

        </div>

    </section>

    <!-- PANEL DE ACCESO ORIGINAL -->
    <section class="acceso">

        <div class="tarjeta">

            <div class="tarjeta-encabezado">

                <span>
                    ACCESO PERSONAL
                </span>

                <h2>
                    Iniciar sesión
                </h2>

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

            <form
                method="POST"
                action="{{ route('candidato.autenticar') }}"
            >

                @csrf

                <div class="campo">

                    <label for="usuario">
                        Usuario
                    </label>

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

    <label for="password">
        Contraseña
    </label>

    <div class="entrada password-contenedor">

        <span>🔑</span>

        <input
            id="password"
            name="password"
            type="password"
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

                <button
                    type="submit"
                    class="boton"
                >
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
