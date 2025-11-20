<div class="row">
    <div>
        <h2>Nuevo Usuario</h2>
    </div>
    <form class="row g-3 align-items-center" method="post" action="Controllers/nuevoUsuario.php" accept-charset="UTF-8" >
        <div style="padding: 10%;">
            <input type="hidden" name="origen" value="nuevo_usuario">

            <div class="col-auto">
                <label for="username" class="col-form-label" style="margin-right: 20px;">UserName</label>
            </div>
            <div class="col-auto">
                <input type="text" id="username"  name="username" class="form-control" required>
            </div>


            <div class="col-auto">
                <label for="nombre" class="col-form-label" style="margin-right: 37px;">Nombre</label>
            </div>
            <div class="col-auto">
                <input type="text" id="nombre" name="nombre" class="form-control" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ ]+$" placeholder="solo caracteres" required>
            </div>
            <div class="col-auto">
                <label for="apellidos" class="col-form-label" style="margin-right: 28px;">Apellidos</label>
            </div>
            <div class="col-auto">
                <input type="text" id="apellidos" name="apellidos" class="form-control" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ ]+$" placeholder="solo caracteres" required>
            </div>


            <div class="col-auto">
                <label for="password" class="col-form-label" style="margin-right: 26px;">Password</label>
            </div>
            <div class="col-auto">
                <input type="password" id="password" name="password" class="form-control" aria-describedby="passwordHelpInline" minlength="8" maxlength="15" required>
            </div>
            <div class="col-auto">
                <span id="passwordHelpInline" class="form-text">
                    Debe contener entre 8-15 caracteres
                </span>

            </div>
            <button type="submit" class="btn btn-primary" style="margin-top: 30px; width: 10em; border-radius: 10px; ">Enviar</button>
        </div>
        
    </form>
</div>