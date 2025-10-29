<?php
include("../Controllers/usuarios.controller.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['origen']) && $_POST['origen'] === 'nuevo_usuario') {

    $nuevoUsuario = [
        'nombre' => htmlspecialchars(trim(ucwords(strtolower($_POST['nombre'])))),
        'apellidos' => htmlspecialchars(trim(ucwords(strtolower($_POST['apellidos'])))),
        'edad' => htmlspecialchars(trim($_POST['edad'])),
        'provincia' => htmlspecialchars(trim(ucwords(strtolower($_POST['provincia']))))
    ];

    UsuariosController::user_insert($nuevoUsuario);
    exit;
}elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['origen']) && $_POST['origen'] === 'editar_usuario'){
    $id = $_POST['id'];
    $usuario_modificado = [
        'nombre' => htmlspecialchars(trim(ucwords(strtolower($_POST['nombre'])))),
        'apellidos' => htmlspecialchars(trim(ucwords(strtolower($_POST['apellidos'])))),
        'edad' => htmlspecialchars(trim($_POST['edad'])),
        'provincia' => htmlspecialchars(trim(ucwords(strtolower($_POST['provincia']))))
    ];
    UsuariosController::user_update($id,$usuario_modificado);
}



?>