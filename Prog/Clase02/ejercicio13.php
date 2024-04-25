<?php

/*
Aplicación No 13 (Invertir palabra)
Crear una función que reciba como parámetro un string ($palabra) y un entero ($max). La
función validará que la cantidad de caracteres que tiene $palabra no supere a $max y además
deberá determinar si ese valor se encuentra dentro del siguiente listado de palabras válidas:
“Recuperatorio”, “Parcial” y “Programacion”. Los valores de retorno serán:
1 si la palabra pertenece a algún elemento del listado.
0 en caso contrario.

Rojas Mauricio
Ej 13
*/

$palabra = "Parcial"; //7

function Invertir($palabra, $max)
{

    if (strlen($palabra) < $max) {
        echo "La cantidad de caracteres de la palabra es menor a: " . $max . "<br>";
    }

    switch ($palabra) {
        case "Recuperatorio":
        case "Parcial":
        case "Programacion":
            echo "1";
            break;
        default:
            echo "0";
            break;
    }
}
Invertir($palabra, 8);
