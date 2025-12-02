<!-- Header -->
<?php require_once __DIR__ . '/partials/header.php'; ?>

<!-- Menú -->
<?php require_once __DIR__ . '/partials/menu.php'; ?>

<?php require_once __DIR__ . '/database.php'; ?>
<section class="py-5">
    <div class="container">
        <div class="row">
            <h2>REGISTRO PARTIDAS</h2>
            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                intval ($id_juego = $_POST['juego_id']);
                htmlspecialchars(trim($fecha = $_POST['fecha']));
                htmlspecialchars(($hora = $_POST['hora']));
                intval($master = $_POST['master']);
                nuevaPartida($id_juego, $fecha, $hora, $master);
            }
            ?>
        </div>
    </div>
</section>

<!-- Pie de página -->

<?php require_once __DIR__ . '/partials/pie.php'; ?>