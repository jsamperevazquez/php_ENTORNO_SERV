<!DOCTYPE html>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <style>
        :root {
            --bg1: #0f172a;
            --bg2: #071230;
            --card: rgba(255, 255, 255, 0.06);
            --accent: linear-gradient(90deg, #7c3aed, #06b6d4);
            --glass: rgba(255, 255, 255, 0.04);
            --glass-2: rgba(255, 255, 255, 0.02);
            --text: #e6eef8;
            --muted: #9fb0c8;
            --success: #10b981;
            --danger: #ef4444;
        }

        * {
            box-sizing: border-box
        }

        html,
        body {
            height: 100%
        }

        body {
            margin: 0;
            font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;
            background: radial-gradient(circle at 10% 20%, rgba(124, 58, 237, 0.12), transparent 10%),
                radial-gradient(circle at 90% 80%, rgba(6, 182, 212, 0.08), transparent 12%),
                linear-gradient(180deg, var(--bg1), var(--bg2));
            color: var(--text);
            -webkit-font-smoothing: antialiased;
            display: grid;
            place-items: center;
            padding: 40px 20px;
        }

        .container {
            width: 100%;
            max-width: 760px;
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.02), rgba(255, 255, 255, 0.01));
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 18px;
            padding: 28px;
            box-shadow: 0 10px 30px rgba(2, 6, 23, 0.6);
            backdrop-filter: blur(8px) saturate(120%);
            display: grid;
            grid-template-columns: 1fr 420px;
            gap: 24px;
            align-items: center;
        }

        .intro {
            padding: 12px 6px;
        }

        h1 {
            margin: 0 0 8px 0;
            font-size: 26px;
            letter-spacing: -0.2px;
            font-weight: 700;
            color: greenyellow;
        }

        p.lead {
            margin: 0 0 18px 0;
            color: var(--muted);
            line-height: 1.45;
        }

        .badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            background: linear-gradient(90deg, rgba(124, 58, 237, 0.14), rgba(6, 182, 212, 0.08));
            color: var(--text);
            font-weight: 600;
            font-size: 13px;
            margin-bottom: 12px;
        }

        form.card {
            background: linear-gradient(180deg, var(--card), transparent);
            padding: 22px;
            border-radius: 14px;
            border: 1px solid rgba(255, 255, 255, 0.03);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.02);
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px
        }

        .input-row {
            display: flex;
            gap: 12px;
            align-items: center;
            margin-bottom: 16px
        }

        input[type="text"] {
            -moz-appearance: textfield;
            appearance: textfield;
        }

        input[type="text"]::-webkit-outer-spin-button,
        input[type="text"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .field {
            background: var(--glass);
            border: 1px solid rgba(255, 255, 255, 0.03);
            padding: 12px 14px;
            border-radius: 10px;
            color: var(--text);
            font-size: 16px;
            width: 100%;
            outline: none;
            transition: box-shadow .18s ease, transform .08s ease;
        }

        .field:focus {
            box-shadow: 0 6px 18px rgba(7, 20, 44, 0.6);
            transform: translateY(-1px);
        }



        .btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            border: 0;
            padding: 12px 18px;
            border-radius: 12px;
            font-weight: 700;
            background-image: var(--accent);
            color: white;
            font-size: 15px;
            box-shadow: 0 6px 20px rgba(12, 10, 20, 0.45);
            transition: transform .14s ease, box-shadow .14s ease;
        }

        .btn:active {
            transform: translateY(1px)
        }

        .btn:hover {
            box-shadow: 0 10px 30px rgba(7, 12, 30, 0.55);
        }

        .btn .spark {
            display: inline-block;
            width: 12px;
            height: 12px;
            border-radius: 4px;
            background: rgba(255, 255, 255, 0.18);
            backdrop-filter: blur(2px);
        }

        .results {
            margin-top: 12px;
            padding: 12px;
            border-radius: 10px;
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.02), rgba(255, 255, 255, 0.01));
            border: 1px solid rgba(255, 255, 255, 0.03);
        }

        .result-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 6px;
            border-radius: 8px
        }

        .small {
            font-size: 13px;
            color: var(--muted)
        }

        .big {
            font-size: 18px;
            font-weight: 700
        }

        @media (max-width:880px) {
            .container {
                grid-template-columns: 1fr;
            }
        }

        footer {
            margin-top: 14px;
            color: var(--muted);
            font-size: 13px
        }

        .hint {
            margin-top: 8px;
            color: var(--muted);
            font-size: 13px
        }

        .error {
            color: var(--danger);
            font-weight: 700
        }

        .ok {
            color: var(--success);
            font-weight: 700
        }
    </style>
    <title>Formulario php</title>
</head>

<body>
    <main class="container" role="main">
        <div class="intro">
            <span class="badge">Recoger datos de formulario</span>
            <h1>Datos personales</h1>
            <p class="lead">Introduce tu nombre y apellidos</p>
            <div class="hint">Sugerencia: datos requeridos.</div>
        </div>
        <div>
            <form class="card" action="accion.php" method="post" aria-labelledby="formTitle">
                <div>
                    <label for="nombre">Nombre:</label>
                    <div class="input-row">
                        <input name="nombre" id="nombre" class="field" type="text" step="any" placeholder="Introduce nombre" required>
                    </div>
                    <label for="apellido">Apellidos:</label>
                    <div class="input-row">
                        <input name="apellido" id="apellido" class="field" type="text" step="any" placeholder="Introduce aplellidos"
                            required>
                    </div>
                    <div style="margin-top:12px;display:flex;gap:10px;align-items:center;">
                        <button id="recoger" class="btn" type="submit" ">
                            <span class="spark" aria-hidden="true"></span>
                            <span>Enviar</span>
                        </button>
                    </div>
                        <div class="result-row" id="resultados">
                            <div class="small"></div>
                            <div class="big"></div>
                        </div>
                    </div>
            </form>
        </div>
    </main>
</body>

</html>