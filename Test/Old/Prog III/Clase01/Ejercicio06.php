<?php

// Aplicación No 6 (Carga aleatoria)
// Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
// función rand). Mediante una estructura condicional, determinar si el promedio de los números
// son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el
// resultado.

// Mauricio Rojas
// Ej 6

$numeros = array(rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10));
$acum = 0;


foreach ($numeros as $num){
    echo $num."<br>";
    $acum += $num;
}

if(($acum / 5) < 6){
    echo "El promedio es menor a 6, y es:". ($acum / 5);
}else if(($acum / 5) > 6){
    echo "El promedio es mayor a 6, y es:". ($acum / 5);
}else{
    echo "El promedio es 6";
}

?>