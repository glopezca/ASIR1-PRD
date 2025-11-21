<?php
// Array indexado
$nombres = ["Ana", "Luis", "Marta"];
echo "Primer nombre: " . $nombres[0] . "\n";

// Recorrido tipo foreach
foreach ($nombres as $n) {
    echo "Hola $n\n";
}

// Array asociativo

$edades = ["Ana" => 20, "Luis" => 22];
echo "Edad de Luis: " . $edades["Luis"] . "\n"; 
foreach ($edades as $nombre => $edad) {
    echo "$nombre tiene $edad años.\n";
}
?>