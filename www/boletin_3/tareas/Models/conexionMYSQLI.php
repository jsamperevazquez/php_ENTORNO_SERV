<?php

/**
 * Clase de conexión MySQLi usando el patrón Singleton.
 *
 * Esta clase gestiona una única conexión MySQLi reutilizable en toda la aplicación.
 * Al llamar a `get_mysqli_connection()` siempre se devolverá la misma instancia.
 */
class conexionMYSQLI {

    /**
     * Instancia única de la conexión MySQLi.
     *
     * @var mysqli|null
     */
    private static ?mysqli $conn = null;


     // Evita instanciación directa
    private function __construct() {}

    // Evita clonación
    private function __clone() {}

    

    /**
     * Obtiene la conexión MySQLi.
     *
     * Si no existe una conexión previa, crea una nueva.  
     * Configura el charset en UTF8MB4 y habilita el modo estricto de errores.
     *
     * @return mysqli Conexión activa MySQLi.
     *
     * @throws Exception Si ocurre un error al conectar con MySQL.
     *
     * @example
     * $db = conexionMYSQLI::get_mysqli_connection();
     * $result = $db->query("SELECT * FROM usuarios");
     */
    public static function get_mysqli_connection(): mysqli {
        if (self::$conn === null) {

            $host    = 'db';
            $usuario = "root";
            $pass    = "test";
            $db      = "tareas";

            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

            try {
                self::$conn = new mysqli($host, $usuario, $pass, $db);
                self::$conn->set_charset("utf8mb4");
            } catch (mysqli_sql_exception $e) {
                throw new Exception("❌ Error MySQLi: " . $e->getMessage());
            }
        }

        return self::$conn;
    }

    /**
     * Verifica si la base de datos está correctamente preparada.
     *
     * Concretamente, comprueba si existe la tabla `usuarios`.  
     * Devuelve `true` si la tabla existe, `false` si algo falla o no está creada.
     *
     * @return bool `true` si la base de datos está lista; `false` si no.
     *
     * @example
     * if (!conexionMYSQLI::db_ready()) {
     *     echo "La base de datos no está lista.";
     * }
     */
    public static function db_ready(): bool {
        try {
            $conn = self::get_mysqli_connection();
            $check = $conn->query("SHOW TABLES LIKE 'usuarios'");
            return ($check && $check->num_rows > 0);
        } catch (Exception $e) {
            return false;
        }
    }
}

