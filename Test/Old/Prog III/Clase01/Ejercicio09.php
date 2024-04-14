<?php

// Aplicación No 9 (Arrays asociativos)
// Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que
// contenga como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’. Crear, cargar y mostrar tres
// lapiceras.

// Mauricio Rojas
// Ej 9

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