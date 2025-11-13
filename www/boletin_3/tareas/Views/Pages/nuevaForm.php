<div class="row">
    <div>
        <h2>Nueva Tarea</h2>
    </div>
    <form class="row g-3 align-items-center" method="post" action="Controllers/nuevaTarea.php">
        <div style="padding: 10%;">
            <input type="hidden" name="origen" value="nuevo_tarea">

            <div class="col-auto">
                <label for="titulo" class="col-form-label" style="margin-right: 20px;">Titulo</label>
            </div>
            <div class="col-auto">
                <input type="text" id="titulo"  name="titulo" class="form-control" required>
            </div>
            <div class="col-auto">
                <label for="desripcion" class="col-form-label" style="margin-right: 37px;">Descripcion</label>
            </div>
            <div class="col-auto">
                <input type="text" id="descripcion" name="descripcion" class="form-control" required>
            </div>
            <div class="col-auto">
                <label for="estado" class="col-form-label" style="margin-right: 28px;">Estado</label>
            </div>
            <div class="col-auto">
               <select  class="form-select" name="estado_tarea" id="estado_tarea">
                    <option value="1">Pendiente</option>
                    <option value="2">En proceso</option>
                    <option value="3">Finalizada</option>
               </select>
            </div>
            <div class="col-auto">
                <label for="usuario" class="col-form-label" style="margin-right: 26px;">Usuario a asignar</label>
            </div>
            <div class="col-auto">
               <select class="form-select" name="usuario" id="usuario">
                    <?php foreach ($usuarios as $usuario): ?>
                    <option value="<?= htmlspecialchars ($usuario['id']) ?>"><?= htmlspecialchars($usuario['username']) ?></option>
                    <?php  endforeach; ?>
               </select>
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top: 30px; width: 10em; border-radius: 10px; ">Enviar</button>
        </div>
        
    </form>
</div>