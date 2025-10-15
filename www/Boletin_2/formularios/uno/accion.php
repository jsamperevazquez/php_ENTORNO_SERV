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

        .result-row {
            display: flex;
            justify-content: flex-start;
            padding: 8px 6px;
        }

        @media (max-width:880px) {
            .container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <main class="container" role="main">
        <div class="intro">
            <h1>Datos recogidos</h1>
            <div class="result-row">
                <?php
                $nombre = $_POST['nombre'];
                $apellidos = $_POST['apellido'];
                $posicion = stripos($apellidos, 'A');
                $numero_caracteres = preg_match_all('/[aA]/', $nombre); // con preg_m_a busca con una expresión regular los caracteres
                if ($posicion === false) { // strpos devuelve 0 si la posición es la primera, con lo que lo toma como false por eso el if
                    $posicion = "No está el caracter buscado";
                };
                echo'Nombre: '.$nombre.'<br/>'.'Apellidos: '.$apellidos.'<br/>'.'Nombre y Apellidos: '. $nombre.' '.$apellidos.'<br/>'
                .'Su nombre tiene '.strlen($nombre).' caracteres'.'<br/>'.'Los 3 primeros caracteres de tu nombre son: '. substr($nombre, 0, 3)
                .'<br/>'.'La letra A fue encontrada sus apellidos en la posición: '.$posicion.'<br/>'.'Su nombre contiene '. $numero_caracteres.' caracteres "a"'.'<br/>'
                .'Tu nombre en mayúsculas es '.strtoupper($nombre). '<br/>'.'Sus apellidos en minúscula son: '.strtolower($apellidos).'<br/>'
                .'Su nombre y apellidos en mayúscula son: '.strtoupper($nombre). ' '.strtoupper($apellidos). '<br/>'
                .'Tu nombre escrito del reves es: '.strrev($nombre) ;
                ?>
            </div>
        </div>
        <div>
            
        </div>
    </main>
</body>

</html>