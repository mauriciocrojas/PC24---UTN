<?php
/*
Aplicación No 2 (Mostrar fecha y estación)
Obtenga la fecha actual del servidor (función date) y luego imprímala dentro de la página con
distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
año es. Utilizar una estructura selectiva múltiple.
*/

//Rojas Mauricio 
//EJ 2
    date_default_timezone_set("America/Buenos_Aires");

    $fecha = date("d/m/Y h:m:s a");

    $mes = date("m");
    $dia = date("d");
    echo $fecha."<br>";

    echo "Estación de año:<br>";

    // if($fecha>date("d/m", strtotime("21, 12")) && $fecha<date("d/m", strtotime("20, 3"))){
    //     echo "Verano";
    // }else if($fecha>date("d/m", strtotime("21, 3")) && $fecha<date("d/m", strtotime("20, 6"))){
    //     echo "Otoño";
    // }else if($fecha>date("d/m", strtotime("21, 6")) && $fecha<date("d/m", strtotime("21, 9"))){
    //     echo "Invierno";
    // }else{
    //     echo "Primavera";
    // }

    switch($mes){
        case "01":
            echo "Verano";
            break;
        case "02":
            echo "Verano";
            break;
        case "03":
            if($dia >= 21){
                echo "Otoño";
            }else{
                echo "Verano";
            }
            break;
        case "04":
            echo "Otoño";
            break;
        case "05":
            echo "Otoño";
            break;
        case "06":
            if($dia >= 21){
                echo "Invierno";
            }else{
                echo "Otoño";
            }
            break;
        case "07":
            echo "Invierno";
            break;
        case "08":
            echo "Invierno";
            break;
        case "09":
            if($dia >= 21){
                echo "Primavera";
            }else{
                echo "Invierno";
            } 
            break;
        case "10":
            echo "Primavera";
            break;
        case "11":
            echo "Primavera";
            break;
        case "12":
            if($dia >= 21){
                echo "Verano";
            }else{
                echo "Primavera";
            }    
            break;
    }

?>