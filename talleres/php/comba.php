<?php
// Programa que simula saltos a la comba

$salida = random_int(0, 100); // Variable que me marca la salida del bucle: me he tropezado saltando

$cancion = ["una", "dola", "tela", "catola", "quila","quilete", "estaba", "la reina", "en su", "gabinete", "vino", "Gil", "rompió", "el candil", "candil", "candilón", "cuéntalas", "bien", "que las 20", "son", "¡allá vamos!"];
$num_palabras = count($cancion);

for ($salto = 0; $salto <= $salida; $salto++) {

    if($salto < $num_palabras) {
        echo $cancion[$salto] . "\n";
    } else {
        echo ($salto - $num_palabras + 1) . "\n";
    }
}

echo "¡Has terminado de saltar la comba!\n";
?>