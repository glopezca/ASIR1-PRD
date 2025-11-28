<?php

    // V1: calculando a mano la suma y el número de notas

    // Inicializo variables

    $notas_manolo = [5, 8, 1, 3, 7, 2];
    $total = 0;
    $num_notas = 0;
    $media = 0;
    
    // Calculo el número de notas y la suma de las notas

    foreach($notas_manolo as $nota) {
        $num_notas = $num_notas + 1;
        $total = $total + $nota;
    }

    // Calculo la media

    $media = $total / $num_notas;

    if ($media >= 5) {
        echo "Manolo ha aprobado (media: " . $media . ")\n";
    } else {
        echo "Manolo ha suspendido (media: " . $media . ")\n";
    }
    
?>
