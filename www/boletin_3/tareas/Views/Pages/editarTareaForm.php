<?php
require_once __DIR__ . "/../../Controllers/tareas.controller.php";
$id = $_GET['id'] ?? null;
$tarea = TareasController::get_task($id);
?>

<div class="row">
    <div>
        <h2>Editar Tarea</h2>
    </div>
    <form class="row g-3 align-items-center" method="post" action="Controllers/editaTarea.php">
        <div style="padding: 10%;">
            <input type="hidden" name="origen" value="editar_tarea">
            <div class="col-auto">
                <label for="titulo" class="col-form-label" style="margin-right: 20px;">Titulo</label>
            </div>
            <div class="col-auto">
                <input type="text" id="titulo" name="titulo" class="form-control" value="<?= htmlspecialchars($tarea['titulo']) ?>" required>
                <input type="hidden" name="id" id="id" value="<?= htmlspecialchars($tarea['id'] ?? '') ?>">
            </div>
            <div class="col-auto">
                <label for="desripcion" class="col-form-label" style="margin-right: 37px;">Descripcion</label>
            </div>
            <div class="col-auto">
                <input type="text" id="descripcion" name="descripcion" class="form-control" value="<?= htmlspecialchars($tarea['descripcion']) ?>" required>
            </div>
            <div class="col-auto">
                <label for="estado" class="col-form-label" style="margin-right: 28px;">Estado</label>
            </div>
            <div class="col-auto">
                <select class="form-select" name="estado" id="estado_tarea">
                    <option value="Pendiente">Pendiente</option>
                    <option value="En proceso">En proceso</option>
                    <option value="Finalizada">Finalizada</option>
                </select>
            </div>
            <div class="col-auto">
                <label for="usuario" class="col-form-label" style="margin-right: 26px;">Usuario a asignar</label>
            </div>
            <div class="col-auto">
                <select class="form-select" name="usuario" id="usuario">
                    <?php foreach ($usuarios as $usuario): ?>
                        <option value="<?= htmlspecialchars($usuario['id']) ?>"><?= htmlspecialchars($usuario['username']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top: 30px; width: 10em; border-radius: 10px; ">Enviar</button>
        </div>

    </form>
</div>