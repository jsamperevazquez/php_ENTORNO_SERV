<!-- Header -->
<?php require_once __DIR__ . '/partials/header.php'; ?>

<!-- Menú -->
<?php require_once __DIR__ . '/partials/menu.php'; ?>

<!-- Partidas -->



<section class="py-5">
    <div class="container">
        <h2 class="text-center">Lista de Partidas</h2>
        <div class="table-responsive mt-4">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Juego</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Máster</th>
                        <th>Jugadores</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    </tr>
                        <?php
                    // Aquí se generarían las filas de la tabla dinámicamente desde la base de datos
                    require_once __DIR__ . '/database.php';
                    $id = $_GET['id'] ?? null;
                    $partidas = listaPartidas($id);
                    foreach ($partidas as $partida):
                    ?>
                    <tr>
                        <td><?= $partida['juego_nombre'] ?></td>
                        <td><?= $partida['fecha'] ?></td>
                        <td><?= $partida['hora'] ?></td>
                        <td><?= $partida['master_nombre'] ?></td>
                        <td><?= $partida['num_jugadores'] ?></td>
                        <td>
                            <a href="jugadores.php" class="btn btn-sm btn-warning">Añadir jugador</a>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>


<!-- Pie de página -->
<?php require_once __DIR__ . '/partials/pie.php'; ?>
