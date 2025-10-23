<?php
/**
 * Muestra la lista de tareas.
 */
require("conexion.php");
include("utils.php");

/**
 * Consultamos y mostramos los datos de la tabla 'tareas'
 */

$sql = "SELECT * FROM tareas ORDER BY fecha_creacion DESC";
$stmt = $conexion->prepare($sql);
$stmt->execute();

// Guardamos los resultados en un array asociativo
$tareas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!--RENDERIZAMOS LOS DATOS EN HTML-->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD2. Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background: #007BFF;
            color: white;
        }

        tr:hover {
            background: #e9f3ff;
        }

        .btn-borrar {
            color: red;
            text-decoration: none;
        }
        .btn-modificar {
            color: green;
            text-decoration: none;
        }
    </style>

</head>

<body>
    <!--header-->
    <?php
    include("header.php");
    ?>
    <div class="container-fluid">

        <div class="row">
            <!--menu-->
            <?php
            include("menu.php");
            ?>
            <main class="col-md-8 ms-sm-auto px-md-4">
                <div>

                    <h2>📋 Lista de Tareas</h2>
                </div>
                <div class="table">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                        <?php foreach ($tareas as $tarea): ?>
                            <tr>
                                <td><?= $tarea['id'] ?></td>
                                <td><?= htmlspecialchars($tarea['titulo']) ?></td>
                                <td><?= htmlspecialchars($tarea['descripcion']) ?></td>
                                <td><?= $tarea['fecha_creacion'] ?></td>
                                <td><a class="btn-borrar" href="borrar_tarea.php?id=<?= $tarea['id'] ?>"
                                        onclick="return confirm('¿Seguro que quieres borrar esta tarea?')">
                                        🗑️ Borrar</a>
                                        <a class="btn-modificar" href="modificar_tarea.php?id=<?= $tarea['id'] ?>"
                                        onclick="return confirm('¿Seguro que quieres modificar esta tarea?')">
                                        <br/>✏️ Modificar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>

            </main>
        </div>
    </div>
    <!--footer-->
    <?php
    include("footer.php");
    ?>
</body>

</html>