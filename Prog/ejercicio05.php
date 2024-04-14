<?php

/*
Aplicación No 5 (Números en letras)
Realizar un programa que en base al valor numérico de una variable $num, pueda mostrarse
por pantalla, el nombre del número que tenga dentro escrito con palabras, para los números
entre el 20 y el 60.
Por ejemplo, si $num = 43 debe mostrarse por pantalla “cuarenta y tres”.
*/

$num = array (
20 => 'Veinte',
21 => 'Veintiuno',
22 => 'Veintidós',
23 => 'Veintitrés',
24 => 'Veinticuatro',
25 => 'Veinticinco',
26 => 'Veintiséis',
27 => 'Veintisiete',
28 => 'Veintiocho',
29 => 'Veintinueve',
30 => 'Treinta',
31 => 'Treinta y uno',
32 => 'Treinta y dos',
33 => 'Treinta y tres',
34 => 'Treinta y cuatro',
35 => 'Treinta y cinco',
36 => 'Treinta y seis',
37 => 'Treinta y siete',
38 => 'Treinta y ocho',
39 => 'Treinta y nueve',
40 => 'Cuarenta',
41 => 'Cuarenta y uno',
42 => 'Cuarenta y dos',
43 => 'Cuarenta y tres',
44 => 'Cuarenta y cuatro',
45 => 'Cuarenta y cinco',
46 => 'Cuarenta y seis',
47 => 'Cuarenta y siete',
48 => 'Cuarenta y ocho',
49 => 'Cuarenta y nueve',
50 => 'Cincuenta',
51 => 'Cincuenta y uno',
52 => 'Cincuenta y dos',
53 => 'Cincuenta y tres',
54 => 'Cincuenta y cuatro',
55 => 'Cincuenta y cinco',
56 => 'Cincuenta y seis',
57 => 'Cincuenta y siete',
58 => 'Cincuenta y ocho',
59 => 'Cincuenta y nueve',
60 => 'Sesenta');

foreach ($num as $entero => $string) {
echo $entero .": ". $string ."<br>";
}


