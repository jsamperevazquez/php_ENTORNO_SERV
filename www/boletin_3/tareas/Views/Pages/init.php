<?php

class Connection
{

    private static $conn = null;

    public static function get_conn()
    {
        if (self::$conn === null) {
            $user = "root";
            $password = "test";
            $host = "db";
            $db_name = "tareas";


            $tmp = new mysqli($host, $user, $password);
            
            if ($tmp->connect_error) {
                die("Error al conectarse a la bd: ". $tmp->error . " con número: " . $tmp->connect_error);
            }
            try {
                    $sql_create_db = "CREATE DATABASE IF NOT EXISTS tareas";
                    if ($tmp->query($sql_create_db) === true) {
                        $tmp->select_db($db_name);
                    } else {
                        echo "Error creando la base de datos: " . $tmp->error . "<br>";
                    }
                } catch (mysqli_sql_exception $e) {
                    $error = $tmp->connect_errno;
                    die("Error en la creación de la basde de datos: " . $e . " con nº: " . $error);
                }finally{
                        $tmp->set_charset("utf8mb4");
                        $tmp->close();
                }

            // Conexión a la bd
            self::$conn = new mysqli($host, $user, $password, $db_name);
            
            if (self::$conn->connect_errno) {
                    die("Error en la conexión a la base de datos:" . self::$conn->connect_error . " con número:" . self::$conn->connect_errno);
                }
                               
            try {
                $sql_create_table_users = "CREATE TABLE IF NOT EXISTS usuarios (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(50) NOT NULL,
                nombre VARCHAR(50) NOT NULL,
                apellidos VARCHAR(100) NOT NULL,
                contrasena VARCHAR(100) NOT NULL 
            )";
                $sql_create_table_tareas = "CREATE TABLE IF NOT EXISTS tareas (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                titulo VARCHAR(50),
                descripcion VARCHAR(250),
                estado VARCHAR(50),
                id_usuario INT(6)
            )";
                    if (self::$conn->query($sql_create_table_users) === true && self::$conn->query($sql_create_table_tareas) === true) {
                        header("Location: /Boletin_3/tareas/index.php");
                    } else {
                        echo "Error creando la tabla: " . self::$conn->error . "<br>";
                        header("Location: /Boletin_3/tareas/index.php");
                    }
                   
                } catch (mysqli_sql_exception $e) {
                    $error = self::$conn->connect_errno;
                    die("Error creando la tabla: " . $e . "con número: " . $error);
                }
            }   
                //Cerramos conexion
                self::$conn->close();

                return self::$conn;
        }
    }

$conexion = new Connection();
$conexion->get_conn();