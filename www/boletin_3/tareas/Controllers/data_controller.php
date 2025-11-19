<?php 
/**
 * Función para controlar y filtrar los datos del formulario 
 * @param string $texto Texto que recibe del Post
 * @param mixed $flag Para gestionar si puede ingresar caracteres especiales o números
 * @return array|string|null Texto filtrado 
 */
function filtrar(string $texto, $flag): string {
    $texto = trim($texto);
    if ($flag === 1 ) {
        $texto = strtolower($texto);
        $texto = ucwords($texto);
        $texto = preg_replace("/[0-9]/", '', $texto); // No dejamos ingresar números
    }
    $texto = preg_replace("/\s{2,}/", ' ', $texto);
    $texto = preg_replace("/[^a-zA-Z0-9ñÑ\s]/", '', $texto);
    return $texto;
}

?>