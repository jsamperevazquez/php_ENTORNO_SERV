<?php
$numeros_pares = [];
for ($i = 0; $i <= 10; $i++) {
    if ($i % 2 == 0) {
        $numeros_pares[$i] = $i;
    }
}
print_r($numeros_pares);

$v[1] = 90;
$v[10] = 200;
$v['hola'] = 43;
$v[9] = 'e';

foreach ($v as $key => $value) {
    echo $key . ' -> ' . $value . PHP_EOL;
}
?>