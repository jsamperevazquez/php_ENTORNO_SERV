<?php
/**
 * Procesa el formulario de nueva tarea.
 */
include("conexion.php");
include("utils.php");

$origen = $_POST['origen'] ?? '';

if ($origen === 'nueva_tarea') {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $titulo = ucfirst($_POST["titulo"]);
        $descripcion = ucfirst($_POST["descripcion"]);

        if (comprobar_info($titulo) && comprobar_info($descripcion)) {
            // Preparar y ejecutar la consulta de inserción
            $sql = "INSERT INTO tareas (titulo, descripcion, fecha_creacion) VALUES (:titulo, :descripcion, NOW())";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(":titulo", $titulo);
            $stmt->bindParam(":descripcion", $descripcion);
            $stmt->execute();

            // Redirigir a la página de visualización de datos después de insertar
            echo "<div class='alert alert-success' style='text-align:center;'>Tarea guardada correctamente</div>";
            echo '<meta http-equiv="refresh" content="2;url=index.php">'; // Muestro el mensaje y despues de 2 segundos volvemos a index.php
        } else {
            echo "<div class='alert alert-danger' style='text-align:center;'>Error: Datos no válidos</div>";
            echo '<meta http-equiv="refresh" content="3;url=index.php">';
        }
    } else {
        echo "❌ No se recibió un ID válido.";
        header("Location: index.php");
    }
} else if ($origen === 'modificar_tarea') {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $titulo = ucfirst($_POST["titulo"]);
        $descripcion = ucfirst($_POST["descripcion"]);

        if (comprobar_info($titulo) && comprobar_info($descripcion)) {
            $sql = "UPDATE tareas SET titulo = :titulo, descripcion = :descripcion WHERE id = :id";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam((":titulo"), $titulo, PDO::PARAM_STR);
            $stmt->bindParam((":descripcion"), $descripcion, PDO::PARAM_STR);
            $stmt->bindParam((":id"), $id, PDO::PARAM_INT);
            $stmt->execute();
            echo "<div class='alert alert-success' style='text-align:center;'>Tarea modificada correctamente</div>";
            echo '<meta http-equiv="refresh" content="2;url=index.php">'; // Muestro el mensaje y despues de 2 segundos volvemos a index.php
        } else {
            echo "<div class='alert alert-danger' style='text-align:center;'>Error: Datos no válidos</div>";
            echo '<meta http-equiv="refresh" content="3;url=index.php">';
        }

    } else {
        echo "❌ No se recibió un ID válido.";
        header("Location: index.php");
    }
}
?>