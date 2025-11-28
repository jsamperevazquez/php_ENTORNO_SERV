<?php
require_once "database.php";

$grupo_sanguineo = $_POST['g_sanguineo'] ?? '';
$codigo_postal = $_POST['codigo_postal'] ?? '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['origen']) && $_POST['origen'] === 'buscar_donante') {
    $conexion = Database::getConn();
    $stmt = $conexion->prepare("SELECT * FROM donantes WHERE codigo_postal = :codigo_postal OR grupo_sanguineo = :grupo_sanguineo");
    $stmt->bindParam(':grupo_sanguineo', $grupo_sanguineo);
    $stmt->bindParam(':codigo_postal', $codigo_postal);
    $stmt->execute();
    $donantes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($donantes) > 0) {
        include "header.php";
?>
        <div class="container-fluid">
            <div class="row">
                <?php include "menu.php"; ?>
                <main class="col-md-10 col-lg-10">
                    <div class="container mt-4">
                        <h1 class="text-center" style="color: #0d6efd;">DONANTES ENCONTRADOS</h1>
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
                                            <a href="nuevaDonacion.php?id=<?= $donante['id'] ?>" class="btn btn-danger btn-donacion">
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

                        <?php
                        $donaciones = Database::getConn()->query('SELECT 
    d.nombre,
    d.apellidos,
    d.edad,
    d.grupo_sanguineo,
    h.fecha_donacion,
    h.fecha_proxima_donacion
FROM donantes AS d
LEFT JOIN historico AS h
       ON d.id = h.donante
       AND h.fecha_proxima_donacion >= CURDATE()
ORDER BY h.fecha_donacion ASC;
')->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <h1 class="text-center" style="color: #0d6efd;">LISTA DE PRÓXIMAS DANACIONES O SIN DONACIONES</h1>
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
                                        <td><?= $donacion['fecha_donacion']?? 'SIN DONACIÓN' ?></td>
                                        <td><?= $donacion['fecha_proxima_donacion']?? 'SIN DONACIÓN' ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </main>
            </div>
        </div>
        <?php include "footer.php"; ?>

<?php } else {
        echo "<div class='alert alert-warning' style='text-align:center;'>No se encontraron donantes con los criterios especificados.</div>";
        echo "<div style='text-align:center;'><a href='buscarDonantesForm.php' class='btn btn-primary'>Volver a la búsqueda</a></div>";
    }
} else {
    echo "<div class='alert alert-danger' style='text-align:center;'>Solicitud inválida.</div>";
    echo "<div style='text-align:center;'><a href='buscarDonantesForm.php' class='btn btn-primary'>Volver a la búsqueda</a></div>";
}
