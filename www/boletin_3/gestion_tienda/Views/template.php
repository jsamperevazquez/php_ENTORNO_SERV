<!-- Plantilla de nuestra app-->
<!doctype html>
<?php
$usuarios = UsuariosController::user_index();
?>
<html lang="en">

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
    <title>Tienda online</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f9fafb 0%, #e8ecf3 100%);
            color: #1f2937;
            min-height: 100vh;
        }
    </style>
    <title>Gestion Tienda</title>
</head>

<body>
    <?php include("Modules/header.php"); ?>
    
    <div class="content-wrapper">
        <?php
        if (isset($_GET["Pages"])) {
            if ($_GET["Pages"] == "index") {
                include "Pages/" . $_GET["Pages"] . ".php";
            }
        }
        if (isset($_GET["Pages"])) {
            if ($_GET["Pages"] == "usuarios") {
                include "Pages/" . $_GET["Pages"] . ".php";
            }
        }
        ?>
    </div>
    <?php include("Modules/footer.php");
    ?>


</body>

</html>