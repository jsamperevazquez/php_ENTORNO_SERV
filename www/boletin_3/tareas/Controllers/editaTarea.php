<?php
include("data_controller.php");
require("tareas.controller.php");
/**
 * Controlador para editar la tarea pasando por filtro
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['origen'] ?? '') === 'editar_tarea') {
    $id = $_POST['id'] ?? null;
    if ($id) {
        $tarea = [
            'titulo' => htmlspecialchars(filtrar($_POST['titulo'], 0)),
            'descripcion' => htmlspecialchars(filtrar($_POST['descripcion'], 0)),
            'estado' => $_POST['estado'],
            'id_usuario' => $_POST['usuario']
        ];
        TareasController::update_task($id, $tarea);
    } else {
        die('❌ No se ha recibido el ID de la tarea.');
    }
}
