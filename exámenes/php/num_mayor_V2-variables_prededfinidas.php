<?php

// V2: variables predefinidas (aunque sería más apropiado usar constantes)

$a = 3;
$b = 15;

echo "Primer número: " . $a . "\n";
echo "Segundo número: " . $b . "\n";

if ($a == $b) {
    echo $a . "y" . $b . "son iguales\n";
} elseif ($a > $b) {
    echo $a . " es mayor que " . $b . "\n";
    if($b == 0) {
        $veces = "infinito";
    } else {
        $veces = $a / $b;
    }
    echo $a . " es $veces veces mayor que " . $b . "\n";
} else { // $a < $b
    echo $a . " es menor que " . $b . "\n";
    if($a == 0) {
        $veces = "infinito";
    } else {
        $veces = $b / $a;
    }
    echo $b . " es $veces veces mayor que " . $a . "\n";
}

?>