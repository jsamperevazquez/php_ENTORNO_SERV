<?php 

/**
 * Controlador de usuarios.
 * 
 * Se encarga de gestionar las peticiones relacionadas con usuarios:
 * listar, insertar, obtener uno por ID, actualizar y eliminar.
 */
class Usuarios_controller{

    /**
     * Muestra todos los usuarios del sistema.
     *
     * @return array Lista de usuarios obtenidos desde el modelo.
     * 
     * @example
     * $usuarios = Usuarios_controller::index();
     * foreach ($usuarios as $u) {
     *     echo $u['nombre'];
     * }
     */
    public static function index(): array {
        $tabla_usuarios = 'usuarios';
        $response = Users::show_all_usuarios($tabla_usuarios);
        return $response;
    }

    /**
     * Inserta un nuevo usuario en la base de datos.
     *
     * @param array $user Datos del usuario a insertar. Claves esperadas según el modelo (ej: nombre, email...).
     * 
     * @return void
     * 
     * @example
     * Usuarios_controller::insert_user([
     *     'nombre' => 'Pepe',
     *     'email' => 'pepe@gmail.com'
     * ]);
     */
    public static function insert_user(array $user): void {
        require_once __DIR__ . "/../Models/usuarios.php";
        Users::insert_users($user);

        echo "<div class='alert alert-success' style='text-align:center;'>Usuario ingresado correctamente</div>";
        echo '<meta http-equiv="refresh" content="2;url=/Boletin_3/tareas/index.php?Pages=home">';
        exit;
    }

    /**
     * Obtiene un usuario por su ID.
     *
     * @param int $id ID del usuario.
     * @return array|null Datos del usuario o null si no existe.
     * 
     * @example
     * $usuario = Usuarios_controller::get_user(5);
     */
    public static function get_user(int $id): ?array {
        $response = Users::get_user_id($id);
        return $response;
    }

    /**
     * Actualiza los datos de un usuario existente.
     *
     * @param int   $id   ID del usuario a actualizar.
     * @param array $data Datos nuevos a guardar (según el modelo Users::update_user).
     * 
     * @return void
     * 
     * @example
     * Usuarios_controller::update_user(4, [
     *     'nombre' => 'Nuevo Nombre',
     *     'email' => 'nuevo@mail.com'
     * ]);
     */
    public static function update_user(int $id, array $data): void {
        require_once("../Models/usuarios.php");
        Users::update_user($id, $data);

        echo "<div class='alert alert-success' style='text-align:center;'>Usuario modificado correctamente</div>";
        echo '<meta http-equiv="refresh" content="2;url=/Boletin_3/tareas/index.php?Pages=home">';
        exit;
    }

    /**
     * Elimina un usuario de la base de datos.
     *
     * @param int $id ID del usuario a eliminar.
     * 
     * @return void
     * 
     * @example
     * Usuarios_controller::delete_user(3);
     */
    public static function delete_user(int $id): void {
        require_once("../Models/usuarios.php");
        Users::delete_user($id);

        echo "<div class='alert alert-success' style='text-align:center;'>Usuario eliminado correctamente</div>";
        echo '<meta http-equiv="refresh" content="2;url=/Boletin_3/tareas/index.php?Pages=home">';
    }
}

?>
