<?php

class conexionMYSQLI{

    private static $conn = null;

    public static function get_mysqli_connection(){
        if (self::$conn === null){
            $host = 'db';
            $usuario = "root";
            $pass = "test";
            $db   = "tareas";

            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            try{
                self::$conn = new mysqli($host, $usuario, $pass, $db);
                self::$conn->set_charset("utf8mb4");
            }catch (mysqli_sql_exception $e){
                throw new Exception("❌ Error MySQLi: " . $e->getMessage());
            }

        } 
        return self::$conn;
    }
}
?>