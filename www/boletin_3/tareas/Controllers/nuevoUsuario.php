<?php 
require("usuarios.controller.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['origen']) && $_POST['origen'] === 'nuevo_usuario') {
    $nuevoUsuario = [
        'username' => htmlspecialchars( filtrar($_POST['username'])),
        'nombre'=> htmlspecialchars(filtrar($_POST['nombre'])),
        'apellidos'=> htmlspecialchars( filtrar($_POST['apellidos'])),
        'password'=> $_POST['password']
    ];
    Usuarios_controller::insert_user( $nuevoUsuario );
}

function filtrar(string $texto): string {
    $texto = trim($texto);
    $texto = strtolower($texto);
    $texto = preg_replace("/\s{2,}/", ' ', $texto);
    $texto = preg_replace("/[^a-zA-Z0-9\s]/", '', $texto);
    return $texto;
}


?>