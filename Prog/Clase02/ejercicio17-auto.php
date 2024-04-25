<?php


class Auto
{

    private $_color;
    private $_precio;
    private $_marca;
    private $_fecha;

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
            "Precio: " . $auto->_precio . "<br>" .
            "Color: " . $auto->_color . "<br>" .
            "Fecha: " . $auto->_fecha . "<br><br>";
    }

    public function Equals(Auto $auto01, Auto $auto02)
    {
        //Modifica para que tenga un solo parametro
        if ($auto01->_marca == $auto02->_marca) {
            return true;
        }
        return false;
    }
}
