<?php

// V2: con operador ternario "? :"

for($i = 1; $i < 20; $i++) {
    $tipo = ($i % 2 == 0) ? "par" : "impar";
    echo $i . " - " . $tipo . "\n";
}

?>