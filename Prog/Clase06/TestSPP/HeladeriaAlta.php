<?php

// 1era parte
// B- (1 pt.) 
// HeladeriaAlta.php: (por POST) se ingresa Sabor, Precio, Tipo (“Agua” o “Crema”), Vaso (“Cucurucho”,
// “Plástico”), Stock (unidades).
// Se guardan los datos en en el archivo de texto heladeria.json, tomando un id autoincremental como
// identificador(emulado) .Sí el nombre y tipo ya existen , se actualiza el precio y se suma al stock existente.
// completar el alta con imagen del helado, guardando la imagen con el sabor y tipo como identificación en la
// carpeta /ImagenesDeHelados2024.

class HeladeriaAlta
{

    public static $helados = array();
    public static $rutaArchivo = "heladeria.json";


    public static function AddProduct($sabor, $precio, $tipo, $vaso, $stock)
    {
        self::GetContentFile();
        $indice = self::SearchIceCreamInArray($sabor, $tipo, self::$helados);

        // Verifica si el helado ya existe en el archivo
        if ($indice !== false) {
            // Helado existente, actualiza su stock
            self::$helados[$indice]["stock"] += $stock;
            $mensaje = "Actualizado\n";
        } else {
            // Helado nuevo, lo agrega al array de helados
            $producto = array(
                "id" => self::IdIncremental(),
                "sabor" => $sabor,
                "precio" => $precio,
                "tipo" => $tipo,
                "vaso" => $vaso,
                "stock" => $stock
            );
            array_push(self::$helados, $producto);
            $mensaje = "Ingresado\n";
        }

        // Guarda el array actualizado de helados en el archivo
        self::SaveIceCreamInJson(self::$helados);

        return $mensaje;
    }

    public static function GetContentFile()
    {
        if (file_exists(self::$rutaArchivo)) {
            $contenido = file_get_contents(self::$rutaArchivo);
            self::$helados = json_decode($contenido, true);
        } else {
            // Si el archivo no existe o está vacío, crea el archivo y lo inicializa con un array vacío
            file_put_contents(self::$rutaArchivo, '[]');
            self::$helados = [];
        }
    }

    public static function IdIncremental()
    {
        return rand(1, 1000);
    }

    public static function SearchIceCreamInArray($sabor, $tipo, $helados)
    {
        foreach ($helados as $indice => $helado) {
            if (
                $helado["sabor"] == $sabor
                && $helado["tipo"] == $tipo
            ) {
                return $indice;
            }
        }
        return false;
    }

    public static function SaveIceCreamInJson($helados)
    {
        $contenido = json_encode($helados, JSON_PRETTY_PRINT);
        file_put_contents(self::$rutaArchivo, $contenido);
    }

    public static function SaveFileLoaded($ubicacionTemp, $sabor, $tipo)
    {
        if (isset($ubicacionTemp)) {
            $nombreCarpeta = "ImagenesDeHelados2024/";
            $destino =  $nombreCarpeta . $sabor . $tipo . ".jpg";

            //Si la carpeta no está creada, la crea
            //Si ya existe, saltea el if
            if (!is_dir($nombreCarpeta)) {
                mkdir($nombreCarpeta, 0777);
            }

            echo move_uploaded_file($ubicacionTemp, $destino) ? "Se guardó el archivo\n" : "No se pudo guardar el archivo\n";
        } else {
            echo "El nombre del archivo o la ubicación temporal no están seteadas\n";
        }
    }

    public static function ReturnArray(){
        return self::$helados;
    }
}
