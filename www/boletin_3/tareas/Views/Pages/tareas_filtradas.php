<?php 
require_once(dirname(__FILE__) . "/../../Controllers/usuarios.controller.php");
require_once(dirname(__FILE__) . "/../../Controllers/tareas.controller.php");

// Cargamos el id de usuario desde GET
$id_usuario = $_GET["user"] ?? null;

// Si no hay ID, redirigimos
if (!$id_usuario) {
    header("Location: index.php?Pages=usuarios");
    exit;
}

// Obtenemos tareas filtradas
$tareas = TareasController::index_user($id_usuario);
?>

<div class="row">
    <div>
        <h2>🧾 Tareas del usuario</h2>
    </div>

    <?php if (empty($tareas)): ?>
        <p>No hay tareas para este usuario.</p>
        <meta http-equiv="refresh" content="2;url=index.php?Pages=tareas">
    <?php else: ?>

        <div class="table">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Usuario Asignado</th>
                    <th style="width:150px;">Acciones</th>
                </tr>

                <?php foreach ($tareas as $tarea): ?>
                    <?php $usuario = Usuarios_controller::get_user($tarea['id_usuario']); ?>
                    <tr>
                        <td><b><?= $tarea['id'] ?></b></td>
                        <td><?= $tarea['titulo'] ?></td>
                        <td><?= $tarea['descripcion'] ?></td>
                        <td><?= $tarea['estado'] ?></td>
                        <td><?= $usuario['username'] ?></td>

                        <td>
                            <a class="btn btn-warning btn-editar"
                               href="index.php?Pages=editarTareaForm&id=<?= $tarea['id'] ?>"
                               title="Editar"
                               onclick="return confirm('¿Seguro que quieres modificar esta tarea?')">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>

                            <a class="btn btn-danger"
                               href="Controllers/borraTarea.php?id=<?= $tarea['id'] ?>"
                               title="Borrar"
                               onclick="return confirm('¿Seguro que quieres borrar esta tarea?')">
                                <i class="fa-solid fa-eraser"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

    <?php endif; ?>
</div>
