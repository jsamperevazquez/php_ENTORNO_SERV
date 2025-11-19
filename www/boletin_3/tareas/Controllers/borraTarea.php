<?php
require __DIR__ . "tareas.controller.php";
/**
 * @var mixed Id de la tarea a borrar ?? si no nulo
 */
$id = $_GET['id'] ?? null;
if ($id !== null) {
    TareasController::delete_task($id);
} else {
    die('❌ No se ha recibido el ID de la tarea');
}
