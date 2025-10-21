<?php
/**
 * Muestra la lista de tareas.
 */
include("utils.php");
$tareas = devolver_tareas();

?>

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
