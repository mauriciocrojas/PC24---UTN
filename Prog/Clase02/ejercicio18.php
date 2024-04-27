<?php

require_once "ejercicio18-garage.php";

// Aplicación No 18 (Auto - Garage)
// Crear la clase Garage que posea como atributos privados:

// _razonSocial (String)
// _precioPorHora (Double)
// _autos (Autos[], reutilizar la clase Auto del ejercicio anterior)
// Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros: 
// i. La razón social.
// ii. La razón social, y el precio por hora.
// Realizar un método de instancia llamado “MostrarGarage”, que no recibirá parámetros y
// que mostrará todos los atributos del objeto.

// Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un
// objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.

// Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage”
// (sólo si el auto no está en el garaje, de lo contrario informarlo).
// Ejemplo: $miGarage->Add($autoUno);
// Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del
// “Garage” (sólo si el auto está en el garaje, de lo contrario informarlo). Ejemplo:
// $miGarage->Remove($autoUno);
// En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos los métodos.

//Creo el garage
$garage = new Garage("Las margaritas", 25);

//Creo los autos
$auto01 = new Auto("Negro", "Ford", 1700, date("d-m-y"));
$auto02 = new Auto("Blanco", "Ford", 2100);

//Agrego el auto01 al garage
$garage->_autos = array($auto01);

//Muestro el garage
echo $garage->MostrarGarage();

//Intento agregar el auto01 al garage
echo "Intento agregar el auto01 al garage:<br>";
echo $garage->Add($auto01);

//Intento agregar el auto01 al garage
echo "Intento agregar el auto02 al garage:<br>";
echo $garage->Add($auto02);

//Muestro el garage con el auto02 agregado
echo "Muestro el garage luego del agregado del auto02:<br>";
echo $garage->MostrarGarage();