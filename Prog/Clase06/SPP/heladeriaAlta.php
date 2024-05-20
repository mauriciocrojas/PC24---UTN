<?php

//Mauricio Rojas

require_once "helado.php";

if (
    isset($_POST["sabor"]) && isset($_POST["precio"]) &&
    isset($_POST["tipo"]) && isset($_POST["stock"]) && isset($_POST["vaso"])
) {
    $sabor = $_POST["sabor"];
    $precio = $_POST["precio"];
    $tipo = $_POST["tipo"];
    $vaso = $_POST["vaso"];
    $stock = $_POST["stock"];

    $helado = Helado::HeladoAlta($sabor, $tipo, $precio, $stock, $vaso);

    echo Helado::GuardarJson($helado) ? "Se guardó el helado en un archivo\n" : "Error al guardar el helado en el archivo\n";

    $ubicacionTemp = $_FILES["file"]["tmp_name"];
    echo Helado::GuardarImagenCargada($ubicacionTemp, $sabor, $tipo) ? "Se guardó la imagen enviada\n" : "No se pudo guardar la imagen enviada\n";
} else {
    echo "Faltan datos";
}
