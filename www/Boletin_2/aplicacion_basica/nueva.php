<?php
/**
 * Procesa el formulario de nueva tarea.
 */

include("utils.php");

$tarea = $_POST["tarea"] ?? "";
$estado = $_POST["estado"] ?? "pendiente";

if (guardar_tareas($tarea, $estado)) {
    echo "<div class='alert alert-success' style='text-align:center;'>Tarea guardada correctamente</div>";
    echo '<meta http-equiv="refresh" content="2;url=index.php">'; // Muestro el mensaje y despues de 2 segundos volvemos a index.php
} else {
    echo "<div class='alert alert-danger' style='text-align:center;'>Error: la descripción no es válida</div>";
    echo '<meta http-equiv="refresh" content="3;url=index.php">';
}
?>
