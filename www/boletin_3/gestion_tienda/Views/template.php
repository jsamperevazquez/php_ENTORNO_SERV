<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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