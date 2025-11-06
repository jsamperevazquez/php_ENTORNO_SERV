<!DOCTYPE html>
<?php
$usuarios = Usuarios_controller::index();
?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Enlace al archivo CSS de Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Enlace al archivo JavaScript de Bootstrap 5 (opcional, para componentes dinámicos) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <title>Tienda DAW</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <style>
        table {
            margin: 40px auto;
            width: 80%;
            border-collapse: collapse;
            background: white;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #007BFF;
            color: white;
        }

        tr:hover {
            background: #e9f3ff;
        }

        .btn-borrar {
            color: red;
            text-decoration: none;
        }

        .btn-modificar {
            color: green;
            text-decoration: none;
        }

        h2 {
            text-align: center;
            color: burlywood;
            font-family: 'Monaco';
        }
    </style>
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

            <main class="col-md-9 mx-auto px-md-4 text-center">
                <div class="d-flex align-items-start justify-content-between flex-wrap  flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <?php
                    if (isset($_GET["Pages"])) {
                        if ($_GET["Pages"] == "usuarios") {
                            include ("Pages/") . $_GET["Pages"] . ".php";
                        }
                    }
                    if (isset($_GET["Pages"])) {
                        if ($_GET["Pages"] == "home") {
                            include ("Pages/") . $_GET["Pages"] . ".php";
                        }
                    }
                    if (isset($_GET["Pages"])) {
                        if ($_GET["Pages"] == "init") {
                            include ("Pages/") . $_GET["Pages"] . ".php";
                        }
                    }
                    if (isset($_GET["Pages"])) {
                        if ($_GET["Pages"] == "nuevoUsuarioForm") {
                            include ("Pages/") . $_GET["Pages"] . ".php";
                        }
                    }
                    ?>

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