<!DOCTYPE html>
<html lang="es">
<meta charset="UTF-8">
<title>Mostrar hola mundo</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
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
        padding: 5%;
        display: flex;
        justify-content: center;
        gap: 24px;
        font-size: 25px;

    }

    h1 {
        margin: 0 0 8px 0;
        font-size: 36px;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        letter-spacing: -0.2px;
        font-weight: 700;
        color: #10b981;
    }
</style>

<body>
    <h1>Esto es un HOLA MUNDO y un Bienvenido en php</h1>
    <div class="container">
        <?php
        $nombre = "Ángel Sampere";
        echo "<i>Hola, Mundo!</i>   Bienvenido<b>{$nombre}</b>";
            ?>

    </div>

</body>

</html>