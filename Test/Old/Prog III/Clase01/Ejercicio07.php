<?php

// Aplicación No 7 (Mostrar impares)
// Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
// Luego imprimir (utilizando la estructura for) cada uno en una línea distinta (recordar que el
// salto de línea en HTML es la etiqueta <br/>). Repetir la impresión de los números utilizando
// las estructuras while y foreach.

// Mauricio Rojas
// Ej 7

$impares = array();
$num = 0;

$indice = 1;

while(count($impares) < 10){
    $num++;
    if($num % 2 != 0){
        $impares[] = $num;
    }
}

foreach ($impares as $valor){
    echo $indice++. ") ". $valor. "<br>";
}
$indice = 1;
echo "<br>";

for ($i = 0; $i < count($impares); $i++){
    echo $indice++. ") ". $impares[$i]. "<br>";
}
$indice = 1;
echo "<br>";

while($indice <= 10){
    echo $indice++. ") ". $impares[$indice-2]. "<br>";
}

?>