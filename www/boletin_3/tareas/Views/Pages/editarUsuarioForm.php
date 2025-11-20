<?php
require_once __DIR__ . "/../../Controllers/usuarios.controller.php";

$id = $_GET['id'] ?? null;
$user = Usuarios_controller::get_user($id);
?>

<div class="row">
  <div>
    <h2>Modificar usuario</h2>
  </div>
  <form class="row g-3 align-items-center" method="POST" action="Controllers/editaUsuario.php">
    <div style="padding: 10%;">
      <div class="col-auto">
        <input type="hidden" name="origen" value="editar_usuario">
        <input type="hidden" name="id" id="id" value="<?= htmlspecialchars($user['id'] ?? '') ?>">

        <label for="username" class="col-form-label">UserName</label>
        <input type="text" id="username" name="username" class="form-control"
          value="<?= htmlspecialchars($user['username'] ?? '') ?>" required>

        <label for="nombre" class="col-form-label">Nombre</label>
        <input type="text" id="nombre" name="nombre" class="form-control"
          pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ ]+$"  value="<?= htmlspecialchars($user['nombre'] ?? '') ?>" required>

        <label for="apellidos" class="col-form-label">Apellidos</label>
        <input type="text" id="apellidos" name="apellidos" class="form-control"
          pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ ]+$"  value="<?= htmlspecialchars($user['apellidos'] ?? '') ?>" required>

        <label for="password" class="col-form-label">Password</label>
        <input type="password" id="password" name="password" class="form-control"
          minlength="8" maxlength="15" placeholder="vuelva a introducir" required>

        <div class="col-auto">
          <span id="passwordHelpInline" class="form-text">
            Debe contener entre 8-15 caracteres
          </span>
        </div>

        <button type="submit" class="btn btn-primary"
          style="margin-top: 30px; width: 10em; border-radius: 10px;">Enviar</button>
      </div>
    </div>
  </form>
</div>
