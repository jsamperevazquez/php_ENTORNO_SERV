<?php
/**
 * include -> Incluye el contenido de otro archivo php al archivo actual.
 * Si el archivo falla o no existe lanza un warning pero sigue ejecución
 * ------------------------------------------------------------------------
 * require -> Incluye el contenido de otro archivo pero si el archivo no está
 * el programa rompe su ejecución.
 * ---------------------------------------------------------------------------
 * include_once -> Funciona igual que include pero si ya ha sido cargado no vuelve a 
 * cargarlo
 * -----------------------------------------------------------------------------------
 * require_once -> Igual que require pero si ya se cargó con anterioridad no se
 *  vuelve a cargar
 */

$config = include 'config.php';
function comprobar_caracter(string $caracter)
{
    $caracter = trim($caracter);
    if (preg_match_all("/[0123456789]/", $caracter)) {
        return "Caracter: {$caracter}";
    }
}

function longitud_string(string $string): int
{
    return strlen($string);
}

function numero_elevado(int $a, int $b): int
{
    return pow($a, $b);
}

function es_vocal(string $caracter): bool
{
    return (preg_match_all("/[aeiouAEIOU]/", $caracter)) ? true : false;
}

function par_impar(int $num): string
{
    return ($num % 2 == 0) ? "Par" : "Impar";
}

function todo_mayuscula(string $cadena): string
{
    return strtoupper($cadena);
}

function zona_hora(): void
{
    date_default_timezone_set('Europe/Madrid');
    echo date_default_timezone_get();
}

function hora_salepone_sol()
{
    global $config;
    date_default_timezone_set($config['timezone']);
    $lat = $config['latitude'];
    $long = $config['longitude'];
    $info = date_sun_info(time(), $lat, $long);
    echo 'Amanece en Vigo: ' . date('H:i', $info['sunrise']) . ' Y se pone el sol: ' . date('H:i', $info['sunset']) . PHP_EOL;
}


echo comprobar_caracter("7") . PHP_EOL;
echo 'El string envidado tiene ' . longitud_string("En un lugar de la Mancha") . ' caracteres' . PHP_EOL;
echo numero_elevado(2, 3) . PHP_EOL;
echo es_vocal("a") . PHP_EOL;
echo par_impar(5) . PHP_EOL;
echo todo_mayuscula("este texto va a ser mayuscula") . PHP_EOL;
echo zona_hora() . PHP_EOL;
echo hora_salepone_sol() . PHP_EOL;

// TAREA 2 DNI

function comprobar_nif(string $nif): bool
{
    $dni_letters = str_split('TRWAGMYFPDXBNJZSQVHLCKE'); //Uso los indices del array como posición de la letra

    $nif = strtoupper(trim($nif));

    // Compruebo formato: 8 números + 1 letra
    if (!preg_match('/^[0-9]{8}[A-Z, a-z]$/', $nif)) {
        return false;
    }

    // Separo número y letra
    $num_dni = intval(substr($nif, 0, 8));
    $letter = strtoupper(substr($nif, 8));

    // Compruebo que la letra sea la correcta
    return $letter === $dni_letters[$num_dni % 23];
}
?>
