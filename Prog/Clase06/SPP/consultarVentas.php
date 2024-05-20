<?php

//Mauricio Rojas


require_once "helado.php";
require_once "venta.php";

switch ($_GET["accion"]) {
    case "cantidadVentasPorDia":

        if (isset($_GET["fecha"])) {
            echo "Parámetro de fecha utlizado: " . $_GET["fecha"] . "\n";
            echo "Se vendieron en la fecha sumistrada, la siguiente cantidad de helados: ";
            echo Venta::HeladosVendidoPorDia($_GET["fecha"]) . "\n";
        } else {
            echo "No se pasó un parámetro de fecha, se utilizará la fecha del día de ayer\n";
            echo "Se vendieron el día de ayer, la siguiente cantidad de helados: ";
            echo Venta::HeladosVendidoPorDia() . "\n";
        }
        break;
    case "listadoVentasPorUsuario":
        if (isset($_GET["usuario"])) {
            if (!empty(Venta::HeladosVendidosPorUsuario($_GET["usuario"]))) {
                echo "Listado de compras realizadas por el usuario: " . $_GET["usuario"] . "\n";
                Venta::MostrarVentas(Venta::HeladosVendidosPorUsuario($_GET["usuario"]));
            } else {
                echo "Este usuario no realizó compras\n";
            }
        }
        break;
    case "ventasEntreFechas":
        Venta::MostrarVentasEntreFechas("19-05-2024", "22-05-2024");
        break;
    case "listadoVentasPorSabor":
        if (isset($_GET["sabor"])) {
            echo "Listado de compras realizadas de sabor: " . $_GET["sabor"] . "\n";
            Venta::HeladosVendidosPorSabor($_GET["sabor"]);
        } else {
            echo "No se ingresó el sabor a buscar\n";
        }
        break;
    case "listadoVentasDeCucuruchos":

        echo "Listado de compras realizadas de cucuruchos:\n";
        Venta::HeladosVendidoTipoCucurucho();

        break;
}
