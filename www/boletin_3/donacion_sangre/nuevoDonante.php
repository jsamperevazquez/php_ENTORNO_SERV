<?php
include_once("database.php");

$origen = $_POST['origen'] ?? '';
$conexion = Database::getConn();
$stmt = $conexion->prepare("INSERT INTO donantes (nombre, apellidos, edad, grupo_sanguineo, codigo_postal, telefono_movil) 
                            VALUES (:nombre, :apellidos, :edad, :grupo_sanguineo, :codigo_postal, :telefono_movil)");

if ($origen === 'nuevo_donante' && $_SERVER["REQUEST_METHOD"] == "POST") {
    $datos = [
        'nombre' => ucfirst($_POST['nombre']),
        'apellidos' => ucwords($_POST['apellidos']),
        'edad' =>  $_POST['edad'],
        'tipo_sangre' => $_POST['g_sanguineo'],
        'codigo_postal' => $_POST['codigo_postal'],
        'telefono_movil' => $_POST['telefono_movil']
    ];
    if (validarDatos($datos)) {
        $stmt->bindParam(':nombre', $datos['nombre']);
        $stmt->bindParam(':apellidos', $datos['apellidos']);
        $stmt->bindParam(':edad', $datos['edad']);
        $stmt->bindParam(':grupo_sanguineo', $datos['tipo_sangre']);
        $stmt->bindParam(':codigo_postal', $datos['codigo_postal']);
        $stmt->bindParam(':telefono_movil', $datos['telefono_movil']);
        $stmt->execute();

        // Redirigir a la página de visualización de datos después de insertar
        echo "<div class='alert alert-success' style='text-align:center;'>Donante guardado correctamente</div>";
        echo '<meta http-equiv="refresh" content="2;url=index.php">'; // Muestro el mensaje y despues de 2 segundos volvemos a index.php

    } else {
        $errores = validarDatos($datos);
        foreach ($errores as $error) {
            echo "<div class='alert alert-danger' style='text-align:center;'>Error: $error</div>";
        }
        echo '<meta http-equiv="refresh" content="3;url=nuevoDonanteForm.php">';
    }
}


    function validarDatos($datos)
    {

        $errores = [];

        // Validar nombre
        if (empty($datos['nombre']) || !preg_match("/^[a-zA-Z\s]+$/", $datos['nombre'])) {
            $errores['nombre'] = "El nombre es obligatorio y solo debe contener letras y espacios.";
        }

        // Validar edad
        if ($datos['edad'] || !filter_var($datos['edad'], FILTER_VALIDATE_INT, ["options" => ["min_range" => 18]])) {
            $errores['edad'] = "La edad debe ser mínimo 18 años.";
        }

        // Validar tipo de sangre
        $tipos_sangre_validos = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
        if (empty($datos['tipo_sangre']) || !in_array($datos['tipo_sangre'], $tipos_sangre_validos)) {
            $errores['tipo_sangre'] = "El tipo de sangre es obligatorio y debe ser uno de los siguientes: " . implode(", ", $tipos_sangre_validos) . ".";
        }
        // Validar código postal
        if (empty($datos['codigo_postal']) || strlen($datos['codigo_postal']) != 5 || !ctype_digit($datos['codigo_postal'])) {
            $errores['codigo_postal'] = "El código postal es obligatorio y debe tener 5 dígitos.";
        }
        //Validar teléfono móvil
        if (empty($datos['telefono_movil'] || !ctype_digit($datos['telefono_movil']) || strlen($datos['telefono_movil']) != 9)) {
            $errores['telefono_movil'] = "El teléfono móvil es obligatorio y debe tener 9 dígitos.";
        }

        if (empty($errores)) {
            return true;
        } else {
            return $errores;
        }
    }

