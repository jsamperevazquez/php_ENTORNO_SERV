<!-- Header -->
<?php require_once __DIR__ . '/partials/header.php'; ?>

<!-- Menú -->
<?php require_once __DIR__ . '/partials/menu.php'; ?>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="fotos/dungeons-dragons.png" class="img-fluid rounded" alt="Dungeons & Dragons">
            </div>
            <div class="col-md-8"> <!-- Carga la información dinámicamente -->

                <?php
                require_once __DIR__ . '/database.php';
                $id_juego = $_GET['id'] ?? null;
                $juego = recuperaJuego($id_juego);
                $titulo = $juego['titulo'];
                $descripcion = $juego['descripcion'];
                $num_jugadores = $juego['num_jugadores'];
                ?>

                <h2><?php echo $titulo?></h2>
                <p class="mt-3"><?php echo $descripcion?></p>
                <p><strong>Número máximo de jugadores:</strong> <?php echo $num_jugadores?></p>
                <div class="mt-4">
                    <a href="partidas.php?id=<?php echo $id_juego . '&titulo=' . $titulo;?>" class="btn btn-primary me-2">Partidas Planificadas</a>
                    <a href="planificar.php?id=<?php echo $id_juego . '&titulo=' . $titulo;?>" class="btn btn-warning">Planificar Partida</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pie de página -->
<?php require_once __DIR__ . '/partials/pie.php'; ?>
