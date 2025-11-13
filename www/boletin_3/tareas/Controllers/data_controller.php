<?php 

function filtrar(string $texto, $flag): string {
    $texto = trim($texto);
    if ($flag === 1 ) {
        $texto = strtolower($texto);
        $texto = ucwords($texto);
        $texto = preg_replace("/[0-9]/", '', $texto);
    }
    $texto = preg_replace("/\s{2,}/", ' ', $texto);
    $texto = preg_replace("/[^a-zA-Z0-9ñÑ\s]/", '', $texto);
    return $texto;
}

?>