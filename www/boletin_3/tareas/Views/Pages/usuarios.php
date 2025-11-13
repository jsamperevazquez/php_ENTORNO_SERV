<!--RENDERIZAMOS LOS DATOS EN HTML-->
<div class="row">
    <div>
        <h2>🧱 Lista de usuarios</h2>
    </div>
    <div class="table">
        <table>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">UserName</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Acciones</th>
            </tr>
            <tr>
                <?php foreach ($usuarios as $usuario): ?>

                    <td><b><?= $usuario['id'] ?></b></td>
                    <td><?= htmlspecialchars($usuario['username']) ?></td>
                    <td><?= htmlspecialchars($usuario['nombre']) ?></td>
                    <td><?= htmlspecialchars($usuario['apellidos']) ?></td>
                    <td><a class="btn btn-warning btn-editar" type="submit" href="index.php?Pages=editarUsuarioForm&id=<?= $usuario['id'] ?>" 
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"
                            onclick="return confirm('¿Seguro que quieres modificar este usuario?')"
                            data-userame="<?= htmlspecialchars($usuario['username']) ?>"
                            data-nombre="<?= htmlspecialchars($usuario['nombre']) ?>"
                            data-apellidos="<?= htmlspecialchars($usuario['apellidos']) ?>">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" type="submit" title="Borrar"
                            onclick="return confirm('¿Seguro que quieres borrar este usuario?')" href="Controllers/borrarUsuario.php?id=<?= $usuario['id'] ?>">
                            <i class="fa-solid fa-eraser"></i>
                            <br></a>
                    </td>
            </tr>
        <?php endforeach; ?>
        </table>
    </div>
    </main>
</div>