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

$palabra = "Parcial";
$max = 8;

function tope($palabra, $max)
{

    $rta = "";

    if (strlen($palabra) < $max) {

        $lista = array("Recuperatorio", "Parcial", "Programacion");

        foreach ($lista as $dato) {
            if ($palabra == $dato) {
                $rta = "1. La palabra se encuentra en el listado";
                return $rta;
            } else {
                $rta = "0. La palabra no se encuentra en el listado";
            }
        }
    } else {
        $rta = "La palabra es mayor al máximo permitido";;
    }
    return $rta;
}

echo tope($palabra, $max);
