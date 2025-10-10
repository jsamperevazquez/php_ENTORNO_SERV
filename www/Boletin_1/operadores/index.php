<?php
// Primero cambiar de F a ºC
$gradosFarenheit = 37;
$gradosCelsius = number_format(($gradosFarenheit - 32) * 5 / 9, 3);
echo "{$gradosFarenheit} grados Farenheit son {$gradosCelsius} grados Celius";

// Segundo operaciones con variables
// primera versión con variables intermedias
$x = 20;
$y = 10;
$suma = $x + $y;
$resta = $x - $y;
$multiplicacion = $x * $y;
$division = $x / $y;
$moudulo = $x % $y;
echo "
        La suma de x e y es {$suma} 
        La resta de x e y es {$resta}
        La multiplicación de x e y es {$multiplicacion}
        La division de x e y es {$division}
        el modulo de x e y es {$moudulo} 
    ";

// Segunda versión sin variables intermedias
echo " 
     La suma de x e y es " . ($x + $y) . "\n" .
    "La resta de x e y es " . ($x - $y) . "\n" .
    "La multiplicación de x e y es " . ($x * $y) . "\n" .
    "La división de x e y es " . ($x / $y) . "\n" .
    "El módulo de x e y es " . ($x % $y) . "\n";

// Tercero imprime el cuadrado de los 30 primeros números naturales
for ($i = 0; $i <= 30; $i++) {
    echo "El cuadrado de {$i} es " . (pow($i, 2)) . "\n";
}
// Cuarto programa para mostrar Área y perímetro de rectángulo
$base = 20;
$altura = 10;
echo "El área del triángulo es " . ($base * $altura / 2). "\n".
     "El perímetro del triángulo es ". (2 * $base + 2 * $altura);
?>