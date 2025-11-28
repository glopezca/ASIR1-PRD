<?php

    // V2: con funciones array_sum(), count() y round()

    $notas_manolo = [5, 8, 1, 3, 7, 2];
    $total = array_sum($notas_manolo);
    $num_notas = count($notas_manolo);
    $media = $total / $num_notas;

    if ($media >= 5) {
        echo "Manolo ha aprobado (media: " . round($media,2) . ")\n";
    } else {
        echo "Manolo ha suspendido (media: " . round($media,2) . ")\n";
    }
?>
