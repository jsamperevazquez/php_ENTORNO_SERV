<?php
include "header.php";
include_once("database.php");
?>
<div class="container-fluid">
    <div class="row">
        <?php include "menu.php"; ?>
        <main class="col-md-10 col-lg-10">
            <div class="container mt-4">
                <?php
                 $donantes = Database::getConn()->query("SELECT * FROM donantes")->fetchAll(PDO::FETCH_ASSOC);
                 ?>
                <h1 class="text-center" style="color: #0d6efd;">Lista de donantes</h1>
                <!-- Contenido de la página de lista de donantes -->
                <table>
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Edad</th>
                            <th scope="col">Grupo Sanguineo</th>
                            <th scope="col">Código postal</th>
                            <th scope="col">Teléfono móvil</th>
                            <th scope="col" style="width: 170px;text-align:center;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($donantes as $donante): ?>
                        <tr>
                            <td><?= $donante['id'] ?></td>
                            <td><?= htmlspecialchars($donante['nombre']) ?></td>
                            <td><?= htmlspecialchars($donante['apellidos']) ?></td>
                            <td><?= htmlspecialchars($donante['edad']) ?></td>
                            <td><?= htmlspecialchars($donante['grupo_sanguineo']) ?></td>
                            <td><?= htmlspecialchars($donante['telefono_movil']) ?></td>
                            <td><?= htmlspecialchars($donante['codigo_postal']) ?></td>
                            <td>
                                <a href="nuevaDonacion.php?id=<?=$donante['id']?>" class="btn btn-danger btn-donacion">
                                    <i class="fa-solid fa-heart-circle-plus"></i>
                                </a>
                                <a href="" class="btn btn-warning btn-editar"
                                onclick="return confirm('Seguro que quieres editar donante?')">
                                    <i class="fa-duotone fa-solid fa-pen-to-square"></i>                
                                </a>
                                <a href="eliminarDonante.php?id=<?= $donante['id'] ?>" class="btn btn-dark btn-borrar"
                                onclick="return confirm('Seguro que quieres borrar donante?')">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
<?php include "footer.php"; ?>