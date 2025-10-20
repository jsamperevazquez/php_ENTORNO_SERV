<?php
$tareas = [];

function devolver_tareas(): array {
    global $tareas;
    return $tareas;
}

function filtrar(string $texto): string {
    $texto = trim($texto);
    $texto = strtolower($texto);
    $texto = preg_replace("/\s{2,}/", ' ', $texto);
    $texto = preg_replace("/[^a-zA-Z0-9\s]/", '', $texto);
    return ucfirst($texto);
}

function comprobar_info(string $texto): bool {
    $texto = filtrar($texto);
    return !empty($texto);
}

function guardar_tareas(string $descripcion, string $estado = "pendiente"): bool {
    global $tareas;
    static $id = 1;

    if (!comprobar_info($descripcion)) {
        return false;
    }

    $tareas[] = [
        "id" => $id++,
        "descripcion" => filtrar($descripcion),
        "estado" => $estado
    ];

    return true;
}
?>
