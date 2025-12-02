<!-- Header -->
<?php require_once __DIR__ . '/partials/header.php'; ?>

<!-- Menú -->
<?php require_once __DIR__ . '/partials/menu.php'; ?>

<!-- Partida -->


<section class="py-5">
    <div class="container">
        <h2 class="text-center">Jugadores de la Partida</h2>
        <form class="mt-4">

            <input type="hidden" name="partida_id" value="1"> <!-- Cambia el valor dinámicamente -->

            <div class="mb-3">
                <label for="jugador" class="form-label">Seleccionar Jugador</label>
                <select class="form-select" id="jugador" name="jugador_id" required>
                    <option value="" selected disabled>Selecciona un jugador</option>
                    <option value="1">Juan Pérez</option>
                    <option value="2">María García</option>
                    <option value="3">Carlos López</option>
                    <option value="4">Ana Fernández</option>
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-warning">Añadir Jugador</button>
            </div>
        </form>

        <div class="mt-5">
            <h4 class="text-center">Jugadores Actuales</h4>
            <ul class="list-group">
                <li class="list-group-item">Juan Pérez</li>
                <li class="list-group-item">Carlos López</li>
            </ul>
        </div>
    </div>
</section>


<!-- Pie de página -->
<?php require_once __DIR__ . '/partials/pie.php'; ?>