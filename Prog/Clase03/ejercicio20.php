<?php

require_once "ejercicio20-garage.php";
// Aplicación No 20 (Auto - Garage)
// Crear la clase Garage que posea como atributos privados:

// _razonSocial (String)
// _precioPorHora (Double)
// _autos (Autos[], reutilizar la clase Auto del ejercicio anterior)
// Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros: 
// i. La razón social.
// ii. La razón social, y el precio por hora.

// Realizar un método de instancia llamado “MostrarGarage”, que no recibirá parámetros y que
// mostrará todos los atributos del objeto.
// Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un objeto de
// tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.
// Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage” (sólo si el
// auto no está en el garaje, de lo contrario informarlo).
// Ejemplo: $miGarage->Add($autoUno);
// Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del
// “Garage” (sólo si el auto está en el garaje, de lo contrario informarlo). Ejemplo:
// $miGarage->Remove($autoUno);
// Crear un método de clase para poder hacer el alta de un Garage y, guardando los datos en un archivo
// garages.csv.
// Hacer los métodos necesarios en la clase Garage para poder leer el listado desde el archivo
// garage.csv
// Se deben cargar los datos en un array de garage.
// En testGarage.php, 

$garage = new Garage("Las margaritas", 2500);

$auto01 = new Auto("Ford", "Negro", 1700, date("d-m-y"));
$auto02 = new Auto("Ford", "Blanco", 2100);
$auto03 = new Auto("Ford", "Negro", 1500);
$auto04 = new Auto("Toyota", "Amarillo", 2400);

$garage->MostrarGarage();

echo $garage->Equals($auto01) ?  "El auto se encuentra en el garage<br>" :  "El auto no se encuentra en el garage<br>";

echo $garage->Add($auto01) ? "Se agregó el auto al garage<br>" : "El auto ya se encuentra en el garage<br>";
echo $garage->Add($auto01) ? "Se agregó el auto al garage<br>" : "El auto ya se encuentra en el garage<br>";

echo $garage->Remove($auto01) ? "Se eliminó el auto del garage<br>" : "El auto no se encuentra en el garage<br>";
echo $garage->Remove($auto01) ? "Se eliminó el auto del garage<br>" : "El auto no se encuentra en el garage<br>";