<!-- Pagina para renderizar nuestros usuarios recuperados de la bd-->
<div class="content p-3" style="min: height 750px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="color: #3149EB">Administración de usuarios</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                Crear nuevo usuario
                            </button>
                            <br>
                        </div>
                        <br>
                        <div class="card-body">
                            <table class="table">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellidos</th>
                                        <th scope="col">Edad</th>
                                        <th scope="col">Provincia</th>
                                        <th scope="col">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($usuarios as $usuario): ?>
                                        <tr>
                                            <td><?= $usuario['id'] ?></td>
                                            <td><?= htmlspecialchars($usuario['nombre']) ?></td>
                                            <td><?= htmlspecialchars($usuario['apellidos']) ?></td>
                                            <td><?= htmlspecialchars($usuario['edad']) ?></td>
                                            <td><?= htmlspecialchars($usuario['provincia']) ?></td>
                                            <td>
                                                <a class="btn btn-warning btn-editar" data-id="<?= $usuario['id'] ?>"
                                                    data-nombre="<?= htmlspecialchars($usuario['nombre']) ?>"
                                                    data-apellidos="<?= htmlspecialchars($usuario['apellidos']) ?>"
                                                    data-edad="<?= htmlspecialchars($usuario['edad']) ?>"
                                                    data-provincia="<?= htmlspecialchars($usuario['provincia']) ?>"
                                                    data-bs-toggle="modal" data-bs-target="#SB">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>



                                                <a class="btn btn-danger"
                                                    href="Controllers/delete.controller.php?id=<?= $usuario['id'] ?>"
                                                    onclick="return confirm('Seguro que quieres borrar este usuario')"><i
                                                        class="fa-solid fa-eraser"></i></a>
                                            </td>
                                        </tr>
                                        <form action="Controllers/data.controller.php" method="post">
                                                        <div class="modal fade" id="SB" data-bs-backdrop="static"
                                                            data-bs-keyboard="false" tabindex="-1"
                                                            aria-labelledby=SB" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="p-3 mb-2 bg-primary text-white"
                                                                        style="text-align: center;">
                                                                        <h5 class="modal-title" id="SBLabel">
                                                                            Actualizar usuario
                                                                        </h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <input type="hidden" name="origen"
                                                                            value="editar_usuario">
                                                                        <div class="input-group mb-3">
                                                                            <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Nombre" name="nombre"
                                                                                aria-label="Nombre"
                                                                                aria-describedby="basic-addon1" 
                                                                                value="<?= htmlspecialchars($usuario['nombre']) ?>"
                                                                                required>
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Apellidos" name="apellidos"
                                                                                aria-label="Apellidos"
                                                                                aria-describedby="basic-addon1"
                                                                                value="<?= htmlspecialchars($usuario['apellidos']) ?>"
                                                                                required>
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                            <input type="number" class="form-control"
                                                                                placeholder="Edad" name="edad"
                                                                                aria-label="Edad"
                                                                                aria-describedby="basic-addon1" 
                                                                                value="<?= htmlspecialchars($usuario['edad']) ?>"
                                                                                required>
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Provincia" name="provincia"
                                                                                aria-label="Provincia"
                                                                                aria-describedby="basic-addon1" 
                                                                                value="<?= htmlspecialchars($usuario['provincia']) ?>"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger"
                                                                            data-bs-dismiss="modal">Cerrar</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Actualizar usuario</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>

                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <form action="Controllers/data.controller.php" method="post">
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="p-3 mb-2 bg-primary text-white" style="text-align: center;">
                        <h5 class="modal-title" id="staticBackdropLabel">Agregar Nuevo Usuario</h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="origen" value="nuevo_usuario">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Nombre" name="nombre"
                                aria-label="Nombre" aria-describedby="basic-addon1" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Apellidos" name="apellidos"
                                aria-label="Apellidos" aria-describedby="basic-addon1" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" placeholder="Edad" name="edad" aria-label="Edad"
                                aria-describedby="basic-addon1" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Provincia" name="provincia"
                                aria-label="Provincia" aria-describedby="basic-addon1" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Agregar usuario</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>