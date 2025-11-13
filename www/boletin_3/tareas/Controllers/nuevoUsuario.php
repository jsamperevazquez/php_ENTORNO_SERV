<?php 
include("data_controller.php");
require("usuarios.controller.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['origen']) && $_POST['origen'] === 'nuevo_usuario') {
    $nuevoUsuario = [
        'username' => htmlspecialchars( filtrar($_POST['username'], 0)),
        'nombre'=> htmlspecialchars(filtrar($_POST['nombre'], 1)),
        'apellidos'=> htmlspecialchars( filtrar($_POST['apellidos'], 1)),
        'password'=> $_POST['password']
    ];
    Usuarios_controller::insert_user( $nuevoUsuario );
}

?>