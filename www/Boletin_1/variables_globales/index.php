<!DOCTYPE html>
<html lang="es">
<meta charset="UTF-8">
<title>php info</title>
<meta name="viewport" content="width=device-width,initial-scale=1">

<body>
    <div class="container">
        <h1 style="text-align:center; color:purple;">PHP INFO</h1>
        <?php
        $phpInfo = phpinfo(); // Muestra toda las info de php
        echo $phpInfo;
        ?>
    </div>

</body>

</html>