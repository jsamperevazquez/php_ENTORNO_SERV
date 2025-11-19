<div class="row">
    <div>
        <h2>Buscador de taras</h2>
    </div>
    <form class="row g-3 align-items-center" method="post" action="Controllers/buscar.php">
        <div style="padding: 10%;">
            <input type="hidden" name="origen" value="buscar_tarea">
            <div class="col-auto">
                <label for="usuario" class="col-form-label" style="margin-right: 26px;">Tareas de usuario</label>
            </div>
            <div class="col-auto">
                <select class="form-select" name="usuario" id="usuario">
                    <?php foreach ($usuarios as $usuario): ?>
                        <option value="<?= htmlspecialchars($usuario['id']) ?>"><?= htmlspecialchars($usuario['username']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
             <div class="col-auto">
                <label for="estado" class="col-form-label" style="margin-right: 28px;">Estado</label>
            </div>
            <div class="col-auto">
                <select class="form-select" name="estado" id="estado_tarea">
                    <option value="" disabled selected>Selecciona un estado</option>
                    <option value="Pendiente">Pendiente</option>
                    <option value="En proceso">En proceso</option>
                    <option value="Finalizada">Finalizada</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top: 30px; width: 10em; border-radius: 10px; ">Buscar</button>
        </div>

    </form>
</div>