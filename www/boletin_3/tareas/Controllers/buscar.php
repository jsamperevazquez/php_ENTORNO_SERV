<?php
/**
 * Controlador para busqueda de la tareas de cada usuario
 * Manda las tareas a filtrar con el id del usuario
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST' 
    && isset($_POST['origen']) 
    && $_POST['origen'] === 'buscar_tarea') {

    $id_usuario = $_POST['usuario'];

    header("Location: ../index.php?Pages=tareas_filtradas&user=".$id_usuario);
    exit;
}
?>