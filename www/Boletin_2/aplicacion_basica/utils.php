<?php
session_start();


if (!isset($_SESSION["tareas"])) {
    $_SESSION["tareas"] = [];
}
if (!isset($_SESSION["ultimo_id"])) {
    $_SESSION["ultimo_id"] = 0;
}
/**
 * Funciones de utilidad para la gestion de tareas.
 */




/**
 * Función para devolver las tareas almacenadas.
 * @return array // Array asiciativo de sesion con las tareas almacenadas.
 */
function devolver_tareas(): array {
    return $_SESSION["tareas"];
}

/**
 * Filtra y limpia el texto de entrada.
 * @param string $texto // Texto a filtrar.
 * @return string // Texto filtrado.
 */
function filtrar(string $texto): string {
    $texto = trim($texto);
    $texto = strtolower($texto);
    $texto = preg_replace("/\s{2,}/", ' ', $texto);
    $texto = preg_replace("/[^a-zA-Z0-9\s]/", '', $texto);
    return ucfirst($texto);
}

/**
 * Comprueba si la información proporcionada es válida.
 * @param string $texto // Texto a comprobar.
 * @return bool // True si es válido, false en caso contrario.
 */
function comprobar_info(string $texto): bool {
    $texto = filtrar($texto);
    return !empty($texto);
}
/**
 * Guarda una nueva tarea en el array de tareas.
 * @param string $descripcion // Descripción de la tarea.
 * @param string $estado // Estado de la tarea (por defecto "pendiente").
 * @return bool // True si se guardó correctamente, false en caso contrario.
 */
function guardar_tareas(string $descripcion, string $estado = "pendiente"): bool {

    static $id = 1;

    if (!comprobar_info($descripcion)) {
        return false;
    }
    $_SESSION["ultimo_id"]++; // Va subiendo el id con la sesion del usuario
    $_SESSION["tareas"][] = [
        "id" => $_SESSION["ultimo_id"],
        "descripcion" => filtrar($descripcion),
        "estado" => $estado
    ];
    
    return true;
}

?>
