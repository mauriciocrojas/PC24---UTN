<?php

//Mauricio Rojas

require_once "helado.php";
date_default_timezone_set('America/Argentina/Buenos_Aires');

class Venta
{

    public $id;
    public $numeroVenta;
    public $email;
    public $sabor;
    public $tipo;
    public $cantidadSolicitada;
    public $fecha;

    public $vaso;

    public function SetEmail($email)
    {
        if (isset($email) && is_string($email)) {
            $this->email = $email;
        }
    }
    public function SetSabor($sabor)
    {
        if (isset($sabor) && is_string($sabor)) {
            $this->sabor = $sabor;
        }
    }
    public function SetTipo($tipo)
    {
        if (isset($tipo) && is_string($tipo)) {
            $this->tipo = $tipo;
        }
    }

    public function SetVaso($vaso)
    {
        if (isset($vaso) && is_string($vaso)) {
            $this->vaso = $vaso;
        }
    }
    public function SetCantidadSolicitada($cantidadSolicitada)
    {
        if (isset($cantidadSolicitada) && is_numeric($cantidadSolicitada)) {
            $this->cantidadSolicitada = $cantidadSolicitada;
        }
    }

    public function SetId($id)
    {
        if (isset($id) && is_numeric($id)) {
            $this->id = $id;
        }
    }

    public function SetNumeroVenta($numeroVenta)
    {
        if (isset($numeroVenta) && is_numeric($numeroVenta)) {
            $this->numeroVenta = $numeroVenta;
        }
    }
    public static function AltaUsuarioVenta($email, $sabor, $tipo, $cantidadSolicitada, $vaso)
    {
        $listaVentas = array();

        $listaVentas = Helado::ObtenerContenidoDelArchivo("ventas.json");

        $venta = new Venta();
        $venta->SetEmail($email);
        $venta->SetVaso($vaso);
        $venta->SetSabor($sabor);
        $venta->SetTipo($tipo);
        $venta->SetCantidadSolicitada($cantidadSolicitada);
        $venta->SetId(count($listaVentas) + 1);
        $venta->SetNumeroVenta(rand(1000, 5000));
        $venta->fecha = date("d-m-Y H:i:s");

        array_push($listaVentas, $venta);

        return $listaVentas;
    }

    public static function BuscarHeladoParaUsuario($sabor, $tipo, $cantidadSolicitada)
    {
        $listaHelados = Helado::ObtenerContenidoDelArchivo();
        $cadena = '';
        $bool = false;
        foreach ($listaHelados as $helado) {
            if ($helado["sabor"] == $sabor && $helado["tipo"] == $tipo && $helado["stock"] >= $cantidadSolicitada) {
                $cadena = "Hay stock del sabor y tipo solicitado, se realiza la venta\n";
                //$helado["stock"] = $helado["stock"] - $cantidadSolicitada;
                $indice = array_search($helado, $listaHelados);
                $listaHelados[$indice]["stock"] = $helado["stock"] - $cantidadSolicitada;
                Helado::guardarJson($listaHelados);
                $cadena .= "El nuevo stock es de: " .  $listaHelados[$indice]["stock"] . "\n";
                $bool = true;
                break;
            } else if ($helado["sabor"] == $sabor && $helado["tipo"] == $tipo && $helado["stock"] < $cantidadSolicitada) {
                $cadena = "No hay stock del helado solicitado\n";
                $bool = false;
                break;
            } else {
                $bool = false;
                $cadena = "No existe un helado de este tipo o sabor\n";
            }
        }

        echo $cadena;

        return $bool;
    }

    public static function GuardarImagenCargada($ubicacionTemp, $sabor, $tipo, $vaso, $email)
    {
        if (isset($ubicacionTemp)) {
            $nombreCarpeta = "ImagenesDeVentas2024/";
            $destino =  $nombreCarpeta . $sabor . $tipo . $vaso . explode('@', $email)[0] . date("d-m-Y") . ".jpg";



            //Si la carpeta no está creada, la crea
            //Si ya existe, saltea el if
            if (!is_dir($nombreCarpeta)) {
                mkdir($nombreCarpeta, 0777);
            }

            return move_uploaded_file($ubicacionTemp, $destino) ? true : false;
        } else {
            return false;
        }
    }



    public static function HeladosVendidoPorDia($fecha = "19-05-2024")
    {

        $listaVentas = array();

        $listaVentas = Helado::ObtenerContenidoDelArchivo("ventas.json");
        $cantidad = 0;

        foreach ($listaVentas as $venta) {
            if (explode(" ", $venta["fecha"])[0] == $fecha) {
                $cantidad += $venta["cantidadSolicitada"];
            }
        }
        return $cantidad;
    }

    public static function HeladosVendidosPorUsuario($usuario)
    {

        $listaVentas = array();

        $listaVentas = Helado::ObtenerContenidoDelArchivo("ventas.json");

        $listaUsuarios = array();

        foreach ($listaVentas as $venta) {
            if ($venta["email"] == $usuario) {
                array_push($listaUsuarios, $venta);
            }
        }
        return $listaUsuarios;
    }

    
    public static function HeladosVendidosPorSabor($sabor)
    {

        $listaVentas = array();

        $listaVentas = Helado::ObtenerContenidoDelArchivo("ventas.json");

        $listaVentasPorSabor = array();

        foreach ($listaVentas as $venta) {
            if ($venta["sabor"] == $sabor) {
                array_push($listaVentasPorSabor, $venta);
            }
        }

        if (Venta::MostrarVentas($listaVentasPorSabor) === false) {
            echo "No existen ventas de ese sabor de helado\n";
        }
    }

    public static function HeladosVendidoTipoCucurucho()
    {

        $listaVentas = array();

        $listaVentas = Helado::ObtenerContenidoDelArchivo("ventas.json");

        $listaVentasPorSabor = array();

        foreach ($listaVentas as $venta) {
            if ($venta["vaso"] == "cucurucho") {
                array_push($listaVentasPorSabor, $venta);
            }
        }

        if (Venta::MostrarVentas($listaVentasPorSabor) === false) {
            echo "No existen ventas de cucuruchos\n";
        }
    }

    public static function MostrarVentas($listaDeVentas)
    {
        if (!empty($listaDeVentas)) {
            foreach ($listaDeVentas as $venta) {
                echo "\nUsuario: " . $venta["email"] .
                    " \nSabor: " . $venta["sabor"] .
                    " \nTipo: " . $venta["tipo"] .
                    " \nCantidad adquirada: " . $venta["cantidadSolicitada"] . "\n\n";
            }
        } else {
            echo "\nLista Vacía\n";
            return false;
        }
    }


    public static function MostrarVentasEntreFechas($fecha01, $fecha02)
    {
        $listaVentas = array();

        $listaVentas = Helado::ObtenerContenidoDelArchivo("ventas.json");

        $listaVentasEntreFechas = array();

        foreach ($listaVentas as $venta) {
            if (
                explode(" ", $venta["fecha"])[0] >= $fecha01 &&
                explode(" ", $venta["fecha"])[0] <= $fecha02
            ) {
                array_push($listaVentasEntreFechas, $venta);
            }
        }


        usort($listaVentasEntreFechas, function($sabor01, $sabor02){
                return strcmp($sabor01["sabor"], $sabor02["sabor"]);

        });

        if (Venta::MostrarVentas($listaVentasEntreFechas) === false) {
            echo "No existen ventas dentro de este rango de fechas\n";
        }
    }
}
