<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD3. Tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!--header-->
    <?php
    include("modules/header.php");
    ?>
    <div class="container-fluid">

        <div class="row">
            <!--menu-->
            <?php
            include("modules/menu.php");
            ?>

            <main class="col-md-8 ms-sm-auto px-md-4">
                <div class="d-flex align-items-start justify-content-between flex-wrap  flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <?php
                    if (isset($_GET["Pages"])) {
                        if ($_GET["Pages"] == "usuarios") {
                            include ("Pages/") . $_GET["Pages"] . ".php";
                        }
                    }
                    if (isset($_GET["Pages"])) {
                        if ($_GET["Pages"] == "init") {
                            include ("Pages/") . $_GET["Pages"] . ".php";
                        }
                    }
                    ?>
                    <h2>Sobre la APP</h2>
                </div>
                <div class="container">
                    <p>Bienvenido a la aplicación para la gestión de <b>tareas</b>.<br>
                        Podrás crear y gestinoar las tareas de forma sencilla e intuitiva.
                    </p>
                </div>
            </main>
        </div>
    </div>
    <!--footer-->
    <?php
    include("modules/footer.php");
    ?>
</body>

</html>