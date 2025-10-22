<?php

/**
 * Funciones de utilidad para la gestion de tareas.
 */

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
    return $texto;
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


?>
