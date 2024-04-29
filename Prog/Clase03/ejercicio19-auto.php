<?php


class Auto
{
    private $_color;
    private $_precio;
    private $_marca;
    private $_fecha;

    public function __construct($_marca, $_color, $_precio = 0, $_fecha = "Sin especificar")
    {
        $this->_marca = $_marca;
        $this->_color = $_color;
        $this->_precio = $_precio;
        $this->_fecha = $_fecha;
    }

    public function GetColor()
    {
        return $this->_color;
    }

    public function GetPrecio()
    {
        return $this->_precio;
    }

    public function GetMarca()
    {
        return $this->_marca;
    }

    public function GetFecha()
    {
        return $this->_fecha;
    }

    public function AgregarImpuestos($valor)
    {
        $this->_precio += $valor;
    }

    public static function MostrarAuto(Auto $auto)
    {
        $cadena = "Marca: " . $auto->_marca . ", Color: " . $auto->_color . ", Precio: $" . $auto->_precio . ", Fecha compra: " . $auto->_fecha . "<br><br>";
        return $cadena;
    }

    public static function MostrarAutos($autos)
    {
        $cadena = "";

        foreach ($autos as $auto) {
            $cadena .= "Marca: " . $auto->_marca . ", Color: " . $auto->_color . ", Precio: $" . $auto->_precio . ", Fecha compra: " . $auto->_fecha . "<br>";
        }

        return $cadena . "<br>";
    }

    // public function Equals(Auto $auto01, Auto $auto02)
    // {
    //     if ($auto01->_marca == $auto02->_marca) {
    //         return true;
    //     }
    //     return false;
    // }


    //Modificada para que tenga un solo parametro
    public function Equals(Auto $auto)
    {
        if ($this->_marca == $auto->_marca) {
            return true;
        }
        return false;
    }



    // Crear un método de clase, llamado “Add” que permita sumar dos objetos “Auto” (sólo si son
    // de la misma marca, y del mismo color, de lo contrario informarlo) y que retorne un Double con
    // la suma de los precios o cero si no se pudo realizar la operación.
    // Ejemplo: $importeDouble = Auto::Add($autoUno, $autoDos);
    public static function Add(Auto $auto01, Auto $auto02)
    {
        if ($auto01->Equals($auto02) and $auto01->_color == $auto02->_color) {
            $valor = $auto01->_precio + $auto02->_precio;
            return $valor;
            // echo "La suma del valor de ambos autos es de : ". $auto01->_precio. " + 
            // ". $auto02->_precio. " es de: ". $valor. "<br>";
        } else {
            return 0;
            // echo "No se pudo realizar la suma debido a que los autos no son de la misma marca o color<br>";
        }
    }

    //Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3, 5)
    //Mostrar autos impares
    public static function MostrarImpares($autos)
    {
        foreach ($autos as $valor) {
            $indice = array_search($valor, $autos);
            if (($indice + 1) % 2 != 0) {
                echo ($indice + 1) . ": " . Auto::MostrarAuto($valor);
            }
        }
    }

    //Crear un método de clase para poder hacer el alta de un Auto, guardando los datos en un archivo autos.csv.
    //Dar de alta autos y guardarlos en un archivo csv
    //public static function AltaAuto($color, $precio, $marca, $fecha)
    public static function AltaAutoIndividual($auto)
    {
        $flag = false;
        $archivo = fopen("ejercicio19-autoIndividual.csv", "w");

        if ($archivo) {
            fwrite($archivo, Auto::MostrarAuto($auto) . PHP_EOL);
            $flag = true;
        }

        fclose($archivo);
        return $flag;
    }

    public static function AltaAutoArray($autos)
    {
        $flag = false;
        $archivo = fopen("ejercicio19-autosArray.csv", "w");

        if ($archivo) {
            foreach ($autos as $auto) {
                fwrite($archivo, Auto::MostrarAuto($auto) . PHP_EOL);
                $flag = true;
            }
        }

        fclose($archivo);
        return $flag;
    }



    //Hacer los métodos necesarios en la clase Auto para poder leer el listado desde el archivo autos.csv
    public static function LeerArchivo($path)
    {
        $archivo = fopen($path, "r");

        //Feof devuelve true cuando llega al final del archivo
        while (!feof($archivo)) {
            echo fgets($archivo);
        }
        fclose($archivo);
    }
}
