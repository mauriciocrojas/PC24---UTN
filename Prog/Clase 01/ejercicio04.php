<?php

/*
Aplicación No 4 (Calculadora)
Escribir un programa que use la variable $operador que pueda almacenar los símbolos
matemáticos: ‘+’, ‘-’, ‘/’ y ‘*’; y definir dos variables enteras $op1 y $op2. De acuerdo al
símbolo que tenga la variable $operador, deberá realizarse la operación indicada y mostrarse el
resultado por pantalla.
*/

$op1 = 4;
$op2 = 0;

$operador = '/';

$operadores = array('+', '-', '/', '*');

foreach ($operadores as $valor) {


    if ($valor == "+") {
        echo "Se realizó la operación de suma entre " . $op1 . " y " . $op2 . " dando como resultado: " . ($op1 + $op2) . "<br>";
    } else if ($valor == "-") {
        echo "Se realizó la operación de resta entre " . $op1 . " y " . $op2 . " dando como resultado: " . ($op1 - $op2) . "<br>";
    } else if ($valor == "*") {
        echo "Se realizó la operación de multiplicación entre " . $op1 . " y " . $op2 . " dando como resultado: " . ($op1 * $op2) . "<br>";
    } else if ($valor == "/") {
        if ($op2 == 0) {
            echo "No se puede dividir por 0 <br>";
        } else {
            echo "Se realizó la operación de división entre " . $op1 . " y " . $op2 . " dando como resultado: " . ($op1 / $op2) . "<br>";
        }
    }
}
