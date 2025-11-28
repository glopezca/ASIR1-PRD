<?php

// Declaración de variables

$max_saltos = [
  "Ana" => 87, "Luis" => 23, "Jon" => 112, "Martina" => 64,
  "Sebastián" => 96, "Candela" => 81, "Iker" => 79, "Alfonso" => 215, "Laura" => 221
];
$max = 0; // inicializa la variable $max a 0

// Bucle para encontrar el máximo número de saltos

foreach($max_saltos as $nombre => $num) { // bucle que recorre el array de saltos máximos por alumno, asignando en cada iteración el nombre de cada alumno  a la variable $nombre y su número de saltos a la variable $num
    if($num > $max) { // si el números de saltos de ese alumno ($num) es mayor que $max
        $max = $num; // asigna a $max ese número de saltos
    }
}
echo $max . "\n"; // vuelca por pantalla el valor de $max, que es el número máximo de saltos conseguidos por un alumno

?>