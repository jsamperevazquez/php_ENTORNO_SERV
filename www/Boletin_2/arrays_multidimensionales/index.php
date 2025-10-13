<?php
$perosnas = [
    "John" => ["email" => "jhon@demo.com", "website" => "www.john.com", "age" => 22, "password" => "pass"],
    "Anna" => ["email" => "anna@demos.com", "website" => "www.anna.com", "age" => 24, "password" => "pass"],
    "Peter" => ["email" => "peter@mail.com", "website" => "www.peter.com", "age" => 42, "password" => "pass"],
    "Max" => ["email" => "max@mail.com", "website" => "www.max.com", "age" => 33, "password" => "pass"]
];
// Recorremos el array
foreach ($perosnas as $nombre => $datos) {
    echo "Nombre: $nombre" . PHP_EOL;
    echo "Email: {$datos['email']}" . PHP_EOL;
    echo "Website: {$datos['website']}" . PHP_EOL;
    echo "Edad: {$datos['age']}\n\n";
}

?>