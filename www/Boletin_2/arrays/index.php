<?php
$numeros_pares = [];
for ($i = 0; $i <= 10; $i++) {
    if ($i % 2 == 0) {
        $numeros_pares[$i] = $i;
    }
}
print_r($numeros_pares);
?>