<?php

/*
Aplicación No 7 (Mostrar impares)
Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
Luego imprimir (utilizando la estructura for) cada uno en una línea distinta (recordar que el
salto de línea en HTML es la etiqueta <br/>). Repetir la impresión de los números
utilizando las estructuras while y foreach.
*/

echo "<br> Con For: <br><br>";

$contador = 0;
$impares = array();
$j = 0;


for ($i = 0; $j < 10; $i++) {
    $contador++;

    if ($contador % 2 != 0) {
        $j++;
        $impares[$j] = $contador;
    }
}

foreach ($impares as $valor) {
    echo $valor . "<br>";
}

//
echo "<br> Con While: <br><br>";

$contador = 0;
$impares = array();
$e = 0;

while ($contador < 10) {
    if ($e++ % 2 == 0) {
        $contador++;
        $impares[] = $e;
    }
}

foreach ($impares as $valor) {
    echo $valor . "<br>";
}
