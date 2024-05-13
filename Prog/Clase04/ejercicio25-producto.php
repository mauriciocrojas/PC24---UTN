<?php

// Recibe los datos del producto(código de barra (6 cifras ),nombre ,tipo, stock, precio )por POST ,
// crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000). 
// Crear un objeto y utilizar sus métodos para poder verificar si es un producto existente, si ya existe 
// el producto se le suma el stock , de lo contrario se agrega al documento en un nuevo renglón.
// Retorna un :
// “Ingresado” si es un producto nuevo
// “Actualizado” si ya existía y se actualiza el stock.
// “no se pudo hacer“si no se pudo hacer
// Hacer los métodos necesarios en la clase

class Producto
{
    public $codigoDeBarras;
    public $nombre;
    public $tipo;
    public $stock;
    public $precio;
    public static $filePath = 'ejercicio25-productos.json';
    public static $id = 0;
    public static $productos = array(); // Lista de productos

    public static function IdIncremental()
    {
        //return ++self::$id;
        return rand(1, 1000);
    }


    public static function AddProduct($codigoDeBarras, $nombre, $tipo, $stock, $precio)
    {
        // $productosAux = self::GetContentFile(); modo con return a lista auxiliar
        self::GetContentFile();
        $indice = self::SearchProductInList($codigoDeBarras, self::$productos);

        // Verifica si el producto ya existe en el archivo
        if ($indice !== false) {
            // Producto existente: actualiza su stock
            self::$productos[$indice]["stock"] += $stock;
            $mensaje = "Actualizado";
        } else {
            // Producto nuevo: lo agrega a la lista de productos
            $producto = array(
                "id" => self::IdIncremental(),
                "codigoDeBarras" => $codigoDeBarras,
                "nombre" => $nombre,
                "tipo" => $tipo,
                "stock" => $stock,
                "precio" => $precio
            );
            //self::$productos[] = $producto;
            array_push(self::$productos, $producto); 
            $mensaje = "Ingresado";
        }

        // Guardar la lista actualizada de productos en el archivo
        self::SaveProductsInJson(self::$productos);

        return $mensaje;
    }


    public static function GetContentFile()
    {
        if (file_exists(self::$filePath) && filesize(self::$filePath) > 0) {
            $contenido = file_get_contents(self::$filePath);
            self::$productos = json_decode($contenido, true);
        } else {
            //Si el archivo no existe o está vacío, crea el archivo y lo inicializa con un array vacío
            file_put_contents(self::$filePath, '[]');
            self::$productos = [];
        }
    }

    public static function SearchProductInList($codigoDeBarras, $productos)
    {
        foreach ($productos as $indice => $producto) {
            if ($producto["codigoDeBarras"] == $codigoDeBarras) {
                return $indice;
            }
        }
        return false;
    }

    public static function SaveProductsInJson($productos)
    {
        $contenido = json_encode($productos, JSON_PRETTY_PRINT);
        file_put_contents(self::$filePath, $contenido);
    }
}
