<?php

class Database{

    private static $conn = null;

    public static function getConn(){
        if (self::$conn === null){
            $host = "db";
            $usuario = "root";
            $pass = "test";
            $db   = "donacion";

            try {
                // Conexion inicial a la BD
                self::$conn = new PDO(
                    "mysql:host=$host;
                     charset=utf8", 
                     $usuario, 
                     $pass
                        );
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                // Creo la base de datos si no existe
                self::$conn ->exec("CREATE DATABASE IF NOT EXISTS $db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

                // Conexion a la BD creada
                self::$conn = new PDO(
                    "mysql:host=$host;
                     dbname=$db;    
                    charset=utf8mb4",
                    $usuario,
                    $pass
                );
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Creo las tablas si no existen
                self::$conn -> exec("CREATE TABLE IF NOT EXISTS $db.donantes (
                    id INT(11) AUTO_INCREMENT PRIMARY KEY,
                    nombre VARCHAR(100) NOT NULL ,
                    apellidos VARCHAR(100) NOT NULL,
                    edad  INTEGER NULL,
                    grupo_sanguineo VARCHAR(3) NOT NULL,
                    codigo_postal INTEGER NOT NULL,
                    telefono_movil INTEGER NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

                self::$conn-> exec("CREATE TABLE IF NOT EXISTS $db.historico(
                    donante INTEGER NOT NULL,
                    fecha_donacion DATE NOT NULL,
                    fecha_proxima_donacion DATE NOT NULL,
                    FOREIGN KEY (donante) REFERENCES donantes(id) ON DELETE CASCADE
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

                self::$conn -> exec("CREATE TABLE IF NOT EXISTS $db.administradores(
                    nombre_usuario VARCHAR(50) NOT NULL PRIMARY KEY,
                    password VARCHAR(255) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

            }catch (PDOException $e){
                // Error al conectarnos a BD
                echo "Error de conexión: " . $e->getMessage();
            }
        }
        return self::$conn;
    }
}

