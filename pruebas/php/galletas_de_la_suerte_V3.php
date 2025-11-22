<?php
    
    // V3: con constantes y un número aleatorio entre 0 y el tamaño del array - 1
    
    // Definición de constantes
    
    define("MSG1", "Hoy será un gran día.");
    define("MSG2", "Sonríe, algo bueno llegará.");
    define("MSG3", "Tu esfuerzo dará fruto.");
    define("MSG4", "Aprende algo nuevo hoy.");
    define("MSG5", "Cuidado con las prisas.");

    // Declaración de variables

    $mensajes = [MSG1, MSG2, MSG3, MSG4, MSG5];
    $indice = array_rand($mensajes);

    // Salida por pantalla

    echo $mensajes[$indice] . "\n";
?>