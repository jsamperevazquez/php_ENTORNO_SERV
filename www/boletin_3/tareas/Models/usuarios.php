<?php
require_once("conexionPDO.php");
require_once("conexionMYSQLI.php");

/**
 * Clase Users
 *
 * Proporciona métodos estáticos para gestionar usuarios
 * y realizar operaciones CRUD sobre la tabla `usuarios`.
 */
class Users
{
    /**
     * Obtiene todos los usuarios de una tabla.
     *
     * @param string $tabla Nombre de la tabla desde donde se consultarán los usuarios.
     * @return array Lista de usuarios como arrays asociativos. Devuelve arreglo vacío si no hay registros o ocurre error.
     */
    public static function show_all_usuarios($tabla) {
        $conn = ConnectionPDO::get_connect();
        $sql_select = "SELECT * FROM $tabla";
        $stmt = $conn->prepare($sql_select);
        $stmt->execute();

        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$usuarios) {
            error_log("Error en la consulta: " . $stmt->errorCode());
            return [];
        }

        return $usuarios ?: [];
    }

    /**
     * Inserta un nuevo usuario en la base de datos.
     *
     * @param array $data Datos del usuario. Debe contener:
     *                    - username (string)
     *                    - nombre (string)
     *                    - apellidos (string)
     *                    - password (string) Contraseña ya procesada (encriptada o texto plano).
     *
     * @return void
     *
     * @throws Exception Si ocurre algún error al ejecutar el INSERT.
     */
    public static function insert_users($data)
    {
        try {
            $sql_insert = "INSERT INTO usuarios (username, nombre, apellidos, contrasena) 
                           VALUES (:username, :nombre, :apellidos, :password)";
            
            $conn = ConnectionPDO::get_connect();
            $stmt = $conn->prepare($sql_insert);

            // Binding de parámetros
            $stmt->bindParam(':username', $data['username']);
            $stmt->bindParam(':nombre', $data['nombre']);
            $stmt->bindParam(':apellidos', $data['apellidos']);
            $stmt->bindParam(':password', $data['password']);

            $stmt->execute([
                ':username' => $data['username'],
                ':nombre' => $data['nombre'],
                ':apellidos' => $data['apellidos'],
                ':password' => $data['password']
            ]);

        } catch (Exception $e) {
            die('❌ Error al insertar: ' . $e->getMessage());
        } finally {
            $conn = null;
        }
    }

    /**
     * Obtiene un usuario específico por su ID.
     *
     * @param int $id ID del usuario.
     * @return array|null Retorna el usuario como array asociativo o null si no se encuentra.
     */
    public static function get_user_id($id)
    {
        $sql_select = "SELECT * FROM usuarios WHERE id = :id";
        $conn = ConnectionPDO::get_connect();
        $stmt = $conn->prepare($sql_select);
        $stmt->execute(['id' => $id]);

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        return $usuario ?: null;
    }

    /**
     * Actualiza los datos de un usuario existente.
     *
     * @param int   $id ID del usuario a actualizar.
     * @param array $data Datos del usuario. Debe contener:
     *                    - username (string)
     *                    - nombre (string)
     *                    - apellidos (string)
     *                    - password (string)
     *
     * @return void
     */
    public static function update_user($id, $data)
    {
        $sql_update = "UPDATE usuarios 
                       SET username = :username, nombre = :nombre, apellidos = :apellidos, contrasena = :password 
                       WHERE id = :id";

        $conn = ConnectionPDO::get_connect();
        $stmt = $conn->prepare($sql_update);

        $stmt->execute([
            ":id" => $id,
            ":username" => $data['username'],
            ":nombre" => $data['nombre'],
            ":apellidos" => $data['apellidos'],
            ":password" => $data['password']
        ]);
    }

    /**
     * Elimina un usuario por su ID.
     *
     * @param int $id ID del usuario a eliminar.
     * @return void
     */
    public static function delete_user($id)
    {
        $sql_delete = "DELETE FROM usuarios WHERE id = :id";
        $conn = ConnectionPDO::get_connect();
        $stmt = $conn->prepare($sql_delete);

        $stmt->execute([":id" => $id]);
    }
}
