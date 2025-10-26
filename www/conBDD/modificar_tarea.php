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
    require("conexion.php");

    if (isset($_GET["id"])) {

        $id = $_GET["id"];
        $sql = "SELECT * FROM tareas WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam((":id"), $id, PDO::PARAM_INT);
        $stmt->execute();
        $tarea = $stmt->fetch(PDO::FETCH_ASSOC);
    }
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
                    <h2>Modificar Tarea</h2>
                </div>
                <div class="container">
                    <form class="mb-5" method="post" action="nueva.php">
                        <div class="mb-3">
                            <input type="hidden" name="origen" value="modificar_tarea">
                            <input type="hidden" name="id" value="<?= $tarea['id'] ?>">
                            <label class="form-label">Título de la tarea</label>
                            <input class="form-control" name="titulo" value='<?= htmlspecialchars($tarea['titulo']) ?>'
                                required>
                            <label class="form-label">Descripción de la tarea</label>
                            <input class="form-control" type="text" name="descripcion"
                                value='<?= htmlspecialchars($tarea['descripcion']) ?>' required>
                        </div>
                        <button type="submit" class="btn btn-primary"
                            style="margin-top: 50px; width: 10em; border-radius: 10px; ">Modificar</button>
                    </form>
                </div>
            </main>
        </div>
    </div>
    <!--footer-->
    <?php
    $conexion = null;
    include("footer.php");
    ?>
</body>

</html>