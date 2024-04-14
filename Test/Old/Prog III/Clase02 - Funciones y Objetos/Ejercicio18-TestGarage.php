<?php
require_once "Ejercicio18-Garage.php";
require_once "Ejercicio17-Auto.php";
// En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos los métodos.

$miGarage = new Garage("Garage Lola Mora", 500);

$auto1 = new Auto("Ford", "Negro", 5000, "12/05/2020");
$auto2 = new Auto("Chevrolet", "Gris", 7000);
$auto3 = new Auto("Chevrolet", "Amarillo", 9000);
$auto4 = new Auto("Honda", "Dorado");
echo "<b>Auto 1: </b>" . Auto::MostrarAuto($auto1);
echo "<b>Auto 2: </b>" . Auto::MostrarAuto($auto2);
echo "<b>Auto 3: </b>" . Auto::MostrarAuto($auto3);
echo "<b>Auto 4: </b>" . Auto::MostrarAuto($auto4);
echo "<br>";

echo "Muestro el garage: <br>" . $miGarage->MostrarGarage() . "<br>";

echo "Agrego el auto 1 al garage: <br>";
if ($miGarage->Add($auto1)) {
    echo $miGarage->MostrarGarage() . "<br>";
} else {
    echo "El auto ya se encuentra agregado al garage";
}

echo "Agrego el auto 2 al garage: <br>";
if ($miGarage->Add($auto2)) {
    echo $miGarage->MostrarGarage() . "<br>";
} else {
    echo "El auto ya se encuentra agregado al garage<br><br>";
}

echo "Agrego el auto 1 al garage nuevamente: <br>";
if ($miGarage->Add($auto1)) {

    echo $miGarage->MostrarGarage() . "<br><br>";
} else {
    echo "El auto ya se encuentra agregado al garage<br><br>";
}

echo "Agrego el auto 2 nuevamente al garage: <br>";
if ($miGarage->Add($auto2)) {
    echo $miGarage->MostrarGarage() . "<br><br>";
} else {
    echo "El auto ya se encuentra agregado al garage<br><br>";
}

echo "Elimino el auto 2 del garage:<br>";
echo $miGarage->Remove($auto2);

echo "Muestro el garage: <br>" . $miGarage->MostrarGarage() . "<br>";

echo "Intento eliminar el auto 2 del garage nuevamente:<br>";
echo $miGarage->Remove($auto2);
