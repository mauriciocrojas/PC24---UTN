<?php

/*
Aplicación No 6 (Carga aleatoria)
Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
función rand). Mediante una estructura condicional, determinar si el promedio de los números
son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el
resultado.
*/

$contador = 0;
$suma = 0;
$promedio = 0;

$elementos = array(
    $elementoUno = rand(4, 8),
    $elementoDos = rand(4, 8),
    $elementoTres = rand(4, 8),
    $elementoCuatro = rand(4, 8),
    $elementoCinco = rand(4, 8)
);

foreach ($elementos as $elemento) {
    $contador++;
    $suma+=$elemento;
    echo "El valor del elemento " . $contador . " es " . $elemento . "<br>";
}

echo "La suma es: ". $suma. "<br>";

//echo $contador. "<br>". $suma. "<br>";
$promedio = $suma / $contador;

if ($promedio > 6) {
    echo "El promedio es mayor a 6, y es: " . $promedio . "<br>";
} else if ($promedio < 6) {
    echo "El promedio es menor a 6, y es: " . $promedio . "<br>";
} else {
    echo "El promedio es: " . $promedio . "<br>";
}