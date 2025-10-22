<?php
/**
 * conexion.php
 * 
 * 
 * 
 * Conexion a la base de datos
 * 
 */

$host = 'db';
$usuario = "root";
$pass = "test";
$db   = "practica_php";

try {
    $conexion = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $usuario, $pass);
    // Configurar el modo de error de PDO a excepción
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("❌ Error de conexión: " . $e->getMessage());
}   

?>
<?php
