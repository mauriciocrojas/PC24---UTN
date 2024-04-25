<?php

/*
Aplicación No 12 (Invertir palabra)
Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden
de las letras del Array.
Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.

Rojas Mauricio
Ej 12
*/

$palabra = array('H','O','L','A');

function Invertir ($palabra){
    for ($i = count($palabra) - 1 ; $i >= 0; $i--){
echo $palabra[$i];
    }
}

Invertir($palabra);