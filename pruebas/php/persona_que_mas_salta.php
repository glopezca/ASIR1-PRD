<?php

    // Inicializo las variables

    $max_saltos = ["Ana" => 87, "Luis" => 23, "Jon" => 112, "Martina" => 64,
        "Sebastián" => 96, "Candela" => 81, "Iker" => 79, "Alfonso" => 215, "Laura" => 221
    ];
    $max = 0; // inicializo número máximo de saltos
    $max_nombre = ""; // inicializo el nombre de la persona que más salta

    // Calculo el número máximo de saltos y el nombre de la persona que más salta

    foreach ($max_saltos as $nombre => $num) {
        if ($num > $max) {
            $max = $num;
            $max_nombre = $nombre;
        }
    }

    echo "La persona con más saltos es $max_nombre con $max saltos.\n";

?>