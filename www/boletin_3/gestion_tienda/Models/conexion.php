<?php

/**
 * Clase para conectar a BDD MySQL
 */
class ConnectionMYSQLi
{
    // Declaramos una conexión vacía para controlar si estamos conectados
    private static $conexion = null;

    public static function conexionBD()
    {
        if (self::$conexion === null) {
            $user = "root";
            $pass = "test";
            $host = "db";
            $db = "tienda_online";

            // Conexión a la bd
            self::$conexion = new mysqli($host, $user, $pass, $db);

            // Si la base de datos no existe aún, la creamos y volvemos a conectar
            if (self::$conexion->connect_errno === 1049) { // Error no conoce la BD para solo crear una vez
                require_once "instalar.php";
                $tmp = new mysqli($host, $user, $pass);
                create_database($tmp);
                $tmp->close();

                // Conectamos a la base recién creada
                self::$conexion = new mysqli($host, $user, $pass, $db);
            }

            if (self::$conexion->connect_error) {
                die("Error de conexión: " . self::$conexion->connect_error);
            }
            // Aseguramos que se use utf8mb4 
            self::$conexion->set_charset("utf8mb4");
        }

        return self::$conexion;
    }
}
?>