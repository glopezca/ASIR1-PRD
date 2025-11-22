<?php
    
    // V4: con estructura condicional múltiple (switch)
    
    // Definición de constantes
    
    define("MSG1", "Hoy será un gran día.");
    define("MSG2", "Sonríe, algo bueno llegará.");
    define("MSG3", "Tu esfuerzo dará fruto.");
    define("MSG4", "Aprende algo nuevo hoy.");
    define("MSG5", "Cuidado con las prisas.");

    // Declaración de variables

    $indice = random_int(1, 5);

    // Condicional múltiple (switch)

    switch ($indice) {
        case 1:
            $mensaje = MSG1;
            break;
        case 2:
            $mensaje = MSG2;
            break;
        case 3:
            $mensaje = MSG3;
            break;
        case 4:
            $mensaje = MSG4;
            break;
        case 5:
            $mensaje = MSG5;
            break;
        default:
            $mensaje = "Te has quedado sin galletas de la suerte.";
            break;
    }   
    
    // Salida por pantalla

    echo $mensaje . "\n";
?>