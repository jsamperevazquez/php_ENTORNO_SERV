<?php
/**
 * 
 * Clase intermediaria entre modelo usuarios y vista
 */
class UsuariosController
{
    /**
     * Metodo control para mostrar los usuarios
     * @return array array con todos los usuarios de la tabla
     */
    static public function user_index()
    {
        // Lógica del controlador de usuarios
        $tabla = "usuarios";
        $response = Usuarios::getUsuarios($tabla);
        return $response;

    }

    /**
     * Método control para la inserción de usuarios
     * @param mixed $user Usuario a insertar
     * @return never
     */
    static public function user_insert($user)
    {
        require_once "../Models/usuarios.php";
        Usuarios::insertUsuarios($user);
        header("Location: /Boletin_3/gestion_tienda/index.php");
        exit;


    }
    /**
     * Método control para borrar usuario 
     * @param mixed $id id del usuario a borrar
     * @return never
     */
    static public function delete_user($id){
        require_once "../Models/usuarios.php";
        Usuarios::deleteUuario( $id );
        header("Location: /Boletin_3/gestion_tienda/index.php");
        exit;
    }

    /**
     * Método control para la actualización de datos del usuario
     * @param mixed $id id del usuario a modificar
     * @param mixed $data datos nuevos para actualizar en tabla
     * @return never
     */
    static public function user_update($id, $data){
        require_once "../Models/usuarios.php";
        Usuarios::updateUsuarios($id, $data);
        header("Location: /Boletin_3/gestion_tienda/index.php");
        exit;
    }
}

?>