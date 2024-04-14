<?php
/*
Aplicación No 1 (Sumar números)
Confeccionar un programa que sume todos los números enteros desde 1 mientras la suma no
supere a 1000. Mostrar los números sumados y al finalizar el proceso indicar cuantos números
se sumaron.
*/

//Rojas Mauricio 
//EJ 1

	$num = 0;
	$acum = 0;

	while ($acum <= 1000){
		$num++;
		echo $num. "<br>";
		$acum += $num;
	}

	echo "Se sumaron ". $num. " números";
?>