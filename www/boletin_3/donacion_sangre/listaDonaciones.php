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
                $donaciones = Database::getConn()->query("SELECT 
    d.nombre,
    d.apellidos,
    d.edad,
    d.grupo_sanguineo,
    h.fecha_donacion,
    h.fecha_proxima_donacion
FROM donantes AS d
INNER JOIN historico AS h
        ON d.id = h.donante
ORDER BY h.fecha_donacion ASC;
")->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <h1 class="text-center" style="color: #0d6efd;">Lista de donaciones</h1>
                <!-- Contenido de la página de lista de donaciones -->
                <table>
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Edad</th>
                            <th scope="col">Grupo Sanguineo</th>
                            <th scope="col">Fecha de donación</th>
                            <th scope="col">Fecha de próxima donación</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($donaciones as $donacion): ?>
                            <tr>
                                <td><?= htmlspecialchars($donacion['nombre']) ?></td>
                                <td><?= htmlspecialchars($donacion['apellidos']) ?></td>
                                <td><?= htmlspecialchars($donacion['edad']) ?></td>
                                <td><?= htmlspecialchars($donacion['grupo_sanguineo']) ?></td>
                                <td><?= $donacion['fecha_donacion'] ?></td>
                                <td><?= $donacion['fecha_proxima_donacion'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
<?php include "footer.php"; ?>