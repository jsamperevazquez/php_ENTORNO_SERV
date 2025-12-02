<!-- Header -->
<?php require_once __DIR__ . '/partials/header.php'; ?>

<!-- Menú -->
<?php require_once __DIR__ . '/partials/menu.php'; ?>

<!-- Portada -->
<?php require_once __DIR__ . '/partials/portada.php'; ?>

<!-- Descripción -->
<?php require_once __DIR__ . '/partials/descripcion.php'; ?>

<section class="py-5 bg-light" id="juegos">
    <div class="container">
        <h2 class="text-center">Nuestros Juegos</h2>
        <div class="row gy-4 mt-4">
            
        <?php
            require_once __DIR__ . '/database.php';
            $juegos = listaJuegos();
             foreach ($juegos as $juego) {
                if ($juego['titulo'] == 'Dungeons & Dragons') {
                    $dungeons = $juego['id'];
                } elseif ($juego['titulo'] == 'Pathfinder') {
                    $pathfinder = $juego['id'];
                } elseif ($juego['titulo'] == 'La llamada de Cthulhu') {
                    $llamada = $juego['id'];
                } elseif ($juego['titulo'] == 'Shadowrun') {
                    $shadorwrun = $juego['id'];
                } elseif ($juego['titulo'] == 'Star Wars RPG') {
                    $star = $juego['id'];
                }
        }
        ?>
                
            <div class="col-md-4">
                <div class="card">
                    <a href="juego.php?id=<?php echo $dungeons?>" class="text-decoration-none text-dark">
                        <img src="fotos/dungeons-dragons.png" class="card-img-top" alt="Dungeons & Dragons">
                        <div class="card-body">
                            <h5 class="card-title">Dungeons & Dragons</h5>
                            <p class="card-text">Explora mazmorras y vive épicas aventuras.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <a href="juego.php?id=<?php echo $pathfinder?>" class="text-decoration-none text-dark">
                        <img src="fotos/pathfinder.jpg" class="card-img-top" alt="Pathfinder">
                        <div class="card-body">
                            <h5 class="card-title">Pathfinder</h5>
                            <p class="card-text">Un sistema detallado para aventuras increíbles.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <a href="juego.php?id=<?php echo $llamada?>" class="text-decoration-none text-dark">
                        <img src="fotos/chtulhu.jpg" class="card-img-top" alt="Cthulhu">
                        <div class="card-body">
                            <h5 class="card-title">La llamada de Cthulhu</h5>
                            <p class="card-text">Investiga los misterios de los Mitos de Cthulhu.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <a href="juego.php?id=<?php echo $shadorwrun?>" class="text-decoration-none text-dark">
                        <img src="fotos/shadowrun.jpg" class="card-img-top" alt="Shadowrun">
                        <div class="card-body">
                            <h5 class="card-title">Shadowrun</h5>
                            <p class="card-text">Ciberpunk y magia en un futuro distópico.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <a href="juego.php?id=<?php echo $star?>" class="text-decoration-none text-dark">
                        <img src="fotos/star-wars.jpeg" class="card-img-top" alt="Star Wars">
                        <div class="card-body">
                            <h5 class="card-title">Star Wars RPG</h5>
                            <p class="card-text">Vive aventuras en una galaxia muy, muy lejana.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pie de página -->

<?php require_once __DIR__ . '/partials/pie.php'; ?>
