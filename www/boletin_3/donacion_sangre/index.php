 <?php

    include_once "../donacion_sangre/database.php";
    include "header.php";
    $con = Database::getConn();
    ?>
    <div class="container-fluid">
    <div class="row">
        <?php include "menu.php"; ?>
    
        <main class="col-md-10 col-lg-10">
            <div class="container mt-4">
                <h1 class="text-center" style="color: #0d6efd;">Bienvenido al sistema de gestión de donación de sangre</h1>
               
            </div>
        </main>
    </div>
</div>
<?php include "footer.php"; ?>