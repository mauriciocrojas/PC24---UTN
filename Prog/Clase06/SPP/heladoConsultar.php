<?php

//Mauricio Rojas

require_once "helado.php";

if (isset($_POST["sabor"]) && isset($_POST["tipo"])) {
    $sabor = $_POST["sabor"];
    $tipo = $_POST["tipo"];

    echo Helado::ConsultarTipoySabor($sabor, $tipo);
} else {
    echo "Faltan datos";
}
