<?php 
include("data_controller.php");
require("usuarios.controller.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['origen'] ?? '') === 'editar_usuario') {
    $id = $_POST['id'] ?? null;
    if ($id) {
        $user = [
            'username' => htmlspecialchars(filtrar($_POST['username'], 0)),
            'nombre' => htmlspecialchars(filtrar($_POST['nombre'], 1)),
            'apellidos' => htmlspecialchars(filtrar($_POST['apellidos'], 1)),
            'password' => $_POST['password']
        ];
        Usuarios_controller::update_user($id, $user);
    } else {
        die('❌ No se ha recibido el ID del usuario.');
    }
}


?>