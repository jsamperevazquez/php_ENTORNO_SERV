<?php 
class Usuarios_controller{

    static public function index(){
        $tabla ='usuarios';
        $responese = Usuarios::show_all_usuarios($tabla);
        return $responese;
    }

    static public function insert_user($user){
        require_once("../Models/usuarios.php");
        Usuarios::insert_users( $user );
        header("Location: /Boletin_3/tareas/index.php");
        exit;
    }

    static public function get_user($id){
        $response = Usuarios::get_user_id($id);
        return $response;
    }

    static public function update_user($id, $data){
        require_once("../Models/usuarios.php");
        Usuarios::update_user($id, $data);
        echo "<div class='alert alert-success' style='text-align:center;'>Usuario modificado correctamente</div>";
        echo '<meta http-equiv="refresh" content="2;url=/Boletin_3/tareas/index.php?Pages=home"">'; // Muestro el mensaje y despues de 2 segundos volvemos a index.php
        exit;
    }
    static public function delete_user($id){
        require_once("../Models/usuarios.php");
        usuarios::delete_user($id);
        echo "<div class='alert alert-success' style='text-align:center;'>Usuario eliminado correctamente</div>";
        echo '<meta http-equiv="refresh" content="2;url=/Boletin_3/tareas/index.php?Pages=home"">'; // Muestro el mensaje y despues de 2 segundos volvemos a index.php
    }
}



?>