<?php

require_once "ejercicio19-auto.php";
// Alumno: Mauricio Rojas
// Parte 5 - Ejercicios con POO + Archivos
// Aplicación No 19 (Auto)

// Realizar una clase llamada “Auto” que posea los siguientes atributos privados: 
// _color (String)
// _precio (Double)
// _marca (String).
// _fecha (DateTime)

// Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros: 
// i. La marca y el color.
// ii. La marca, color y el precio.
// iii. La marca, color, precio y fecha.

// Resuelto en ejercicios anteriores //
// Realizar un método de instancia llamado “AgregarImpuestos”, que recibirá un doble por
// parámetro y que se sumará al precio del objeto.
// Realizar un método de clase llamado “MostrarAuto”, que recibirá un objeto de tipo “Auto” por
// parámetro y que mostrará todos los atributos de dicho objeto.
// Crear el método de instancia “Equals” que permita comparar dos objetos de tipo “Auto”. Sólo devolverá
// TRUE si ambos “Autos” son de la misma marca.
// Crear un método de clase, llamado “Add” que permita sumar dos objetos “Auto” (sólo si son de la
// misma marca, y del mismo color, de lo contrario informarlo) y que retorne un Double con la suma de los
// precios o cero si no se pudo realizar la operación.
// Ejemplo: $importeDouble = Auto::Add($autoUno, $autoDos);
// ● Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o no.
// Se deben cargar los datos en un array de autos.
// En testAuto.php:
// ● Crear dos objetos “Auto” de la misma marca y distinto color.
// ● Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio. ● Crear
// un objeto “Auto” utilizando la sobrecarga restante.
// ● Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500 al
// atributo precio.
// ● Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el
// resultado obtenido.
// Resuelto en ejercicios anteriores //

// Crear un método de clase para poder hacer el alta de un Auto, guardando los datos en un archivo
// autos.csv.
// Hacer los métodos necesarios en la clase Auto para poder leer el listado desde el archivo
// autos.csv
// ● Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3, 5)


$auto01 = new Auto("Ford", "Negro", 1700, date("d-m-y"));
$auto02 = new Auto("Ford", "Blanco", 2100);
$auto03 = new Auto("Ford", "Negro", 1500);
$auto04 = new Auto("Toyota", "Amarillo", 2400);

//Muestro un auto
echo "Muestro un auto:<br>";
echo Auto::MostrarAuto($auto01);

//Muestro todos los autos
$autos = array($auto01, $auto02, $auto03, $auto04);
echo "Muestro todos los autos:<br>";
echo Auto::MostrarAutos($autos);

//Muestro impares
echo "Muestro autos con índice impar:<br>";
echo Auto::MostrarImpares($autos);

//Doy de alta un auto en un archivo csv
echo "Alta de un auto en un archivo csv:<br>";
//Auto::AltaAuto("Gris", 1700, "Honda", "01-02-2024"); --Forma dando de alta el auto desde 0
echo Auto::AltaAutoIndividual($auto01) ? "Alta exitosa<br><br>" : "No se pudo dar de alta <br><br>";

//Doy de alta un array de autos en un archivo csv
echo "Alta de un array de autos en un archivo csv:<br>";
echo Auto::AltaAutoArray($autos) ? "Alta exitosa<br><br>" : "No se pudo dar de alta <br><br>";




//Leo los archivos previamente generados
echo "Leo archivo csv indivual:<br>";
Auto::LeerArchivo("ejercicio19-autoIndividual.csv");

echo "Leo archivo csv que contiene un array:<br>";
Auto::LeerArchivo("ejercicio19-autosArray.csv");

