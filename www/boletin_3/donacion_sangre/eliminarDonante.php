<?php 
require_once("database.php");
$id = $_GET['id'] ?? '';
$conn = Database::getConn();
try {
    $sql ="DELETE FROM donantes WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
     // Redirigir a la página de visualización de datos después de insertar
    echo "<div class='alert alert-success' style='text-align:center;'>Donante eliminado correctamente</div>";
    echo '<meta http-equiv="refresh" content="2;url=index.php">'; // Muestro el mensaje y despues de 2 segundos volvemos a index.php
}catch (PDOException $e) {
     // Redirigir a la página de visualización de datos después de insertar
    echo "<div class='alert alert-danger' style='text-align:center;'>Error borrando donante " . $e->getMessage() . "</div>";
    echo '<meta http-equiv="refresh" content="10;url=index.php">'; // Muestro el mensaje y despues de 2 segundos volvemos a index.php
}