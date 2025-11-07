<?php 
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

function filtrar(string $texto, $flag): string {
    $texto = trim($texto);
    if ($flag === 1 ) {
        $texto = strtolower($texto);
        $texto = ucwords($texto);
        $texto = preg_replace("/[0-9\s]/", '', $texto);
    }
    $texto = preg_replace("/\s{2,}/", ' ', $texto);
    $texto = preg_replace("/[^a-zA-Z0-9ñÑ\s]/", '', $texto);
    return $texto;
}


?>