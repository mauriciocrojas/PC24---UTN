<?php

/*
Aplicación No 3 (Obtener el valor del medio)
Dadas tres variables numéricas de tipo entero $a, $b y $c realizar una aplicación que muestre
el contenido de aquella variable que contenga el valor que se encuentre en el medio de las tres
variables. De no existir dicho valor, mostrar un mensaje que indique lo sucedido. 
Ejemplo 1: $a = 6; $b = 9; $c = 8; => se muestra 8.
Ejemplo 2: $a = 5; $b = 1; $c = 5; => se muestra un mensaje “No hay valor del medio”
*/

$a = 3;
$b = 4;
$c = 7;
$max = 0;

if ($a > $b && $a > $c) {
    $max = $a;
} else if ($b > $a && $b > $c) {
    $max = $b;
} else if ($c > $a && $c > $b) {
    $max = $c;
}


if ($a < $b && $a < $c) {
    $min = $a;
} else if ($b < $a && $b < $c) {
    $min = $b;
} else if ($c < $a && $c < $b) {
    $min = $c;
}

if ($a == $b || $a == $c || $b == $c) {
    echo "No existe número del medio<br>";
} else {
    echo "El numero más grande es: " . $max . "<br>";
    echo "El numero más chico es: " . $min . "<br>";
}


if($a<$max && $a>$min){
    echo "El numero del medio es: " . $a . "<br>";
}
else if($b<$max && $b>$min){
    echo "El numero del medio es: " . $b . "<br>";
}
else if($c<$max && $c>$min){
    echo "El numero del medio es: " . $c . "<br>";
}

//Forma resumida

if($a > $b && $a <$c){
    echo "El valor del medio es: ".$a;

}else if ($b>$a && $b<$c){
    echo "El valor del medio es: ".$b;

}else if ($c>$a && $c<$b){
    echo "El valor del medio es: ".$c;

}else if ($a == $b || $a == $c || $c == $b){
    echo "No hay valor del medio";
}
