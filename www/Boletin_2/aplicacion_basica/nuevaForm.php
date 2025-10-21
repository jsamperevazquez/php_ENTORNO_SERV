<!--
Formulario para la creación de una nueva tarea.
-->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD2. Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!--header-->
    <?php
    include("header.php");
    ?>
    <div class="container-fluid">

        <div class="row">
            <!--menu-->
            <?php
            include("menu.php");
            ?>
            <main class="col-md-8 ms-sm-auto px-md-4">
                <div
                    class="d-flex align-items-start justify-content-between flex-wrap  flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

                    <h2>Nueva Tarea</h2>
                </div>
                <div class="container">
                    <form class="mb-5" method="post" action="nueva.php">
                        <div class="mb-3">
                            <label class="form-label">Introduce nueva tarea</label>
                            <input class="form-control" name="tarea" placeholder="TAREA AQUÍ" required>
                        </div>
                        <select class="form-select">
                            <option></option>
                        </select>
                        <button type="submit" class="btn btn-primary" style="margin-top: 50px; width: 10em; border-radius: 10px; ">Enviar</button>
                    </form>
                </div>
            </main>
        </div>
    </div>
    <!--footer-->
    <?php
    include("footer.php");
    ?>
</body>

</html>