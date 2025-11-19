<!DOCTYPE html>
<?php
if (conexionMYSQLI::db_ready()) { //Compruebo si la base de datos está levantada 
    $usuarios = Usuarios_controller::index();
    $tareas = TareasController::index();
} else {

    $usuarios = []; // Si no está levandata devuelvo un array vacío para que no me rompa la app
    $tareas = [];
}
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
    <title>Tareas Angel Sampere</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .container-fluid {
            flex: 1;
        }

        input::placeholder {
            color: #a0a0a0;
            font-style: italic;
        }

        table {
            margin: 40px auto;
            width: 100%;
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
                    // Página por defecto
                    $page = isset($_GET["Pages"]) ? $_GET["Pages"] : "home";

                    // Solamente permito páginas creadas
                    $allowedPages = [
                        "home",
                        "usuarios",
                        "tareas",
                        "buscaTareas",
                        "tareas_filtradas",
                        "nuevoUsuarioForm",
                        "nuevaForm",
                        "editarUsuarioForm",
                        "editarTareaForm",
                        "init"
                    ];
                    // Si la página está en el array de permitidas
                    if (in_array($page, $allowedPages)) {
                        include "Pages/$page.php";
                    } else {
                        include "Pages/home.php"; // cargo el home
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