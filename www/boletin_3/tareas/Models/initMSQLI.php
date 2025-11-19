<?php

/**
 * Clase de conexión MySQLi con inicialización automática de la base de datos.
 *
 * Esta clase implementa el patrón Singleton para asegurar que solo exista
 * una única instancia de conexión MySQLi durante toda la ejecución.
 *
 * Además:
 * - Crea la base de datos `tareas` si no existe.
 * - Crea las tablas `usuarios` y `tareas` en su primera ejecución.
 * - Devuelve una conexión MySQLi totalmente funcional.
 */
class ConnectionMYSQLi
{
    /**
     * Instancia única de la conexión MySQLi.
     *
     * @var mysqli|null
     */
    private static ?mysqli $conn = null;

    /**
     * Constructor privado para evitar instancias externas.
     */
    private function __construct() {}

    /**
     * Evita clonación externa del Singleton.
     */
    private function __clone() {}



    /**
     * Devuelve una conexión MySQLi lista para usar.
     *
     * Si la conexión no existe:
     * - Se conecta al servidor MySQL.
     * - Crea la base de datos `tareas` si no existe.
     * - Reconecta directamente a esa base de datos.
     * - Crea las tablas `usuarios` y `tareas` si no existen.
     *
     * @return mysqli Conexión activa a la base de datos.
     *
     * @throws Exception Si ocurre un error crítico en la conexión o creación de la BD.
     *
     * @example
     * $db = ConnectionMYSQLi::get_conn();
     * $result = $db->query("SELECT * FROM usuarios");
     */
    public static function get_conn(): mysqli
    {
        if (self::$conn === null) {

            $user     = "root";
            $password = "test";
            $host     = "db";
            $db_name  = "tareas";

            /* ------------------------------
             * 1. Conexión temporal al servidor
             * ------------------------------ */
            $tmp = new mysqli($host, $user, $password);

            if ($tmp->connect_error) {
                die("Error al conectarse al servidor MySQL: " . $tmp->connect_error);
            }

            /* ------------------------------
             * 2. Crear la base de datos si no existe
             * ------------------------------ */
            try {
                $sql_create_db = "CREATE DATABASE IF NOT EXISTS $db_name";

                if ($tmp->query($sql_create_db)) {
                    $tmp->select_db($db_name);
                } else {
                    echo "Error creando la base de datos: " . $tmp->error;
                }

            } catch (mysqli_sql_exception $e) {
                die("Error en la creación de la base de datos: " . $e->getMessage());
            } finally {
                $tmp->set_charset("utf8mb4");
                $tmp->close();
            }

            /* ------------------------------
             * 3. Conexión final a la base de datos
             * ------------------------------ */
            self::$conn = new mysqli($host, $user, $password, $db_name);

            if (self::$conn->connect_errno) {
                die("Error conectando a la base de datos: " . self::$conn->connect_error);
            }

            /* ------------------------------
             * 4. Crear tablas si no existen
             * ------------------------------ */
            try {
                $sql_create_table_users = "
                    CREATE TABLE IF NOT EXISTS usuarios (
                        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        username VARCHAR(50) NOT NULL,
                        nombre VARCHAR(50) NOT NULL,
                        apellidos VARCHAR(100) NOT NULL,
                        contrasena VARCHAR(100) NOT NULL
                    )";

                $sql_create_table_tareas = "
                    CREATE TABLE IF NOT EXISTS tareas (
                        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        titulo VARCHAR(50),
                        descripcion VARCHAR(250),
                        estado VARCHAR(50),
                        id_usuario INT(6)
                    )";

                if (
                    self::$conn->query($sql_create_table_users) &&
                    self::$conn->query($sql_create_table_tareas)
                ) {
                    echo "<div class='alert alert-success' style='text-align:center;'>Aplicación iniciada correctamente</div>";
                    echo '<meta http-equiv="refresh" content="2;url=http://localhost:8090/Boletin_3/tareas/home">';
                } else {
                    echo "Error creando las tablas: " . self::$conn->error;
                    header("Location: /Boletin_3/tareas/index.php");
                }

            } catch (mysqli_sql_exception $e) {
                die("Error creando las tablas: " . $e->getMessage());
            }
        }

        return self::$conn;
    }
}

?>
