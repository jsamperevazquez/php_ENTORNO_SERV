<?php
$a = 'true';
echo is_bool($a); // No devuelve nada porque php toma false como una cadena vacía
echo is_bool($a ) ? 'true' : 'false'; // Solución

echo "\n";

$b = 0;
echo is_bool($b);
echo is_bool($b) ? 'true' : 'false';
echo "\n";

$c = 'false';
echo gettype($c); // Devulve el tipo de dato
echo "\n";

$d = "";
echo empty($d). "   ";
echo empty($d) ? 'true' : 'false';
echo "\n";

$e = 0.0;
echo empty($e);
echo "\n";

$f = 0;
echo empty($f);
echo "\n";

$g = false;
echo empty($g);
echo "\n";

echo empty($h);
echo "\n";

$i = "0";
echo empty($i);

$j = "0.0";
echo empty($j); 
echo "\n"; 

$k = true;
echo isset($k). "\n";

$l = false;
echo isset($l). "\n";

$m = true;
echo is_numeric($m)."\n";

$n = "";
echo is_numeric($n);
print_r(is_numeric($n));
?>

