<?php

require_once "Ejercicio19-Auto.php";

date_default_timezone_set("America/Buenos_Aires");

$auto1 = new Auto("Ford", "Negro", 5000, "12/05/2020");
$auto2 = new Auto("Chevrolet", "Gris", 7000, Date("d/m/Y h:m:s a"));
$auto3 = new Auto("Chevrolet", "Amarillo", 9000);
$auto4 = new Auto("Honda", "Dorado");

echo "<b>Auto 1:</b><br>" . Auto::MostrarAuto($auto1);
echo "<b>Auto 2:</b><br>" . Auto::MostrarAuto($auto2);
echo "<b>Auto 3:</b><br>" . Auto::MostrarAuto($auto3);
echo "<b>Auto 4:</b><br>" . Auto::MostrarAuto($auto4);

$autos = array($auto1, $auto2);

Auto::darDeAltaAuto($autos);

//Auto::leerDesdeArchivo("autos.csv");

echo "<br><b>Lectura desde archivo csv con fgets:</b><br>";
Auto::leerDesdeArchivoConFgets();

echo "<br><b>Lectura desde archivo csv con freads:</b><br>";
Auto::leerDesdeArchivoConFread();


?>