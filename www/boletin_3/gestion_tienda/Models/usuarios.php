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
        $resultados = ConnectionMYSQLi::conexionBD()->query($sql);
        if (!$resultados) {
            error_log("Error en la consulta: " . ConnectionMYSQLi::conexionBD()->error);
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
        $conn = ConnectionMYSQLi::conexionBD();
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
        $conn = ConnectionMYSQLi::conexionBD();
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
        $conn = ConnectionMYSQLi::conexionBD();
        $sql = "UPDATE usuarios SET nombre = ?, apellidos = ?, edad = ?, provincia = ? WHERE id=$id";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssis", $data['nombre'], $data['apellidos'], $data['edad'], $data['provincia']);
        $stmt->execute();
        $stmt->close();
    }
}

?>