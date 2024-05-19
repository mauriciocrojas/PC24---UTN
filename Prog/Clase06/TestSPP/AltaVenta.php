<?php

// 3-a
// a- (1 pts.) AltaVenta.php: (por POST) se recibe el email del usuario y el Sabor, Tipo y Stock, si el ítem existe en
// heladeria.json, y hay stock, guardar en la base de datos (con la fecha, número de pedido y id autoincremental).
// Se debe descontar la cantidad vendida del stock.

// b- (1 pt) Completar el alta de la venta con imagen de la venta (ej:una imagen del usuario), guardando la imagen
// con el sabor+tipo+vaso+mail(solo usuario hasta el @) y fecha de la venta en la carpeta
// /ImagenesDeLaVenta2024.

class AltaVenta{

    public $mail;
    public $sabor;
    public $tipo;
    public $stock;
    public $numeroPedido;
    public $Id;
    public $fecha;
    public static $ventas = array();
    public static $rutaArchivo = "ventas.json"; 
    public static function SaleMade($mailUsuario, $saborUsuario, $tipoUsuario, $cantidadSolicitada){
        
    }

    //Chequear (sin terminar)
    public static function SearchIceCreamForUser($saborUsuario, $tipoUsuario, $cantidadSolicitada, $helados)
    {
        $cadena = '';
        foreach ($helados as $helado) {
            if ($helado["sabor"] == $saborUsuario && $helado["tipo"] = $tipoUsuario && $helado["stock"] >= $cantidadSolicitada) {
                $cadena = "Vendido";
                break;
            } else {
                $cadena = "No existe un helado de este tipo o sabor, o no hay stock\n";
            }
        }
        echo $cadena;
    }

    public static function SaveIceCreamInJson($ventas)
    {
        $contenido = json_encode($ventas, JSON_PRETTY_PRINT);
        file_put_contents(self::$rutaArchivo, $contenido);
    }

}