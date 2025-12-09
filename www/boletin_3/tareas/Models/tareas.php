<?php
require_once("conexionMYSQLI.php");
require_once("conexionPDO.php");

/**
 * Clase Tareas
 *
 * Proporciona métodos estáticos para gestionar operaciones CRUD
 * sobre la tabla de tareas, usando conexiones MySQLi y PDO.
 */
class Tareas
{
    /**
     * Obtiene todas las tareas de una tabla.
     *
     * @param string $tabla Nombre de la tabla desde donde se consultarán las tareas.
     * @return array Arreglo de tareas como arrays asociativos. Retorna arreglo vacío si falla.
     */
    public static function show_all_task($tabla)
    {
        $conn = conexionMYSQLI::get_mysqli_connection();
        $sql_select = "SELECT * FROM $tabla";
        $resultados = $conn->query($sql_select);

        if (!$resultados) { // Verificar si la consulta fue exitosa
            error_log("Error en consulta: " . $conn->error);
            return [];
        }

        $tareas = $resultados->fetch_all(MYSQLI_ASSOC); // Obtener todas las filas como arrays asociativos

        $resultados->free(); // Liberar el conjunto de resultados

        return $tareas;
    }

    /**
     * Obtiene todas las tareas pertenecientes a un usuario específico.
     *
     * @param string $tabla Nombre de la tabla.
     * @param int    $id_user ID del usuario.
     * @return array Lista de tareas como arrays asociativos. Retorna vacío si no hay resultados.
     */
    public static function show_all_task_user($tabla, $id_user)
    {
        $conn = ConnectionPDO::get_connect();
        $sql_select = "SELECT * FROM $tabla WHERE id_usuario = :id";
        $stmt = $conn->prepare($sql_select);
        $stmt->execute([":id" => $id_user]);

        $tareas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $tareas ?: []; // Retorna arreglo vacío si no hay resultados
    }

    /**
     * Inserta una nueva tarea en la base de datos.
     *
     * @param array $data Datos de la tarea. Debe contener:
     *                    - titulo (string)
     *                    - descripcion (string)
     *                    - estado (string)
     *                    - id_usuario (int)
     *
     * @return void
     */
    public static function insert_task($data)
    {
        $sql_insert = "INSERT INTO tareas (titulo, descripcion, estado, id_usuario) VALUES (?, ?, ?, ?)";
        $conn = conexionMYSQLI::get_mysqli_connection();
        $stmt = $conn->prepare($sql_insert);

        if (!$stmt) {
            die("Error preparando la consulta: " . $conn->error);
        }

        $stmt->bind_param(
            "sssi",
            $data['titulo'],
            $data['descripcion'],
            $data['estado'],
            $data['id_usuario']
        );

        $ok = $stmt->execute();
        if (!$ok) {
            die("Error ejecutando INSERT: " . $stmt->error);
        }

        $stmt->close();
    }

    /**
     * Obtiene una tarea por su ID.
     *
     * @param int $id ID de la tarea.
     * @return array|null Retorna la tarea como array asociativo o null si no existe.
     */
    public static function get_task_id($id)
    {
        $sql_select = "SELECT * FROM tareas WHERE id = ?";
        $conn = conexionMYSQLI::get_mysqli_connection();
        $stmt = $conn->prepare($sql_select);

        if (!$stmt) {
            die("Error preparando consulta: " . $conn->error);
        }

        $stmt->bind_param("i", $id);

        if (!$stmt->execute()) {
            die("Error ejecutando consulta: " . $stmt->error);
        }

        $result = $stmt->get_result();
        $tarea = $result->fetch_assoc();

        $stmt->close();

        return $tarea ?: null;
    }

    /**
     * Actualiza una tarea existente.
     *
     * @param int   $id ID de la tarea a actualizar.
     * @param array $data Datos a actualizar. Debe contener:
     *                    - titulo (string)
     *                    - descripcion (string)
     *                    - estado (string)
     *                    - id_usuario (int)
     *
     * @return void
     */
    public static function update_task($id, $data)
    {
        $sql_update = "UPDATE tareas SET titulo = ?, descripcion = ?, estado = ?, id_usuario = ? WHERE id = ?";
        $conn = conexionMYSQLI::get_mysqli_connection();
        $stmt = $conn->prepare($sql_update);

        if (!$stmt) {
            die("Error preparando la consulta: " . $conn->error);
        }

        $stmt->bind_param(
            "sssii",
            $data['titulo'],
            $data['descripcion'],
            $data['estado'],
            $data['id_usuario'],
            $id
        );

        $stmt->execute();
        $stmt->close();
    }

    /**
     * Elimina una tarea por su ID.
     *
     * @param int $id ID de la tarea a eliminar.
     * @return void
     */
    public static function delete_task($id)
    {
        $sql_delete = "DELETE FROM tareas WHERE id = ?";
        $conn = conexionMYSQLI::get_mysqli_connection();
        $stmt = $conn->prepare($sql_delete);

        if (!$stmt) {
            die("Error preparando la consulta: " . $conn->error);
        }

        $stmt->bind_param("i", $id);

        if (!$stmt->execute()) {
            die("Error ejecutando consulta: " . $stmt->error);
        }

        $stmt->close();
    }
}
