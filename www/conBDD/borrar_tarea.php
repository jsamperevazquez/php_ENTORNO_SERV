<?php
require ("conexion.php");
/**
 * Borrar una tarea de la base de datos según su ID
 */
 if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Preparar y ejecutar la consulta de borrado
    $sql = "DELETE FROM tareas WHERE id = :id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam((":id"), $id, PDO::PARAM_INT);
    $stmt->execute();

    // Redirigir de vuelta a la página de visualización de datos
    header("Location: index.php");
    $conexion = null;
    exit();
 }else{
    // Si no se proporciona un ID, redirigir de vuelta
    echo "❌ No se recibió un ID válido.";
    header("Location: index.php");
 }
?>