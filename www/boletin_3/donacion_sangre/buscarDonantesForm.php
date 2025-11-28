<?php
include "header.php";
?>
<div class="container-fluid">
    <div class="row">
        <?php include "menu.php"; ?>
        <main class="col-md-10 col-lg-10">
            <div class="container mt-4">
                <h1 class="text-center" style="color: #0d6efd;">BUSQUEDA DE DONANTE</h1>
                <form class="row g-3 align-items-center" method="post" action="buscarDonante.php" accept-charset="UTF-8">
                    <div class="mb-3">
                        <input type="hidden" name="origen" value="buscar_donante">
                        <label for="g_sanguineo" class="form-label">Grupo Sanguineo</label>
                        <input type="text" class="form-control" id="g_sanguineo" name="g_sanguineo">
                    </div>

                    <div class="mb-3">
                        <label for="codigo_postal" class="form-label">Codigo Postal</label>
                        <input type="number" class="form-control" id="codigo_postal" name="codigo_postal" required>
                    </div>
                    <button type="submit" style="margin-bottom:50px" class="btn btn-primary">Buscar</button>
                </form>
            </div>
        </main>
    </div>
</div>
<?php include "footer.php"; ?>