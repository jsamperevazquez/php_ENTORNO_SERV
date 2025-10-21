<?php
/**
 * Muestra la lista de tareas.
 */
include("utils.php");
$tareas = devolver_tareas();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD2. Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
                <div
                    class="d-flex align-items-start justify-content-between flex-wrap  flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

                    <h2>Lista Tareas</h2>
                </div>
                <div class="table">
                    <table class="table table-striped table-hover">
                        <thead class="thead">
                            <tr>
                                <th>Identificador</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (devolver_tareas() as $tarea): ?>
                                <tr>
                                    <td><?= $tarea['id'] ?></td>
                                    <td><?= htmlspecialchars($tarea['descripcion']) ?></td>
                                    <td><?= ucfirst($tarea['estado']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
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