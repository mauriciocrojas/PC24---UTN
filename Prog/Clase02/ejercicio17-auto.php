<?php


class Auto
{

    public $_color;
    public $_precio;
    public $_marca;
    public $_fecha;


    public function getPrecio(){
        return $this->_precio;
    }

    public function __construct($color, $marca, $precio = 0, $fecha = "Sin especificar")
    {
        $this->_color = $color;
        $this->_fecha = $fecha;
        $this->_marca = $marca;
        $this->_precio = $precio;
    }


    public function AgregarImpuestos($valor)
    {
        $this->_precio += $valor;
    }

    public static function MostrarAuto(Auto $auto)
    {
        return "Marca: " . $auto->_marca . "<br>" .
            "Precio: $" . $auto->_precio . "<br>" .
            "Color: " . $auto->_color . "<br>" .
            "Fecha: " . $auto->_fecha . "<br><br>";
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
    public static function Add (Auto $auto01, Auto $auto02){
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
        public static function MostrarImpares (array $autos){
            foreach ($autos as $key => $value) {
                echo "<br>Clave: ". $key ." y valor: ". $value ."<br>";
        }
    }






}