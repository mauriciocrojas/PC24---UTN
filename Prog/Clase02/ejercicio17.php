<?php

/* prueba
Aplicación No 17 (Auto)
Realizar una clase llamada “Auto” que posea los siguientes atributos privados:

_color (String)
_precio (Double)
_marca (String).
_fecha (DateTime)

Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros:

i. La marca y el color.
ii. La marca, color y el precio.
iii. La marca, color, precio y fecha.

Realizar un método de instancia llamado “AgregarImpuestos”, que recibirá un doble por
parámetro y que se sumará al precio del objeto.
Realizar un método de clase llamado “MostrarAuto”, que recibirá un objeto de tipo “Auto”
por parámetro y que mostrará todos los atributos de dicho objeto.
Crear el método de instancia “Equals” que permita comparar dos objetos de tipo “Auto”. Sólo
devolverá TRUE si ambos “Autos” son de la misma marca.
Crear un método de clase, llamado “Add” que permita sumar dos objetos “Auto” (sólo si son
de la misma marca, y del mismo color, de lo contrario informarlo) y que retorne un Double con
la suma de los precios o cero si no se pudo realizar la operación.
Ejemplo: $importeDouble = Auto::Add($autoUno, $autoDos);

En testAuto.php:
● Crear dos objetos “Auto” de la misma marca y distinto color.
● Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
● Crear un objeto “Auto” utilizando la sobrecarga restante.
● Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500
al atributo precio.
● Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el
resultado obtenido.
● Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o
no.
● Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3, 5)

Rojas Mauricio
Ej 17
*/

require_once "ejercicio17-auto.php";

$auto01 = new Auto("Negro", "Ford", 1700, date("d-m-y"));
$auto02 = new Auto("Blanco", "Ford", 2100);
$auto03 = new Auto("Negro", "Ford", 1500);
$auto04 = new Auto("Amarillo", "Toyota", 2400);

//Mostramos los vehículos existentes
echo "Mostramos los vehículos existentes:<br>";
echo Auto::MostrarAuto($auto01);
echo Auto::MostrarAuto($auto02);
echo Auto::MostrarAuto($auto03);
echo Auto::MostrarAuto($auto04);



//Agregamos impuestos a los precios de los vehículos
$auto01->AgregarImpuestos(300);
$auto02->AgregarImpuestos(900);
$auto03->AgregarImpuestos(400);
$auto04->AgregarImpuestos(300);

//Mostramos nuevamente los autos con sus valores actualizados
echo "<br>Agregamos impuestos a los precios de los vehículos y mostramos sus nuevos valores:<br>";
echo Auto::MostrarAuto($auto01);
echo Auto::MostrarAuto($auto02);
echo Auto::MostrarAuto($auto03);
echo Auto::MostrarAuto($auto04);


//Sumamos el valor de auto01 y auto02 (utilizo getters ya que los atributos son privados)
echo "Sumamos el valor de auto01 y auto02: $".($auto01->getPrecio()+$auto02->getPrecio())."<br>";

//Sumamos el valor de auto01 y auto03 con función Add:
$valor01=Auto::Add($auto01,$auto03);
$valor02=Auto::Add($auto01,$auto04);
echo "Sumamos con la función Add el valor de auto01 y auto03, y luego del auto01 y auto04;
 si sus marcas y colores son iguales, retornará la suma, caso contrario 0 <br>
 Valor 01: $". $valor01."<br>Valor 02: $". $valor02."<br>";
//Sumamos el valor de auto01 y auto02 con función Add:


//Comparamos si son de la misma marca el auto01, y el auto02 y auto04 respectivamente 
echo "<br>Comparamos si auto01 y auto02 son de la misma marca:<br>";
if ($auto01->Equals($auto02)) {
    echo "Auto01 y Auto02 son de la misma marca<br>";
} else {
    echo "Auto01 y Auto02 NO son de la misma marca<br>";
}

echo "<br>Comparamos si auto01 y auto04 son de la misma marca:<br>";
if ($auto01->Equals($auto04)) {
    echo "Auto01 y Auto02 son de la misma marca<br>";
} else {
    echo "Auto01 y Auto04 NO son de la misma marca<br>";
}

$autos = array($auto01, $auto02, $auto03, $auto04);

//Auto::MostrarImpares($autos);
