<?php
    // Declaración de variables

    $notas_alumnos = array(
        "Juan" => 8,
        "María" => 9,
        "Pedro" => 7,
        "Ana" => 10,
        "Luis" => 6
    );
    $entregado_practica = array(
        "Juan" => true,
        "María" => false,
        "Pedro" => true,
        "Ana" => true,
        "Luis" => false
    );

    // Bucle de actualizadión de notas
    foreach ($notas_alumnos as $alumno => $nota) {
        echo "Alumno: $alumno, Nota: $nota\n";
        if ($entregado_practica[$alumno]) {
            $notas_alumnos[$alumno] = min($nota + 1, 10);
            echo "  - Práctica entregada. Nueva nota: " . $notas_alumnos[$alumno] . "\n";
        } else {   
            echo "  - Práctica no entregada. Nota sin cambios.\n";
        }   
    }
?>