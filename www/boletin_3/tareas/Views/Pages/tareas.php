<!--RENDERIZAMOS LOS DATOS EN HTML-->
<?php require_once __DIR__ . "/../../Controllers/usuarios.controller.php" ?>
<div class="row">
    <div>
        <h2>🧾 Lista de tareas</h2>
    </div>
    <div class="table">
        <table>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titulo</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Estado</th>
                <th scope="col">Usuario Asignado</th>
                <th scope="col" style="width: 150px;">Acciones</th>
            </tr>
            <?php foreach ($tareas as $tarea): ?>
                <?php $usuario = Usuarios_controller::get_user($tarea['id_usuario'])?>
                <tr>

                    <td><b><?= $tarea['id'] ?></b></td>
                    <td><?= $tarea['titulo'] ?></td>
                    <td><?= $tarea['descripcion'] ?></td>
                    <td><?= $tarea['estado'] ?></td>
                    <td><?= $usuario['username'] ?? 'Por Asignar' ?></td>
                    <td><a class="btn btn-warning btn-editar" type="submit" href="index.php?Pages=editarTareaForm&id=<?= $tarea['id'] ?>"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"
                            onclick="return confirm('¿Seguro que quieres modificar esta tarea?')">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" type="submit" title="Borrar"
                            onclick="return confirm('¿Seguro que quieres borrar esta tarea?')" href="Controllers/borraTarea.php?id=<?= $tarea['id'] ?>">
                            <i class="fa-solid fa-eraser"></i>
                            <br></a>
                    </td>
                </tr>
                <?php endforeach ?>
        </table>
    </div>
    </main>
</div>