<!-- 
Pagina principal de la aplicacion basica de gestion de tareas. 
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

                    <h2>Sobre mí</h2>
                </div>
                <div class="container">
                    <p>Mi nombre es Jose Ángel Sampere vázquez.<br />Nací en Canarias hace <b>44</b> años pero vivo en
                        Vigo
                        hace ya 20 años.<br />
                        En la actualidad soy encargado de automoción y estudio DAW.</p>
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