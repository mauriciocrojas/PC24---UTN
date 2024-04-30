<?php

require_once "ejercicio19-auto.php";
// Aplicación No 20 (Auto - Garage)
// Crear la clase Garage que posea como atributos privados:

// _razonSocial (String)
// _precioPorHora (Double)
// _autos (Autos[], reutilizar la clase Auto del ejercicio anterior)
// Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros: 
// i. La razón social.
// ii. La razón social, y el precio por hora.
// Realizar un método de instancia llamado “MostrarGarage”, que no recibirá parámetros y que
// mostrará todos los atributos del objeto.
// Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un objeto de
// tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.
// Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage” (sólo si el
// auto no está en el garaje, de lo contrario informarlo).
// Ejemplo: $miGarage->Add($autoUno);
// Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del
// “Garage” (sólo si el auto está en el garaje, de lo contrario informarlo). Ejemplo:
// $miGarage->Remove($autoUno);

// Crear un método de clase para poder hacer el alta de un Garage y, guardando los datos en un archivo
// garages.csv.
// Hacer los métodos necesarios en la clase Garage para poder leer el listado desde el archivo
// garage.csv

class Garage
{
    private $_razonSocial;
    private $_precioPorHora;
    private $_autos;

    public function __construct($razonSocial, $precioPorHora = '0')
    {
        $this->_razonSocial = $razonSocial;
        $this->_precioPorHora = $precioPorHora;
        $this->_autos = array();
    }

    public function MostrarGarage()
    {
        echo "Razon social: " . $this->_razonSocial . "<br>" .
            "Precio por hora: $" . $this->_precioPorHora . "<br><br>";
        echo "Autos estacionados dentro del garage:<br>";
        foreach ($this->_autos as $valor) {
            echo "Marca: " . $valor->GetMarca() . "<br>" .
                "Precio: $" . $valor->getPrecio() . "<br>" .
                "Color: " . $valor->GetColor() . "<br>" .
                "Fecha: " . $valor->GetFecha() . "<br><br>";
        }
    }
    public function Equals($autoPasado)
    {
        foreach ($this->_autos as $auto) {
            if ($autoPasado == $auto) {
                return true;
            }
        }
        return false;
    }

    public function Add($auto){
        if(!$this->Equals($auto)){
            array_push($this->_autos, $auto);
            return true;
        }else{
            return false;
        }
    }

    public function Remove($auto){
        if($this->Equals($auto)){
            $indice = array_search($auto,$this->_autos);
            array_splice($this->_autos,$indice,1);
            return true;
        }else{
            return false;
        }
    }
}
