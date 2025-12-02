<!-- Header -->
<?php require_once __DIR__ . '/partials/header.php'; ?>

<!-- Menú -->
<?php require_once __DIR__ . '/partials/menu.php'; ?>

<!-- Partida -->
<?php require_once __DIR__ . '/database.php';
    $id_juego = $_GET['id'] ?? null;
    $juego = recuperaJuego($id_juego);
    $titulo = $juego['titulo'];
?>

<section class="py-5 bg-light" id="partida">
    <div class="container">
        <h2 class="text-center"><?= $titulo ?> </h2> <!-- Sustituye el nombre del juego dinámicamente -->
        <form class="mt-4" method="post" action="crear_partida.php">
            <input type="hidden" name="juego_id" value="<?= $id_juego ?>"> <!-- Sustituye 123 con el ID del juego dinámicamente -->

            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha de la partida</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>

            <div class="mb-3">
                <label for="hora" class="form-label">Hora de la partida</label>
                <input type="time" class="form-control" id="hora" name="hora" required>
            </div>

            <div class="mb-3">
                <label for="master" class="form-label">Máster (Socio responsable)</label>
                <select class="form-select" id="master" name="master" required>
                    <option value="" selected disabled>Selecciona un máster</option>
                    <option value="1">Juan Pérez</option>
                    <option value="2">María García</option>
                    <option value="3">Carlos López</option>
                    <option value="4">Ana Fernández</option>
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Crear Partida</button>
            </div>
        </form>
    </div>
</section>

<!-- Pie de página -->
<?php require_once __DIR__ . '/partials/pie.php'; ?>