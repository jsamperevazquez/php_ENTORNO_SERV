<?php 
include("../Controllers/usuarios.controller.php");
// El id del usuario selecionado llega por la url
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    UsuariosController::delete_user($id);
} else {
    // Si no se proporciona un ID
    echo "❌ No se recibió un ID válido.";
    header("Location: /Boletin_3/gestion_tienda/index.php");
}

?>