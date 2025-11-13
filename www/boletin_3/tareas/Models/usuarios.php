<?php
require_once("conexionPDO.php");

class usuarios
{

    public static function show_all_usuarios($tabla) {
        $conn = ConnectionPDO::get_connect();
        $sql_select = "SELECT * FROM $tabla";
        $stmt = $conn->prepare($sql_select);
        $stmt->execute();
        $usuarios = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        if(!$usuarios){
            error_log("Error en la consulta: ". $stmt ->errorCode());
            return [];
        }
        if (count($usuarios) > 0) {
            return $usuarios;
        }else{
            return [];
        }
       
        
    }

    public static function insert_users($data)
    {

        try {
            $sql_insert = "INSERT INTO usuarios (username, nombre, apellidos, contrasena) VALUES (:username, :nombre, :apellidos, :password)";
            $conn = ConnectionPDO::get_connect();
            $stmt = $conn->prepare($sql_insert);
            $stmt->bindParam(':username', $data['username']);
            $stmt->bindParam(':nombre', $data['nombre']);
            $stmt->bindParam(':apellidos', $data['apellidos']);
            $stmt->bindParam(':password', $data['password']);
            $stmt->execute(
                [
                    ':username' => $data['username'],
                    ':nombre' => $data['nombre'],
                    ':apellidos' => $data['apellidos'],
                    ':password' => $data['password']
                ]
            );
        } catch (Exception $e) {
            die('❌ Error al insertar: ' . $e->getMessage());
        } finally {
            $conn = null;
        }
    }

    public static function get_user_id($id){
        $sql_select = "SELECT * FROM usuarios WHERE id = :id";
        $conn = ConnectionPDO::get_connect();
        $stmt = $conn->prepare($sql_select);
        $stmt->execute(['id' => $id]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        return $usuario ?: null;

    }
    public static function update_user($id, $data){
        $sql_update = "UPDATE usuarios SET username = :username, nombre = :nombre, apellidos = :apellidos, contrasena = :password WHERE id = :id ";
        $conn = ConnectionPDO::get_connect();
        $stmt = $conn->prepare($sql_update);
        $stmt->execute([
            ":id" => $id,
            ":username" => $data['username'],
            ":nombre" => $data['nombre'],
            ":apellidos" => $data['apellidos'],
            ":password" => $data['password']
        ]
        );
    }
    public static function delete_user($id){
        $sql_deltete = "DELETE FROM usuarios WHERE id = :id ";
        $conn = ConnectionPDO::get_connect();
        $stmt = $conn -> prepare($sql_deltete);
        $stmt -> execute(
            [
                ":id" => $id
            ]
            );
    }
}
