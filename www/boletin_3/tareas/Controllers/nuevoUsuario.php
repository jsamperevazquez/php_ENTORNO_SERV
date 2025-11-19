<?php 
include("data_controller.php");
require("usuarios.controller.php");
/**
 * Controlador para nuevo usuario
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['origen']) && $_POST['origen'] === 'nuevo_usuario') {
    $nuevoUsuario = [
        'username' => htmlspecialchars( trim($_POST['username'])),
        'nombre'=> htmlspecialchars(filtrar($_POST['nombre'], 1)),
        'apellidos'=> htmlspecialchars( filtrar($_POST['apellidos'], 1)),
        'password'=> $_POST['password']
    ];
    Usuarios_controller::insert_user( $nuevoUsuario );
}

?>