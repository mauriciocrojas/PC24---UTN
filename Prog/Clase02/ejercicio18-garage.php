<?php
require_once "ejercicio17-auto.php";

class Garage
{


    // _razonSocial (String)
    // _precioPorHora (Double)
    // _autos (Autos[], reutilizar la clase Auto del ejercicio anterior)
    // Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros: 
    // i. La razón social.
    // ii. La razón social, y el precio por hora.

    // Realizar un método de instancia llamado “MostrarGarage”, que no recibirá parámetros y
    // que mostrará todos los atributos del objeto.
    // Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un
    // objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.
    // Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage”
    // (sólo si el auto no está en el garaje, de lo contrario informarlo).
    // Ejemplo: $miGarage->Add($autoUno);
    // Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del
    // “Garage” (sólo si el auto está en el garaje, de lo contrario informarlo). Ejemplo:
    // $miGarage->Remove($autoUno);
    // En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos los métodos.

    private $_razonSocial;
    private $_precioPorHora;
    public $_autos;

    public function __construct($razonSocial, $precioPorHora = 0)
    {
        $this->_razonSocial = $razonSocial;
        $this->_precioPorHora = $precioPorHora;
        $this->_autos = [];
    }

    public function MostrarGarage()
    {
        echo "Razon social: " . $this->_razonSocial . "<br>" .
            "Precio por hora: $" . $this->_precioPorHora . "<br><br>";
        echo "Autos estacionados dentro del garage:<br>";
        foreach ($this->_autos as $valor) {
            echo "Marca: " . $valor->_marca . "<br>" .
                "Precio: $" . $valor->_precio . "<br>" .
                "Color: " . $valor->_color . "<br>" .
                "Fecha: " . $valor->_fecha . "<br><br>";
        }
    }




    // Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un
    // objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.
    public function Equals(Auto $autoPasado)
    {

        foreach ($this->_autos as $auto) {
            if ($autoPasado == $auto) {
                return true;
            } else {
                return false;
            }
        }
    }

    // Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage”
    // (sólo si el auto no está en el garaje, de lo contrario informarlo).
    // Ejemplo: $miGarage->Add($autoUno);
    public function Add(Auto $autoPasado)
    {
        if ($this->Equals($autoPasado)) {
            return "No se pudo agregar el auto al garage ya que el mismo ya se encontraba guardado<br><br>";
        } else {
            array_push($this->_autos, $autoPasado);
            return "Se agregó el auto al garage <br><br>";
        }
    }

    // Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del
    // “Garage” (sólo si el auto está en el garaje, de lo contrario informarlo). Ejemplo:
    // $miGarage->Remove($autoUno);
    public function Remove(Auto $autoPasado)
    {
        if ($this->Equals($autoPasado)) {
            $indice = array_search($autoPasado, $this->_autos);
            array_splice( $this->_autos, $indice,1);
            return "Se eliminó el auto del garage<br><br>";
        } else {
            return "No se pudo eliminar el auto del garage ya que el mismo no se encontraba estacionado<br><br>";
        }
    }
}
