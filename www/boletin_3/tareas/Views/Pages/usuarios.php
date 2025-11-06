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
                <?php foreach($usuarios as $usuario): ?>

                <td><b><?= $usuario['id'] ?></b></td>
                <td><?= htmlspecialchars($usuario['username']) ?></td>
                <td><?= htmlspecialchars( $usuario['nombre']) ?></td>
                <td><?= htmlspecialchars( $usuario['apellidos']) ?></td>
                <td><a class="btn-borrar"
                        onclick="return confirm('¿Seguro que quieres borrar esta tarea?')">
                        🗑️ Borrar</a>
                    <a class="btn-modificar"
                        onclick="return confirm('¿Seguro que quieres modificar esta tarea?')">
                        <br>✏️ Modificar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    </main>
</div>