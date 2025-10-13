<!DOCTYPE html>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays e Strings</title>
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

        }

        .container {
            width: 100%;
            max-width: 800px;
            display: flex;
            gap: 24px;
            margin-bottom: 20em;

        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 5px;
            text-align: center;
            border: 2px solid white
        }

        th {
            display: table-cell;
            width: 20%;
            color: lightyellow;
            font-size: 25px;
            border-bottom: 2px solid white;
            border-right: 2px solid white;
            background-color: grey;



        }

        td {
            width: 5%;
        }

        h1 {
            margin: 0 0 8px 0;
            font-size: 36px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            letter-spacing: -0.2px;
            font-weight: 700;
            color: #10b981;
        }



        @media (max-width:880px) {
            .container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <h1>Render datos de array php en tabla html</h1>
    <div class="container">
        <table>
            <tr>
                <th>Ciudad</th>
                <th>Pais</th>
                <th>Continente</th>
            </tr>
            <?php
            $informacion = "Tokyo,Japan,Asia;Mexico City,Mexico,North America;New York City,USA,North America;Mumbai,India,Asia;Seoul,Korea,Asia;
                            Shanghai,China,Asia;Lagos,Nigeria,Africa;Buenos Aires,Argentina,South America;Cairo,Egypt,Africa;London,UK,Europe";
            $array_informacion = explode(";", $informacion); //utilizo explode()para separar por caracter y crear array
            foreach ($array_informacion as $fila) {
                $fila = trim(($fila)); // con trim() quito espacios innecesarios
                $datos = explode(",", $fila); // vuelvo a separar para poder crear otro array con todos los datos separados
                echo "<tr>
                      <td>$datos[0]</td>
                      <td>$datos[1]</td>
                      <td>$datos[2]</td>  
                </tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>