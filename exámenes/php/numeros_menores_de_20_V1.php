<?php

// V1: con if-else

for($i = 1; $i < 20; $i++) {
    if($i % 2 == 0) { // par
        $tipo = "par";
    } else { // impar
        $tipo = "impar";
    }
    echo $i . " - " . $tipo . "\n";
}

?>