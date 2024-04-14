<?php

// Aplicación No 10 (Arrays de Arrays)
// Realizar las líneas de código necesarias para generar un Array asociativo y otro indexado que
// contengan como elementos tres Arrays del punto anterior cada uno. Crear, cargar y mostrar los
// Arrays de Arrays.

// Mauricio Rojas
// Ej 10

$indice = 1;

$lapicera = array(
    $lapicera[0] = array("Color" => "Azul", "Marca" => "Bic", "Trazo" => "Fino", "Precio" => 100),
    $lapicera[1] = array("Color" => "Verde", "Marca" => "Parker", "Trazo" => "Grueso", "Precio" => 150),
    $lapicera[2] = array("Color" => "Negra", "Marca" => "Unix", "Trazo" => "Normal", "Precio" => 200)  
);

foreach($lapicera as $lap){
    echo "<b> Lapicera ". $indice++. ":</b><br>";
    echo "Color: ".$lap["Color"]. ", ". "Marca: ". $lap["Marca"]. ", ". "Trazo: ". $lap["Trazo"]. ", ". "Precio: ". $lap["Precio"]."<br><br>";
}

?>