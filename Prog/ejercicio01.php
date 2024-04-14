<?php

/*
Aplicación No 1 (Sumar números)
Confeccionar un programa que sume todos los números enteros desde 1 mientras la suma no
supere a 1000. 
Mostrar los números sumados y al finalizar el proceso indicar cuantos números
se sumaron.
*/

$numeros = 0;
$contador = 0;

while ($contador < 1000) {
    $numeros++;
    if ($contador + $numeros >= 1000) {
        echo "Entramos en el if de validación de suma igual o mayor a 1000, se rompe el ciclo";
        $numeros--;
        break;
    } else {
        $contador += $numeros;
        echo "Sumo el numero: " . $numeros . " y obtengo el: " . $contador . "<br>";
    }
}

echo "<br>";
echo "Se sumaron en total: " . $numeros . " números";
