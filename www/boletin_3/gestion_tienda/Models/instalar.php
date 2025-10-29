<?php

/**
 * Función para crear la base de datos tienda_online si no existe
 * @param mixed $conexion //conexion a la base de datos
 * @return void
 */
function create_database($conexion)
{
    try {
        $sql_create_db = "CREATE DATABASE IF NOT EXISTS tienda_online";

        if ($conexion->query($sql_create_db) === TRUE) {
            $conexion->select_db("tienda_online");
        } else {
            echo "Error creando base de datos: " . $conexion->error . "<br>";
        }
    } catch (mysqli_sql_exception $e) {
        $error = $conexion->connect_errno;
        die("Error en la creación de la base de datos: " . $conexion->connect_error . " con el número: " . $error . "<br>");

    }
}
/**
 * Función para crear la tabla de la bd
 * @param mixed $conexion conexión a la bd
 * @return void
 */
function create_table($conexion)
{
    $sql_create_table = "CREATE TABLE IF NOT EXISTS usuarios (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(30) NOT NULL,
        apellidos VARCHAR(100) NOT NULL,
        edad INT(3) NOT NULL,
        provincia VARCHAR(50) NOT NULL
    )";
    try {
        if ($conexion->query($sql_create_table) === false) {
            echo "Error creando tabla: " . $conexion->error . "<br>";
            header("Location: /Boletin_3/gestion_tienda/index.php");
        }

    } catch (mysqli_sql_exception $e) {
        $error = $conexion->connect_errno;
        die("Error en la creación de la tabla: " . $conexion->connect_error . " con el número: " . $error . "<br>");

    }
}

?>