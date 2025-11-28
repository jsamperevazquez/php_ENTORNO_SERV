<?php
include "header.php";
?>
<div class="container-fluid">
    <div class="row">
        <?php include "menu.php"; ?>
        <main class="col-md-10 col-lg-10">
            <div class="container mt-4">
                <h1 class="text-center" style="color: #0d6efd;">NUEVO DONANTE</h1>
                <form class="row g-3 align-items-center" method="post" action="nuevoDonante.php" accept-charset="UTF-8">
                    <div class="mb-3">
                        <input type="hidden" name="origen" value="nuevo_donante">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>

                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                    </div>

                    <div class="mb-3">
                        <label for="number" class="form-label">Edad</label>
                        <input type="edad" class="form-control" id="edad" name="edad" required>
                    </div>
                    <div class="mb-3">
                        <label for="g_sanguineo" class="form-label">Grupo Sanguineo</label>
                        <input type="text" class="form-control" id="g_sanguineo" name="g_sanguineo" required>
                    </div>

                    <div class="mb-3">
                        <label for="codigo_postal" class="form-label">Codigo Postal</label>
                        <input type="number" class="form-control" id="codigo_postal" name="codigo_postal" required>
                    </div>

                    <div class="mb-3">
                        <label for="telefono_movil" class="form-label">Telefono Móvil</label>
                        <input type="number" class="form-control" id="telefono_movil" name="telefono_movil" required>
                    </div>

                    <button type="submit" style="margin-bottom:50px" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </main>
    </div>
</div>
<?php include "footer.php"; ?>