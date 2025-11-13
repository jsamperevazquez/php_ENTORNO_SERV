<?php 
require("usuarios.controller.php");
$id = $_GET['id'] ?? null;
if($id !== null){
    Usuarios_controller::delete_user($id);
}else{
    die('❌ No se ha recibido el ID del usuario.');

}

?>