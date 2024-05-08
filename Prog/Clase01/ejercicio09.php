<?php

/*
Aplicación No 9 (Arrays asociativos)
Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que
contenga como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’. Crear, cargar y mostrar tres
lapiceras.
*/


//Con arrays individuales:

$lapiceraNegra = array(
    "Color" => "Negro",
    "Marca" => "Bic",
    "Trazo" => "Fino",
    "Precio" => 25
);

$lapiceraAzul = array(
    "Color" => "Azul",
    "Marca" => "Parker",
    "Trazo" => "Grueso",
    "Precio" => 20
);

$lapiceraVerde = array(
    "Color" => "Verde",
    "Marca" => "MyM",
    "Trazo" => "Medio",
    "Precio" => 15
);

echo "Primer lapicera:<br>";
foreach ($lapiceraNegra as $key => $valor) {
    echo $key . ": " . $valor . "<br>";
}
echo "<br>";

echo "Segunda lapicera:<br>";
foreach ($lapiceraAzul as $key => $valor) {
    echo $key . ": " . $valor . "<br>";
}
echo "<br>";

echo "Tercer lapicera:<br>";
foreach ($lapiceraVerde as $key => $valor) {
    echo $key . ": " . $valor . "<br>";
}



//Con Arrays dentro de Arrays (Ejercicio 10)

$lapiceras = array(

    $lapiceraNegra = array(
        "Color" => "Negro",
        "Marca" => "Bic",
        "Trazo" => "Fino",
        "Precio" => 25
    ),

    $lapiceraAzul = array(
        "Color" => "Azul",
        "Marca" => "Parker",
        "Trazo" => "Grueso",
        "Precio" => 20
    ),

    $lapiceraVerde = array(
        "Color" => "Verde",
        "Marca" => "MyM",
        "Trazo" => "Medio",
        "Precio" => 15
    )
);

foreach ($lapiceras as $indice => $lapicera) {
    echo "<br>Lapicera ". ++$indice . ": <br>";
    echo "Color: " . $lapicera['Color'] . "<br>";
    echo "Marca: " . $lapicera['Marca'] . "<br>";
    echo "Trazo: " . $lapicera['Trazo'] . "<br>";
    echo "Precio: $" . $lapicera['Precio'] . "<br>";
    echo "<br>";
}