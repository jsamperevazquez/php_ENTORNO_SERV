<?php

/**
 * Controlador de tareas.
 *
 * Gestiona las operaciones CRUD relacionadas con las tareas:
 * listar, listar por usuario, insertar, obtener una por ID, actualizar y eliminar.
 */
class TareasController
{

    /**
     * Obtiene todas las tareas existentes.
     *
     * @return array Lista de tareas.
     *
     * @example
     * $tareas = TareasController::index();
     * foreach($tareas as $t){
     *     echo $t['titulo'];
     * }
     */
    public static function index(): array
    {
        $tabla_tareas = 'tareas';
        $response = Tareas::show_all_task($tabla_tareas);
        return $response;
    }

    /**
     * Obtiene todas las tareas asociadas a un usuario concreto.
     *
     * @param int $id_user ID del usuario del que se quieren obtener las tareas.
     * @return array Lista de tareas del usuario (vacía si no tiene).
     *
     * @example
     * $misTareas = TareasController::index_user(7);
     */
    public static function index_user(int $id_user): array
    {
        $tabla_tareas = 'tareas';
        $response = Tareas::show_all_task_user($tabla_tareas, $id_user);
        return $response ?: [];
    }

    /**
     * Inserta una nueva tarea en la base de datos.
     *
     * @param array $task Datos de la tarea. Debe incluir las claves necesarias según el modelo
     *                    (por ejemplo: titulo, descripcion, fecha, id_user...).
     *
     * @return void
     *
     * @example
     * TareasController::insert_task([
     *     'titulo' => 'Comprar material',
     *     'descripcion' => 'Comprar cartuchos de impresora',
     *     'id_user' => 3
     * ]);
     */
    public static function insert_task(array $task): void
    {
        require_once __DIR__ . "/../Models/tareas.php";
        Tareas::insert_task($task);

        echo "<div class='alert alert-success' style='text-align:center;'>Tarea ingresada correctamente</div>";
        echo '<meta http-equiv="refresh" content="2;url=/Boletin_3/tareas/index.php?Pages=home">';
        exit;
    }

    /**
     * Obtiene una única tarea por su ID.
     *
     * @param int $id ID de la tarea.
     * @return array|null Datos de la tarea o null si no existe.
     *
     * @example
     * $tarea = TareasController::get_task(12);
     */
    public static function get_task(int $id): ?array
    {
        $response = Tareas::get_task_id($id);
        return $response;
    }

    /**
     * Actualiza los datos de una tarea existente.
     *
     * @param int   $id   ID de la tarea a actualizar.
     * @param array $data Datos nuevos para la tarea.
     *
     * @return void
     *
     * @example
     * TareasController::update_task(10, [
     *     'titulo' => 'Título actualizado',
     *     'descripcion' => 'Descripción nueva'
     * ]);
     */
    public static function update_task(int $id, array $data): void
    {
        require_once("../Models/tareas.php");
        Tareas::update_task($id, $data);

        echo "<div class='alert alert-success' style='text-align:center;'>Tarea modificada correctamente</div>";
        echo '<meta http-equiv="refresh" content="2;url=/Boletin_3/tareas/index.php?Pages=home">';
        exit;
    }

    /**
     * Elimina una tarea de la base de datos.
     *
     * @param int $id ID de la tarea.
     *
     * @return void
     *
     * @example
     * TareasController::delete_task(4);
     */
    public static function delete_task(int $id): void
    {
        require_once("../Models/tareas.php");
        Tareas::delete_task($id);

        echo "<div class='alert alert-success' style='text-align:center;'>Tarea eliminada correctamente</div>";
        echo '<meta http-equiv="refresh" content="2;url=/Boletin_3/tareas/index.php?Pages=home">';
    }
}
