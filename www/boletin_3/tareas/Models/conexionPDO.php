<?php

/**
 * Clase de conexión PDO usando el patrón Singleton.
 *
 * Esta clase crea y mantiene una única instancia de conexión PDO
 * que puede usarse en toda la aplicación. Si ya existe la conexión,
 * simplemente la devuelve.
 */
class ConnectionPDO
{
    /**
     * Instancia única de la conexión PDO.
     *
     * @var PDO|null
     */
    private static ?PDO $conn = null;

     // Evita instanciación directa
    private function __construct() {}

    // Evita clonación
    private function __clone() {}

     


    /**
     * Obtiene una conexión PDO activa.
     *
     * Si la conexión no existe, se crea.  
     * Configura el modo de errores en excepciones.
     *
     * @return PDO Conexión PDO lista para ejecutar consultas.
     *
     * @throws PDOException Si ocurre un error al conectar con MySQL.
     *
     * @example
     * $db = ConnectionPDO::get_connect();
     * $stmt = $db->query("SELECT * FROM tareas");
     * $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
     */
    public static function get_connect(): PDO
    {
        if (self::$conn === null) {

            $host = 'db';
            $usuario = "root";
            $pass = "test";
            $db   = "tareas";

            try {
                self::$conn = new PDO(
                    "mysql:host=$host;dbname=$db;charset=utf8",
                    $usuario,
                    $pass
                );

                // Activar modo estricto de errores
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e) {
                die("❌ Error de conexión: " . $e->getMessage());
            }
        }

        return self::$conn;
    }
}

?>
