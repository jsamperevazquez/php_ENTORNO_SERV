# CRUD MVC PHP MySQL  

CRUD desarrollado en POO php usando una base de datos MySQL para la persistencia de los mismos, con un despliegue en contendores usando LAMP.  

## ESTRUCTURA DE ARCHIVOS  


````
gestion_tienda/    
    ├──Controllers
    │       ├──data.controller.php
    │       ├──delete.controller.php
    │       ├──template.controller.php
    │       └──usuarios.controller.php
    │
    ├──Models
    │       ├──conexion.php
    │       ├──instalar.php
    │       └──usuarios.php
    │
    │
    ├──Views
    │    ├──Modules
    │    │       ├──footer.php
    │    │       └──header.php
    │    ├──Pages
    │    │   ├──usuarios.php
    │    │   └──index.php
    │    │
    │    │
    │    └──template.php
    │
    ├──.htaccess
    ├──index.php
    └──README.MD

````   

## MVC  

### Controllers  
* data.controller.php  

````
<?php
include("../Controllers/usuarios.controller.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['origen']) && $_POST['origen'] === 'nuevo_usuario') {

    $nuevoUsuario = [
        'nombre' => htmlspecialchars(trim(ucwords(strtolower($_POST['nombre'])))),
        'apellidos' => htmlspecialchars(trim(ucwords(strtolower($_POST['apellidos'])))),
        'edad' => htmlspecialchars(trim($_POST['edad'])),
        'provincia' => htmlspecialchars(trim(ucwords(strtolower($_POST['provincia']))))
    ];

    UsuariosController::user_insert($nuevoUsuario);
    exit;
}elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['origen']) && $_POST['origen'] === 'editar_usuario'){
    $id = $_POST['id'];
    $usuario_modificado = [
        'nombre' => htmlspecialchars(trim(ucwords(strtolower($_POST['nombre'])))),
        'apellidos' => htmlspecialchars(trim(ucwords(strtolower($_POST['apellidos'])))),
        'edad' => htmlspecialchars(trim($_POST['edad'])),
        'provincia' => htmlspecialchars(trim(ucwords(strtolower($_POST['provincia']))))
    ];
    UsuariosController::user_update($id,$usuario_modificado);
}



?>

````  
* delete.controller.php  

````
<?php 
include("../Controllers/usuarios.controller.php");
// El id del usuario selecionado llega por la url
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    UsuariosController::delete_user($id);
} else {
    // Si no se proporciona un ID
    echo "❌ No se recibió un ID válido.";
    header("Location: /Boletin_3/gestion_tienda/index.php");
}

?>
````  
* template.controller.php  

````
<?php
/**
 * 
 * Clase intermediaria entre usuario y app para renderizado del template
 */
class TemplateController
{
    public function controller_template()
    {
        include "Views/template.php";
    }
}
````
* usuarios.controller.php  

````
<?php
/**
 * 
 * Clase intermediaria entre modelo usuarios y vista
 */
class UsuariosController
{
    /**
     * Metodo control para mostrar los usuarios
     * @return array array con todos los usuarios de la tabla
     */
    static public function user_index()
    {
        // Lógica del controlador de usuarios
        $tabla = "usuarios";
        $response = Usuarios::getUsuarios($tabla);
        return $response;

    }

    /**
     * Método control para la inserción de usuarios
     * @param mixed $user Usuario a insertar
     * @return never
     */
    static public function user_insert($user)
    {
        require_once "../Models/usuarios.php";
        Usuarios::insertUsuarios($user);
        header("Location: /Boletin_3/gestion_tienda/index.php");
        exit;


    }
    /**
     * Método control para borrar usuario 
     * @param mixed $id id del usuario a borrar
     * @return never
     */
    static public function delete_user($id){
        require_once "../Models/usuarios.php";
        Usuarios::deleteUuario( $id );
        header("Location: /Boletin_3/gestion_tienda/index.php");
        exit;
    }

    /**
     * Método control para la actualización de datos del usuario
     * @param mixed $id id del usuario a modificar
     * @param mixed $data datos nuevos para actualizar en tabla
     * @return never
     */
    static public function user_update($id, $data){
        require_once "../Models/usuarios.php";
        Usuarios::updateUsuarios($id, $data);
        header("Location: /Boletin_3/gestion_tienda/index.php");
        exit;
    }
}

?>
````  
### Models  
  
* conexion.php  
````
<?php

/**
 * Clase para conectar a BDD MySQL
 */
class Connection
{
    // Declaramos una conexión vacía para controlar si estamos conectados
    private static $conexion = null;

    public static function conexionBD()
    {
        if (self::$conexion === null) {
            $user = "root";
            $pass = "test";
            $host = "db";
            $db = "tienda_online";

            // Conexión a la bd
            self::$conexion = new mysqli($host, $user, $pass, $db);

            // Si la base de datos no existe aún, la creamos y volvemos a conectar
            if (self::$conexion->connect_errno === 1049) { // Error no conoce la BD para solo crear una vez
                require_once "instalar.php";
                $tmp = new mysqli($host, $user, $pass);
                create_database($tmp);
                $tmp->close();

                // Conectamos a la base recién creada
                self::$conexion = new mysqli($host, $user, $pass, $db);
            }

            if (self::$conexion->connect_error) {
                die("Error de conexión: " . self::$conexion->connect_error);
            }
            // Aseguramos que se use utf8mb4 
            self::$conexion->set_charset("utf8mb4");
        }

        return self::$conexion;
    }
}
?>
````  
* instalar.php

````
<?php

/**
 * Función para crear la base de datos tienda_online si no existe
 * @param mixed $conexion //conexion a la base de datos
 * @return void
 */
function create_database($conexion)
{
    try {
        $sql_create_db = "CREATE DATABASE IF NOT EXISTS tienda_online";

        if ($conexion->query($sql_create_db) === TRUE) {
            $conexion->select_db("tienda_online");
        } else {
            echo "Error creando base de datos: " . $conexion->error . "<br>";
        }
    } catch (mysqli_sql_exception $e) {
        $error = $conexion->connect_errno;
        die("Error en la creación de la base de datos: " . $conexion->connect_error . " con el número: " . $error . "<br>");

    }
}
/**
 * Función para crear la tabla de la bd
 * @param mixed $conexion conexión a la bd
 * @return void
 */
function create_table($conexion)
{
    $sql_create_table = "CREATE TABLE IF NOT EXISTS usuarios (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(30) NOT NULL,
        apellidos VARCHAR(100) NOT NULL,
        edad INT(3) NOT NULL,
        provincia VARCHAR(50) NOT NULL
    )";
    try {
        if ($conexion->query($sql_create_table) === false) {
            echo "Error creando tabla: " . $conexion->error . "<br>";
            header("Location: /Boletin_3/gestion_tienda/index.php");
        }

    } catch (mysqli_sql_exception $e) {
        $error = $conexion->connect_errno;
        die("Error en la creación de la tabla: " . $conexion->connect_error . " con el número: " . $error . "<br>");

    }
}

?>
````  
* usuarios.php  

````
<?php
require_once "conexion.php";
/**
 * Clase para los datos y lógica de usuaarios
 */
class Usuarios
{
    /**
     * Función que se conecta a la bd y extrae todos los 
     * usuarios de la bd.
     * @param mixed $tabla Nombre de la tabla a conectarse
     * @return array Array con todos los usuarios
     */
    static public function getUsuarios($tabla)
    {
        $sql = "SELECT * FROM $tabla";
        $resultados = Connection::conexionBD()->query($sql);
        if (!$resultados) {
            error_log("Error en la consulta: " . Connection::conexionBD()->error);
            return [];
        }

        if ($resultados->num_rows > 0) {
            return $resultados->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }
    /**
     * Función que se conecta a la bd y inserta el usuario correspondiente
     * @param mixed $data Datos del usuario a insertar
     * @return void
     */
    static public function insertUsuarios($data)
    {
        $conn = Connection::conexionBD();
        $stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellidos, edad, provincia)
                                VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $data['nombre'], $data['apellidos'], $data['edad'], $data['provincia']);
        $stmt->execute();
        $stmt->close();
    }

    /**
     * Función que se conecta a la bd y borra el usuario correspondiente.
     * @param mixed $id Id del usuario a borrar
     * @return void
     */
    static public function deleteUuario($id)
    {
        $conn = Connection::conexionBD();
        $sql = 'DELETE FROM usuarios WHERE id= ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        if (!$conn->prepare($sql)) {
            die("Error eliminando usuario") . ": " . $conn->error;
        }
        $stmt->execute();
        $stmt->close();

    }

    /**
     * Función que se conecta a la bd y actualiza los datos de la fila correspondiente
     * @param mixed $id Id del usuario a modificar
     * @param mixed $data Datos que va a actualizar
     * @return void
     */
    static public function updateUsuarios($id, $data)
    {
        $conn = Connection::conexionBD();
        $sql = "UPDATE usuarios SET nombre = ?, apellidos = ?, edad = ?, provincia = ? WHERE id=$id";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssis", $data['nombre'], $data['apellidos'], $data['edad'], $data['provincia']);
        $stmt->execute();
        $stmt->close();
    }
}

?>
````  
### Views  
/Modules  
* header.php  

````
<!-- header de nuestra app-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Tienda</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="usuarios">Usuarios</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
````  
* footer.php  
````
<!-- Footer de nuestra app-->
<footer class="footer">
  <p>© 2025 <span class="brand">ÁngelDev</span>. Todos los derechos reservados.</p>
</footer>

<style>
  .footer {
    background: linear-gradient(135deg, #0d47a1, #1976d2);
    color: #fff;
    text-align: center;
    padding: 15px 10px;
    font-family: "Segoe UI", sans-serif;
    font-size: 0.95rem;
    position: fixed;
    bottom: 0;
    width: 100%;
    box-shadow: 0 -2px 10px rgba(0,0,0,0.2);
  }

  .footer .brand {
    font-weight: bold;
    letter-spacing: 0.5px;
    color: #bbdefb;
  }

  .footer p {
    margin: 0;
  }
</style>
````  
/Pages  
* usuarios.php  
````
<!-- Pagina para renderizar nuestros usuarios recuperados de la bd-->
<div class="content p-3" style="min: height 750px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="color: #3149EB">Administración de usuarios</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                Crear nuevo usuario
                            </button>
                            <br>
                        </div>
                        <br>
                        <div class="card-body">
                            <table class="table">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellidos</th>
                                        <th scope="col">Edad</th>
                                        <th scope="col">Provincia</th>
                                        <th scope="col">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($usuarios as $usuario): ?>
                                        <tr>
                                            <td><?= $usuario['id'] ?></td>
                                            <td><?= htmlspecialchars($usuario['nombre']) ?></td>
                                            <td><?= htmlspecialchars($usuario['apellidos']) ?></td>
                                            <td><?= htmlspecialchars($usuario['edad']) ?></td>
                                            <td><?= htmlspecialchars($usuario['provincia']) ?></td>
                                            <td>
                                                <a class="btn btn-warning btn-editar" data-id="<?= $usuario['id'] ?>"
                                                    data-nombre="<?= htmlspecialchars($usuario['nombre']) ?>"
                                                    data-apellidos="<?= htmlspecialchars($usuario['apellidos']) ?>"
                                                    data-edad="<?= htmlspecialchars($usuario['edad']) ?>"
                                                    data-provincia="<?= htmlspecialchars($usuario['provincia']) ?>"
                                                    data-bs-toggle="modal" data-bs-target="#SB">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>



                                                <a class="btn btn-danger"
                                                    href="Controllers/delete.controller.php?id=<?= $usuario['id'] ?>"
                                                    onclick="return confirm('Seguro que quieres borrar este usuario')"><i
                                                        class="fa-solid fa-eraser"></i></a>
                                            </td>
                                        </tr>
                                        <form action="Controllers/data.controller.php" method="post">
                                                        <div class="modal fade" id="SB" data-bs-backdrop="static"
                                                            data-bs-keyboard="false" tabindex="-1"
                                                            aria-labelledby=SB" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="p-3 mb-2 bg-primary text-white"
                                                                        style="text-align: center;">
                                                                        <h5 class="modal-title" id="SBLabel">
                                                                            Actualizar usuario
                                                                        </h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <input type="hidden" name="origen"
                                                                            value="editar_usuario">
                                                                        <div class="input-group mb-3">
                                                                            <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Nombre" name="nombre"
                                                                                aria-label="Nombre"
                                                                                aria-describedby="basic-addon1" 
                                                                                value="<?= htmlspecialchars($usuario['nombre']) ?>"
                                                                                required>
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Apellidos" name="apellidos"
                                                                                aria-label="Apellidos"
                                                                                aria-describedby="basic-addon1"
                                                                                value="<?= htmlspecialchars($usuario['apellidos']) ?>"
                                                                                required>
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                            <input type="number" class="form-control"
                                                                                placeholder="Edad" name="edad"
                                                                                aria-label="Edad"
                                                                                aria-describedby="basic-addon1" 
                                                                                value="<?= htmlspecialchars($usuario['edad']) ?>"
                                                                                required>
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Provincia" name="provincia"
                                                                                aria-label="Provincia"
                                                                                aria-describedby="basic-addon1" 
                                                                                value="<?= htmlspecialchars($usuario['provincia']) ?>"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger"
                                                                            data-bs-dismiss="modal">Cerrar</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Actualizar usuario</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>

                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <form action="Controllers/data.controller.php" method="post">
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="p-3 mb-2 bg-primary text-white" style="text-align: center;">
                        <h5 class="modal-title" id="staticBackdropLabel">Agregar Nuevo Usuario</h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="origen" value="nuevo_usuario">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Nombre" name="nombre"
                                aria-label="Nombre" aria-describedby="basic-addon1" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Apellidos" name="apellidos"
                                aria-label="Apellidos" aria-describedby="basic-addon1" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" placeholder="Edad" name="edad" aria-label="Edad"
                                aria-describedby="basic-addon1" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Provincia" name="provincia"
                                aria-label="Provincia" aria-describedby="basic-addon1" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Agregar usuario</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
````


* template.php  
````
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
````  
  









