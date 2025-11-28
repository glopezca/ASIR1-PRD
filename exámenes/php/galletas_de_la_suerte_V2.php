<?php
    
    // V2: con un número entero aleatorio entre 1 y 5 y variables en lugar de constantes (menos adecuado)
    
    // Declaración de variables
    
    $mensajes = [
        "Hoy será un gran día.",
        "Sonríe, algo bueno llegará.",
        "Tu esfuerzo dará fruto.", 
        "Aprende algo nuevo hoy.",
        "Cuidado con las prisas."
    ];
    $indice = random_int(0, 4);

    // Salida por pantalla

    echo $mensajes[$indice] . "\n";
?>