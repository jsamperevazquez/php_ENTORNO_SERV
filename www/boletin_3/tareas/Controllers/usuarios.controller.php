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


}



?>