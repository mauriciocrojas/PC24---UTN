
<?php

//Mauricio Rojas

require_once "helado.php";
require_once "venta.php";

if (isset($_POST["sabor"]) && isset($_POST["tipo"]) && isset($_POST["cantidad"]) && isset($_POST["email"]) && isset($_POST["vaso"])) {
    $sabor = $_POST["sabor"];
    $tipo = $_POST["tipo"];
    $cantidad = $_POST["cantidad"];
    $email = $_POST["email"];
    $vaso = $_POST["vaso"];


    if (Venta::BuscarHeladoParaUsuario($sabor, $tipo, $cantidad)) {
        $usuario = Venta::AltaUsuarioVenta($email, $sabor, $tipo, $cantidad, $vaso);
        echo Helado::GuardarJson($usuario, "ventas.json") ? "Se guardó el listado de ventas\n" : "Error al guardar listado de ventas\n";

        $ubicacionTemp = $_FILES["file"]["tmp_name"];
        echo Venta::GuardarImagenCargada($ubicacionTemp, $sabor, $tipo, $vaso,$email) ? "Se guardó la imagen enviada\n" : "No se pudo guardar la imagen enviada\n";
        
    } else {
        echo "No se realizó la venta\n";
    }
} else {
    echo "Faltan datos";
}
