<?php
/*
Aplicación No 2 (Mostrar fecha y estación)
Obtenga la fecha actual del servidor (función date) y luego imprímala dentro de la página con
distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
año es. Utilizar una estructura selectiva múltiple.
*/
date_default_timezone_set("America/Argentina/Buenos_Aires");

$fecha = date("d-m-y");

$dia = date("d");
$mes = date("m");


switch ($mes) {
    case "01":
        echo "Estamos en verano<br>";
        break;
    case "02":
        echo "Estamos en verano<br>";
        break;
    case "03":
        if ($dia <= 20)
            echo "Estamos en verano<br>";
        else
            echo "Estamos en otoño<br>";
        break;
    case "04":
        echo "Estamos en otoño<br>";
        break;
    case "05":
        echo "Estamos en otoño<br>";
        break;
    case "06":
        if ($dia <= 20)
            echo "Estamos en otoño<br>";
        else
            echo "Estamos en invierno<br>";
    case "07":
        echo "Estamos en invierno<br>";
        break;
    case "08":
        echo "Estamos en invierno<br>";
        break;
    case "09":
        if($dia <= 20)
        echo "Estamos en invierno<br>";
    else 
        echo "Estamos en primavera";
        break;
    case "10":
        echo "Estamos en primavera<br>";
        break;
    case "11":
        echo "Estamos en primavera<br>";
        break;
    case "12":
        if($dia <= 20)
        echo "Estamos en primavera<br>";
    else
        echo "Estamos en verano<br>";
        break;
    default:
        echo "No reconozco la fecha<br>";
        break;
}
echo "La fecha de hoy es: " . $fecha . "";

