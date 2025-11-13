<?php

class ConnectionPDO
{
    private static $conn = null;


    public static function get_connect()
    {
        if (self::$conn === null) {
            $host = 'db';
            $usuario = "root";
            $pass = "test";
            $db   = "tareas";

            try {
                self::$conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $usuario, $pass);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("❌ Error de conexión: " . $e->getMessage());
            }
        }
        return self::$conn;
    }
}
