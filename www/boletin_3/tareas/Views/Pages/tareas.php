<!--RENDERIZAMOS LOS DATOS EN HTML-->
<div class="row">
    <div>
        <h2>🧾 Lista de tareas</h2>
    </div>
    <div class="table">
        <table>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titulo</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Estado</th>
                <th scope="col">Usuario Asignado</th>
                <th scope="col">Acciones</th>
            </tr>
            <tr>
                    <td><b></b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><a class="btn btn-warning btn-editar" type="submit" href="" 
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"
                            onclick="return confirm('¿Seguro que quieres modificar este usuario?')">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" type="submit" title="Borrar"
                            onclick="return confirm('¿Seguro que quieres borrar este usuario?')" href="">
                            <i class="fa-solid fa-eraser"></i>
                            <br></a>
                    </td>
            </tr>
        </table>
    </div>
    </main>
</div>