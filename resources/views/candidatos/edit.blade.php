<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar candidato | SEFINSA Evalúa</title>

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
            --fondo: #f4f7fb;
            --texto: #172033;
            --texto-suave: #718096;
            --borde: #e4eaf2;
            --rojo: #b91c1c;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: "Inter", sans-serif;
            background: var(--fondo);
            color: var(--texto);
        }

        .barra {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 20px 35px;
            background: var(--azul-oscuro);
            color: white;
        }

        .barra h1 {
            margin: 0;
            font-size: 20px;
        }

        .barra p {
            margin: 5px 0 0;
            color: #bfd0e5;
            font-size: 11px;
        }

        .boton-regresar {
            padding: 11px 16px;
            border: 1px solid rgba(255,255,255,.25);
            border-radius: 11px;
            color: white;
            font-size: 11px;
            font-weight: 700;
            text-decoration: none;
        }

        main {
            max-width: 850px;
            margin: auto;
            padding: 35px 20px;
        }

        .panel {
            overflow: hidden;
            border: 1px solid var(--borde);
            border-radius: 21px;
            background: white;
            box-shadow: 0 15px 40px rgba(29,51,84,.08);
        }

        .encabezado {
            padding: 25px 28px;
            border-bottom: 1px solid var(--borde);
            background: linear-gradient(135deg, #173b68, #2563a9);
            color: white;
        }

        .encabezado h2 {
            margin: 0;
            font-size: 21px;
        }

        .encabezado p {
            margin: 7px 0 0;
            color: #d8e4f2;
            font-size: 11px;
        }

        .alerta-error {
            margin: 24px 28px 0;
            padding: 14px 16px;
            border: 1px solid #fecaca;
            border-radius: 12px;
            background: #fef2f2;
            color: var(--rojo);
            font-size: 11px;
            line-height: 1.6;
        }

        form {
            padding: 28px;
        }

        .rejilla {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 19px;
        }

        .campo-completo {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 11px;
            font-weight: 700;
        }

        input {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid var(--borde);
            border-radius: 11px;
            font: inherit;
            outline: none;
        }

        input:focus {
            border-color: var(--azul);
            box-shadow: 0 0 0 3px rgba(37,99,235,.10);
        }

        .acciones {
            display: flex;
            justify-content: flex-end;
            gap: 11px;
            margin-top: 26px;
        }

        .boton-cancelar,
        .boton-guardar {
            padding: 12px 18px;
            border-radius: 11px;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
        }

        .boton-cancelar {
            border: 1px solid var(--borde);
            background: white;
            color: var(--texto);
        }

        .boton-guardar {
            border: 0;
            background: var(--azul);
            color: white;
        }

        @media (max-width: 650px) {
            .barra {
                padding: 18px 20px;
            }

            main {
                padding: 22px 14px;
            }

            .rejilla {
                grid-template-columns: 1fr;
            }

            .campo-completo {
                grid-column: auto;
            }

            form {
                padding: 22px;
            }

            .encabezado {
                padding: 23px 22px;
            }
        }
    </style>
</head>

<body>

<header class="barra">
    <div>
        <h1>Editar candidato</h1>
        <p>Actualiza los datos registrados por Recursos Humanos.</p>
    </div>

    <a
        href="{{ route('candidatos.show', $candidato) }}"
        class="boton-regresar"
    >
        ← Regresar
    </a>
</header>

<main>

    <section class="panel">

        <div class="encabezado">
            <h2>{{ $candidato->nombre_completo }}</h2>
            <p>Usuario asignado: {{ $candidato->usuario }}</p>
        </div>

        @if ($errors->any())
            <div class="alerta-error">
                <strong>No se pudieron guardar los cambios.</strong><br>
                {{ $errors->first() }}
            </div>
        @endif

        <form
            method="POST"
            action="{{ route('candidatos.update', $candidato) }}"
        >
            @csrf
            @method('PUT')

            <div class="rejilla">

                <div>
                    <label for="nombre">Nombre(s) *</label>

                    <input
                        id="nombre"
                        name="nombre"
                        type="text"
                        value="{{ old('nombre', $candidato->nombre) }}"
                        required
                    >
                </div>

                <div>
                    <label for="apellido_paterno">Apellido paterno *</label>

                    <input
                        id="apellido_paterno"
                        name="apellido_paterno"
                        type="text"
                        value="{{ old('apellido_paterno', $candidato->apellido_paterno) }}"
                        required
                    >
                </div>

                <div>
                    <label for="apellido_materno">Apellido materno</label>

                    <input
                        id="apellido_materno"
                        name="apellido_materno"
                        type="text"
                        value="{{ old('apellido_materno', $candidato->apellido_materno) }}"
                    >
                </div>

                <div>
                    <label for="telefono">Teléfono</label>

                    <input
                        id="telefono"
                        name="telefono"
                        type="text"
                        value="{{ old('telefono', $candidato->telefono) }}"
                    >
                </div>

                <div class="campo-completo">
                    <label for="correo">Correo electrónico</label>

                    <input
                        id="correo"
                        name="correo"
                        type="email"
                        value="{{ old('correo', $candidato->correo) }}"
                    >
                </div>

                <div class="campo-completo">
                    <label for="puesto_solicitado">Puesto solicitado *</label>

                    <input
                        id="puesto_solicitado"
                        name="puesto_solicitado"
                        type="text"
                        value="{{ old('puesto_solicitado', $candidato->puesto_solicitado) }}"
                        required
                    >
                </div>

            </div>

            <div class="acciones">
                <a
                    href="{{ route('candidatos.show', $candidato) }}"
                    class="boton-cancelar"
                >
                    Cancelar
                </a>

                <button type="submit" class="boton-guardar">
                    Guardar cambios
                </button>
            </div>

        </form>

    </section>

</main>

</body>
</html>
