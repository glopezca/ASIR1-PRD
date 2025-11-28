<?php
$notas_manolo = [ 5, 8, 1, 3, 7, 2 ];

// V1
echo "V1\n";
echo "Notas de Manolo:\n";
foreach($notas_manolo as $nota) {
    echo $nota . "\n";
}

// V2
echo "V2\n";
$i = 1;
foreach($notas_manolo as $nota) {
    echo "Examen $i: $nota\n";
    $i = $i + 1;
}

// V3
echo "V3\n";
$i = 1;
foreach($notas_manolo as $nota) {
    echo "Examen " . ($i++) . ": " . $nota . "\n";
}

// V4
echo "V4\n";
foreach($notas_manolo as $i => $nota) {
    echo "Examen " . ($i + 1) . ": " . $nota . "\n";
}

// V5
echo "V5\n";
for($i = 0; $i < count($notas_manolo) ; $i++) {
    echo "Examen " . ($i + 1) . ": " . $notas_manolo[$i] . "\n";
}
?>