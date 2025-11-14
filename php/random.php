<?php
// Ejemplo: Generar números aleatorios en PHP

echo "Generando 5 números aleatorios:\n";
for ($i = 0; $i < 5; $i++) {
    echo random_int(0, 32767) . "\n";
}

// Generar un número aleatorio entre 1 y 100
echo "\nNúmero aleatorio entre 1 y 100:\n";
echo random_int(1, 100) . "\n";
?>