<?php

// V1: constantes

define("A", 12);
define("B", 3);

echo "Primer número: " . A . "\n";
echo "Segundo número: " . B . "\n";

if (A == B) {
    echo A . "y" . B . "son iguales\n";
} elseif (A > B) {
    echo A . " es mayor que " . B . "\n";
    if(B == 0) {
        $veces = "infinito";
    } else {
        $veces = A / B;
    }
    echo A . " es $veces veces mayor que " . B . "\n";
} else { // A < B
    echo A . " es menor que " . B . "\n";
    if(A == 0) {
        $veces = "infinito";
    } else {
        $veces = B / A;
    }
    echo B . " es $veces veces mayor que " . A . "\n";
}

?>