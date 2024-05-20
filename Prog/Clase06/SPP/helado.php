<?php

//Mauricio Rojas

class Helado
{
    public $id;
    public $sabor;
    public $tipo;
    public $precio;
    public $stock;
    public $vaso;


    public function setVaso($vaso)
    {
        if (isset($vaso) && is_string($vaso)) {
            $this->vaso = $vaso;
        }
    }

    public function setId($id)
    {
        if (is_int($id)) {
            $this->id = $id;
        }
    }


    public function setSabor($sabor)
    {
        if (isset($sabor) && is_string($sabor)) {
            $this->sabor = $sabor;
        }
    }


    public function setTipo($tipo)
    {
        if (isset($tipo) && is_string($tipo)) {
            $this->tipo = $tipo;
        }
    }


    public function setPrecio($precio)
    {
        if (isset($precio) && is_numeric($precio)) {
            $this->precio = floatval($precio);
        }
    }


    public function setStock($stock)
    {
        if (isset($stock) && is_numeric($stock)) {
            $this->stock = intval($stock);
        }
    }


    //Dará de alta un nuevo helada cuando sea invocada
    public static function HeladoAlta($sabor, $tipo, $precio, $stock, $vaso)
    {
        $arrayAux = Helado::ObtenerContenidoDelArchivo();
        $indice = Helado::BuscarHeladoEnLista($sabor, $tipo, $arrayAux);

        if ($indice) {
            $arrayAux[$indice - 1]["stock"] += intval($stock);
            $arrayAux[$indice - 1]["precio"] = floatval($precio);
            echo "Helado existente, se actualiza su precio y se suma el nuevo stock\n";
            return $arrayAux;
        } else {
            $helado = new Helado();
            $helado->setId(count($arrayAux)+1);
            $helado->setSabor($sabor);
            $helado->setTipo($tipo);
            $helado->setPrecio($precio);
            $helado->setStock($stock);
            $helado->setVaso($vaso);

            array_push($arrayAux, $helado);
            echo "Nuevo helado\n";
            return $arrayAux;
        }
    }

    public static function GuardarJson($lista, $nombreArchivo = "heladeria.json")
    {
        $contenido = json_encode($lista, JSON_PRETTY_PRINT);
        if (!empty($contenido)) {
            $data = file_put_contents($nombreArchivo, $contenido);
            if ($data != false) {
                return true;
            } else {
                return false;
            }
        } else {
            echo "El archivo a leer está vacío\n";
            return false;
        }
    }


    public static function ConsultarTipoySabor($sabor, $tipo)
    {
        $listaHelados = Helado::ObtenerContenidoDelArchivo();
        $mensaje =  "";

        foreach ($listaHelados as $helado) {
            if ($helado["sabor"] == $sabor && $helado["tipo"] == $tipo) {
                $mensaje =  "Existen helados sabor " . $sabor . "  y tipo " . $tipo . "\n";
                break;
            } else if ($helado["tipo"] == $tipo && $helado["sabor"] != $sabor) {
                $mensaje .=  "Hay de tipo " . $tipo . " pero no de sabor " . $sabor . "\n";
                break;
            } else if ($helado["tipo"] != $tipo && $helado["sabor"] == $sabor) {
                $mensaje .=  "Hay de sabor " . $sabor . " pero no de tipo " . $tipo . "\n";
                break;
            } else {
                $mensaje .=  "No hay de sabor " . $sabor . " ni tipo " . $tipo . "\n";
                break;
            }
        }
        return $mensaje;
    }


    public static function ObtenerContenidoDelArchivo($rutaArchivo = "heladeria.json")
    {
        $arrayAux = array();
        if (file_exists($rutaArchivo)) {
            $contenido = file_get_contents($rutaArchivo);
            $arrayAux = json_decode($contenido, true);
        } else {
            //Apartado que verifica la existencia del archivo, de no existir lo crea y lo inializa con un array vacio
            file_put_contents($rutaArchivo, '[]');
            $arrayAux = [];
        }
        return $arrayAux;
    }

    public static function BuscarHeladoEnLista($sabor, $tipo, $helados)
    {
        foreach ($helados as $helado) {
            if (
                $helado["sabor"] == $sabor
                && $helado["tipo"] == $tipo
            ) {
                return array_search($helado, $helados) + 1;
            }
        }
        return false;
    }


    public static function GuardarImagenCargada($ubicacionTemp, $sabor, $tipo)
    {
        if (isset($ubicacionTemp)) {
            $nombreCarpeta = "ImagenesDeHelados2024/";
            $destino =  $nombreCarpeta . $sabor . $tipo . ".jpg";

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


}
