<?php
include_once("database.php");


$id = $_GET['id'] ?? '';

$con = Database::getConn();
try{
    $sql = "INSERT INTO historico (donante, fecha_donacion, fecha_proxima_donacion) VALUES (:donante, NOW(), NOW() + INTERVAL 4 MONTH)";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':donante', $id, PDO::PARAM_INT);
    $stmt->execute();
    
    // Redirigir a la página de visualización de datos después de insertar
    echo "<div class='alert alert-success' style='text-align:center;'>Donacion guardada correctamente</div>";
    echo '<meta http-equiv="refresh" content="2;url=index.php">'; // Muestro el mensaje y despues de 2 segundos volvemos a index.php
} catch (PDOException $e) {
    echo "<div class='alert alert-danger' style='text-align:center;>Error al registrar la donación: " . $e->getMessage() . "</div>";
    echo "<meta http-equiv='refresh' content=3; url=index.php";
}

