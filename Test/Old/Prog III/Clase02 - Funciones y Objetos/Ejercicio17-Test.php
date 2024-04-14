<?php

require_once "Ejercicio17-Auto.php";

// En testAuto.php:
// ● Crear dos objetos “Auto” de la misma marca y distinto color.
// ● Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
// ● Crear un objeto “Auto” utilizando la sobrecarga restante.
// ● Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500
// al atributo precio.
// ● Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el
// resultado obtenido.
// ● Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o
// no.
// ● Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3, 5)

$auto1 = new Auto("Ford", "Negro", 5000, "12/05/2020");
$auto2 = new Auto("Chevrolet", "Gris", 7000);
$auto3 = new Auto("Chevrolet", "Amarillo", 9000);
$auto4 = new Auto("Honda", "Dorado");

echo "<b>Auto 1:</b><br>" . Auto::MostrarAuto($auto1);
echo "<b>Auto 2:</b><br>" . Auto::MostrarAuto($auto2);
echo "<b>Auto 3:</b><br>" . Auto::MostrarAuto($auto3);
echo "<b>Auto 4:</b><br>" . Auto::MostrarAuto($auto4);

echo "<b>Comparo la marca del Auto 1 y 2: </b><br>";
$auto1->EqualsMarca($auto1, $auto2) ? $cadena = "Los autos poseen la misma marca <br><br>" :  $cadena = "Los autos no son de la misma marca<br><br>";
echo $cadena;

echo "<b>Comparo la marca del Auto 2 y 3: </b><br>";
$auto1->EqualsMarca($auto2, $auto3) ? $cadena = "Los autos poseen la misma marca <br><br>" :  $cadena = "Los autos no son de la misma marca<br><br>";
echo $cadena;

echo "<b> Precio de autos con y sin impuestos: </b><br>";
echo "Precio auto 1 sin impuestos: $" . $auto1->_precio . "<br>";
echo "Precio auto 1 con primer impuesto: $" . $auto1->AgregarImpuestos(1500) . "<br><br>";

echo "Precio auto 2 sin impuestos: $" . $auto2->_precio . "<br>";
echo "Precio auto 2 con primer impuesto: $" . $auto2->AgregarImpuestos(1500) . "<br><br>";

echo "Precio auto 3 sin impuestos: $" . $auto3->_precio . "<br>";
echo "Precio auto 3 con primer impuesto: $" . $auto3->AgregarImpuestos(1500) . "<br><br>";

echo "Auto 1 + Auto 2 con primer impuesto: $" . ($auto1->Add($auto1, $auto2));
echo "Auto 2 + Auto 3 con primer impuesto: $" . ($auto1->Add($auto2, $auto3)) . "<br>";
echo "Auto 1 + Auto 2 con segundo impuesto: $" . ($auto1->AgregarImpuestos(1500) + $auto2->AgregarImpuestos(1500)) . "<br><br>";

echo "Precio auto 2 con segundo impuesto: $" . $auto2->AgregarImpuestos(1500) . "<br>";
echo "Auto 2 con segundo impuesto + Auto 3 con primer impuesto: $" . ($auto1->Add($auto2, $auto3)) . "<br>";
