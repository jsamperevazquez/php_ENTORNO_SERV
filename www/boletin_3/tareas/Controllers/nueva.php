<?php
include("data_controller.php");
require("tareas.controller.php");
/**
 * Controlador para nueva tarea
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['origen']) && $_POST['origen'] === 'nueva_tarea') {
    $tarea = [
        'titulo' => htmlspecialchars(filtrar($_POST['titulo'], 0)),
        'descripcion' => htmlspecialchars(filtrar($_POST['descripcion'], 0)),
        'estado' => $_POST['estado'],
        'id_usuario' => $_POST['usuario']
    ];
    TareasController::insert_task($tarea);
}
