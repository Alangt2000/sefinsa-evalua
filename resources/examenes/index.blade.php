<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Evaluaciones | SEFINSA</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    <style>
        :root {
            --sefinsa-primary: #123b68;
            --sefinsa-secondary: #1f6fa8;
            --sefinsa-accent: #2eb4a7;
            --sefinsa-background: #f2f6fa;
            --sefinsa-text: #172033;
            --sefinsa-muted: #6b7280;
            --sefinsa-border: #e5eaf0;
        }

        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            color: var(--sefinsa-text);
            background:
                radial-gradient(
                    circle at top left,
                    rgba(46, 180, 167, 0.14),
                    transparent 32%
                ),
                radial-gradient(
                    circle at top right,
                    rgba(31, 111, 168, 0.16),
                    transparent 30%
                ),
                var(--sefinsa-background);
            font-family:
                Inter,
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;
        }

        .topbar {
            background: rgba(255, 255, 255, 0.92);
            border-bottom: 1px solid rgba(229, 234, 240, 0.9);
            backdrop-filter: blur(14px);
        }

        .brand-symbol {
            width: 46px;
            height: 46px;
            display: grid;
            place-items: center;
            color: #ffffff;
            background: linear-gradient(
                135deg,
                var(--sefinsa-primary),
                var(--sefinsa-secondary)
            );
            border-radius: 14px;
            box-shadow: 0 10px 24px rgba(18, 59, 104, 0.2);
        }

        .brand-title {
            margin: 0;
            font-size: 1rem;
            font-weight: 800;
            letter-spacing: 0.04em;
        }

        .brand-subtitle {
            margin: 0;
            color: var(--sefinsa-muted);
            font-size: 0.75rem;
        }

        .main-container {
            width: min(1180px, calc(100% - 32px));
            margin: 0 auto;
            padding: 44px 0 70px;
        }

        .welcome-card {
            position: relative;
            overflow: hidden;
            padding: 38px;
            color: #ffffff;
            background:
                linear-gradient(
                    125deg,
                    var(--sefinsa-primary) 0%,
                    var(--sefinsa-secondary) 62%,
                    var(--sefinsa-accent) 145%
                );
            border-radius: 28px;
            box-shadow: 0 24px 60px rgba(18, 59, 104, 0.22);
        }

        .welcome-card::before {
            content: "";
            position: absolute;
            top: -90px;
            right: -60px;
            width: 260px;
            height: 260px;
            border: 44px solid rgba(255, 255, 255, 0.08);
            border-radius: 50%;
        }

        .welcome-card::after {
            content: "";
            position: absolute;
            right: 190px;
            bottom: -105px;
            width: 190px;
            height: 190px;
            background: rgba(255, 255, 255, 0.07);
            border-radius: 50%;
        }

        .welcome-content {
            position: relative;
            z-index: 2;
        }

        .welcome-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 13px;
            margin-bottom: 20px;
            color: rgba(255, 255, 255, 0.95);
            background: rgba(255, 255, 255, 0.14);
            border: 1px solid rgba(255, 255, 255, 0.16);
            border-radius: 999px;
            font-size: 0.82rem;
            font-weight: 700;
        }

        .welcome-title {
            max-width: 700px;
            margin: 0 0 12px;
            font-size: clamp(2rem, 5vw, 3.25rem);
            font-weight: 850;
            line-height: 1.06;
        }

        .welcome-description {
            max-width: 680px;
            margin: 0;
            color: rgba(255, 255, 255, 0.82);
            font-size: 1rem;
            line-height: 1.7;
        }

        .candidate-chip {
            display: inline-flex;
            align-items: center;
            gap: 11px;
            margin-top: 26px;
            padding: 10px 15px 10px 10px;
            background: rgba(255, 255, 255, 0.13);
            border: 1px solid rgba(255, 255, 255, 0.17);
            border-radius: 18px;
        }

        .candidate-avatar {
            width: 42px;
            height: 42px;
            display: grid;
            flex: 0 0 42px;
            place-items: center;
            color: var(--sefinsa-primary);
            background: #ffffff;
            border-radius: 13px;
            font-weight: 900;
        }

        .section-header {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 20px;
            margin: 42px 0 20px;
        }

        .section-title {
            margin: 0;
            font-size: 1.6rem;
            font-weight: 850;
        }

        .section-description {
            margin: 6px 0 0;
            color: var(--sefinsa-muted);
        }

        .progress-summary {
            padding: 9px 14px;
            color: var(--sefinsa-primary);
            background: #ffffff;
            border: 1px solid var(--sefinsa-border);
            border-radius: 999px;
            font-size: 0.82rem;
            font-weight: 750;
            box-shadow: 0 8px 22px rgba(23, 32, 51, 0.05);
        }

        .exam-card {
            height: 100%;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid var(--sefinsa-border);
            border-radius: 24px;
            box-shadow: 0 18px 46px rgba(23, 32, 51, 0.08);
            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease,
                border-color 0.25s ease;
        }

        .exam-card:hover {
            transform: translateY(-6px);
            border-color: rgba(31, 111, 168, 0.25);
            box-shadow: 0 26px 58px rgba(23, 32, 51, 0.13);
        }

        .exam-card-header {
            position: relative;
            min-height: 178px;
            padding: 27px;
            overflow: hidden;
        }

        .math-header {
            color: #ffffff;
            background: linear-gradient(135deg, #153e75, #2875b7);
        }

        .psycho-header {
            color: #ffffff;
            background: linear-gradient(135deg, #176961, #2eb4a7);
        }

        .exam-card-header::after {
            content: "";
            position: absolute;
            top: -42px;
            right: -35px;
            width: 150px;
            height: 150px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .exam-icon {
            position: relative;
            z-index: 2;
            width: 58px;
            height: 58px;
            display: grid;
            place-items: center;
            margin-bottom: 24px;
            background: rgba(255, 255, 255, 0.16);
            border: 1px solid rgba(255, 255, 255, 0.19);
            border-radius: 17px;
            font-size: 1.45rem;
        }

        .exam-tag {
            position: absolute;
            z-index: 3;
            top: 25px;
            right: 25px;
            padding: 7px 11px;
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 999px;
            font-size: 0.72rem;
            font-weight: 800;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        .exam-card-header h3 {
            position: relative;
            z-index: 2;
            margin: 0;
            font-size: 1.45rem;
            font-weight: 850;
        }

        .exam-card-body {
            padding: 27px;
        }

        .exam-description {
            min-height: 52px;
            margin: 0 0 22px;
            color: var(--sefinsa-muted);
            line-height: 1.65;
        }

        .exam-info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin-bottom: 24px;
        }

        .info-box {
            padding: 14px;
            background: #f7f9fc;
            border: 1px solid var(--sefinsa-border);
            border-radius: 16px;
        }

        .info-box span {
            display: block;
            margin-bottom: 4px;
            color: var(--sefinsa-muted);
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
        }

        .info-box strong {
            color: var(--sefinsa-text);
            font-size: 0.95rem;
        }

        .status-line {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 22px;
            font-size: 0.9rem;
            font-weight: 750;
        }

        .status-dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
        }

        .status-pending {
            color: #a16207;
        }

        .status-pending .status-dot {
            background: #f59e0b;
            box-shadow: 0 0 0 5px rgba(245, 158, 11, 0.13);
        }

        .status-progress {
            color: #1d4ed8;
        }

        .status-progress .status-dot {
            background: #3b82f6;
            box-shadow: 0 0 0 5px rgba(59, 130, 246, 0.13);
        }

        .status-finished {
            color: #15803d;
        }

        .status-finished .status-dot {
            background: #22c55e;
            box-shadow: 0 0 0 5px rgba(34, 197, 94, 0.13);
        }

        .status-unavailable {
            color: #6b7280;
        }

        .status-unavailable .status-dot {
            background: #9ca3af;
            box-shadow: 0 0 0 5px rgba(156, 163, 175, 0.13);
        }

        .btn-exam {
            width: 100%;
            padding: 13px 18px;
            color: #ffffff;
            background: linear-gradient(
                135deg,
                var(--sefinsa-primary),
                var(--sefinsa-secondary)
            );
            border: 0;
            border-radius: 15px;
            font-weight: 800;
            box-shadow: 0 12px 24px rgba(31, 111, 168, 0.18);
            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }

        .btn-exam:hover {
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 16px 28px rgba(31, 111, 168, 0.25);
        }

        .btn-disabled {
            width: 100%;
            padding: 13px 18px;
            color: #8b95a5;
            background: #edf1f5;
            border: 1px solid #e1e6ec;
            border-radius: 15px;
            font-weight: 800;
            cursor: not-allowed;
        }

        .instructions-card {
            margin-top: 28px;
            padding: 26px;
            background: rgba(255, 255, 255, 0.82);
            border: 1px solid var(--sefinsa-border);
            border-radius: 22px;
        }

        .instructions-card h4 {
            margin: 0 0 18px;
            font-size: 1.05rem;
            font-weight: 850;
        }

        .instruction-list {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
        }

        .instruction-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .instruction-number {
            width: 30px;
            height: 30px;
            display: grid;
            flex: 0 0 30px;
            place-items: center;
            color: var(--sefinsa-primary);
            background: rgba(31, 111, 168, 0.1);
            border-radius: 10px;
            font-size: 0.78rem;
            font-weight: 900;
        }

        .instruction-item p {
            margin: 0;
            color: var(--sefinsa-muted);
            font-size: 0.87rem;
            line-height: 1.55;
        }

        .alert-modern {
            margin-bottom: 24px;
            padding: 15px 18px;
            border: 0;
            border-radius: 16px;
            box-shadow: 0 12px 28px rgba(23, 32, 51, 0.08);
        }

        @media (max-width: 767px) {
            .main-container {
                width: min(100% - 22px, 1180px);
                padding-top: 24px;
            }

            .welcome-card {
                padding: 28px 23px;
                border-radius: 23px;
            }

            .welcome-title {
                font-size: 2rem;
            }

            .section-header {
                align-items: flex-start;
                flex-direction: column;
                margin-top: 32px;
            }

            .instruction-list {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<nav class="topbar">
    <div class="container py-3">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
                <div class="brand-symbol">
                    <i class="fa-solid fa-chart-line"></i>
                </div>

                <div>
                    <p class="brand-title">SEFINSA EVALÚA</p>
                    <p class="brand-subtitle">Plataforma de selección de personal</p>
                </div>
            </div>

            <a
                href="{{ route('candidatos.show', $candidato) }}"
                class="btn btn-sm btn-outline-secondary rounded-pill px-3"
            >
                <i class="fa-solid fa-arrow-left me-1"></i>
                Volver
            </a>
        </div>
    </div>
</nav>

<main class="main-container">

    @if (session('success'))
        <div class="alert alert-success alert-modern">
            <i class="fa-solid fa-circle-check me-2"></i>
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-modern">
            <i class="fa-solid fa-circle-exclamation me-2"></i>
            {{ session('error') }}
        </div>
    @endif

    <section class="welcome-card">
        <div class="welcome-content">
            <div class="welcome-label">
                <i class="fa-solid fa-sparkles"></i>
                Proceso de evaluación
            </div>

            <h1 class="welcome-title">
                Hola, {{ $candidato->nombre }}.
                Tu evaluación está lista.
            </h1>

            <p class="welcome-description">
                Completa cada módulo con calma y atención. Tus avances y
                resultados quedarán guardados automáticamente en tu expediente.
            </p>

            <div class="candidate-chip">
                <div class="candidate-avatar">
                    {{ strtoupper(substr($candidato->nombre, 0, 1)) }}
                </div>

                <div>
                    <div class="fw-bold">
                        {{ $candidato->nombre_completo }}
                    </div>

                    <small class="text-white-50">
                        {{ $candidato->puesto_solicitado }}
                    </small>
                </div>
            </div>
        </div>
    </section>

    <div class="section-header">
        <div>
            <h2 class="section-title">Evaluaciones disponibles</h2>

            <p class="section-description">
                Selecciona un módulo para comenzar o continuar.
            </p>
        </div>

        <div class="progress-summary">
            <i class="fa-solid fa-layer-group me-1"></i>
            2 módulos del proceso
        </div>
    </div>

    <div class="row g-4">

        {{-- Matemáticas --}}
        <div class="col-lg-6">
            <article class="exam-card">
                <div class="exam-card-header math-header">
                    <div class="exam-tag">
                        Disponible
                    </div>

                    <div class="exam-icon">
                        <i class="fa-solid fa-calculator"></i>
                    </div>

                    <h3>Evaluación de Matemáticas</h3>
                </div>

                <div class="exam-card-body">
                    <p class="exam-description">
                        Operaciones, porcentajes, problemas financieros,
                        proporciones, promedios y razonamiento matemático.
                    </p>

                    <div class="exam-info-grid">
                        <div class="info-box">
                            <span>Preguntas</span>
                            <strong>{{ $totalMatematicas }}</strong>
                        </div>

                        <div class="info-box">
                            <span>Tiempo sugerido</span>
                            <strong>25 minutos</strong>
                        </div>
                    </div>

                    @php
                        $estadoMatematicas =
                            $evaluacionMatematicas?->estado ?? 'pendiente';
                    @endphp

                    @if ($estadoMatematicas === 'finalizada')
                        <div class="status-line status-finished">
                            <span class="status-dot"></span>
                            Evaluación finalizada
                        </div>

                        <button class="btn-disabled" disabled>
                            <i class="fa-solid fa-check me-2"></i>
                            Completada
                        </button>
                    @elseif ($estadoMatematicas === 'en_proceso')
                        <div class="status-line status-progress">
                            <span class="status-dot"></span>
                            Evaluación en proceso
                        </div>

                        <form
                            action="{{ route('examenes.matematicas.iniciar', $candidato) }}"
                            method="POST"
                        >
                            @csrf

                            <button type="submit" class="btn btn-exam">
                                Continuar evaluación
                                <i class="fa-solid fa-arrow-right ms-2"></i>
                            </button>
                        </form>
                    @else
                        <div class="status-line status-pending">
                            <span class="status-dot"></span>
                            Pendiente por comenzar
                        </div>

                        <form
                            action="{{ route('examenes.matematicas.iniciar', $candidato) }}"
                            method="POST"
                        >
                            @csrf

                            <button type="submit" class="btn btn-exam">
                                Comenzar evaluación
                                <i class="fa-solid fa-arrow-right ms-2"></i>
                            </button>
                        </form>
                    @endif
                </div>
            </article>
        </div>

        {{-- Psicométrico --}}
        <div class="col-lg-6">
            <article class="exam-card">
                <div class="exam-card-header psycho-header">
                    <div class="exam-tag">
                        Próximamente
                    </div>

                    <div class="exam-icon">
                        <i class="fa-solid fa-brain"></i>
                    </div>

                    <h3>Evaluación Psicométrica</h3>
                </div>

                <div class="exam-card-body">
                    <p class="exam-description">
                        Razonamiento, atención, servicio al cliente, personalidad,
                        ética, inteligencia emocional y competencias comerciales.
                    </p>

                    <div class="exam-info-grid">
                        <div class="info-box">
                            <span>Reactivos cargados</span>
                            <strong>{{ $totalPsicometrico }}</strong>
                        </div>

                        <div class="info-box">
                            <span>Tiempo sugerido</span>
                            <strong>40–50 minutos</strong>
                        </div>
                    </div>

                    <div class="status-line status-unavailable">
                        <span class="status-dot"></span>
                        Preparando banco de preguntas
                    </div>

                    <button class="btn-disabled" disabled>
                        <i class="fa-solid fa-lock me-2"></i>
                        No disponible todavía
                    </button>
                </div>
            </article>
        </div>

    </div>

    <section class="instructions-card">
        <h4>
            <i class="fa-solid fa-circle-info me-2"></i>
            Antes de comenzar
        </h4>

        <div class="instruction-list">
            <div class="instruction-item">
                <div class="instruction-number">1</div>

                <p>
                    Busca un lugar tranquilo y evita cerrar la página mientras
                    realizas la evaluación.
                </p>
            </div>

            <div class="instruction-item">
                <div class="instruction-number">2</div>

                <p>
                    Lee cuidadosamente cada reactivo antes de seleccionar tu
                    respuesta.
                </p>
            </div>

            <div class="instruction-item">
                <div class="instruction-number">3</div>

                <p>
                    Al finalizar, las respuestas quedarán registradas y no podrán
                    modificarse.
                </p>
            </div>
        </div>
    </section>

</main>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>

</body>
</html>
