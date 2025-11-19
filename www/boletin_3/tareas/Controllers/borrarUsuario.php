<?php 
require_once("usuarios.controller.php");
/**
 * @var mixed Id del usuario a borrar ?? si no nulo
 */
$id = $_GET['id'] ?? null;
if($id !== null){
    Usuarios_controller::delete_user($id);
}else{
    die('❌ No se ha recibido el ID del usuario.');

}

?>