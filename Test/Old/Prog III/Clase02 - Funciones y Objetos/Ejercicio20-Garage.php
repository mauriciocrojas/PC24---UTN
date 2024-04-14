<?php
/*
Aplicación Nº 20 (Auto - Garage)
Crear la clase Garage que posea como atributos privados:
_razonSocial (String)
_precioPorHora (Double)
_autos (Autos[], reutilizar la clase Auto del ejercicio anterior)
Realizar un constructor capaz de poder instanciar objetos pasándole como
parámetros: i. La razón social.
ii. La razón social, y el precio por hora.
Realizar un método de instancia llamado “MostrarGarage”, que no recibirá parámetros y
que mostrará todos los atributos del objeto.
Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un
objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.
Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage”
(sólo si el auto no está en el garaje, de lo contrario informarlo).
Ejemplo: $miGarage->Add($autoUno);
Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del
“Garage” (sólo si el auto está en el garaje, de lo contrario informarlo). Ejemplo:
$miGarage->Remove($autoUno);
Crear un método de clase para poder hacer el alta de un Garage y, guardando los datos en un
archivo garages.csv.
Hacer los métodos necesarios en la clase Garage para poder leer el listado desde el archivo
garage.csv
Se deben cargar los datos en un array de garage.
En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos
los métodos.
*/

include_once "Ejercicio19-Auto.php";

class Garage
{

    private $_razonSocial;
    private $_precioPorHora;
    private $_autos;

    public function __construct($_razonSocial, $_precioPorHora)
    {
        $this->_razonSocial = $_razonSocial;
        $this->_precioPorHora = $_precioPorHora;
        $this->_autos = array();
    }

    public function MostrarGarage()
    {

        $cadena = "<b>Garage:</b> " . $this->_razonSocial . ", Precio por hora: $" . $this->_precioPorHora . "<br>";

        if (count($this->_autos) != 0) {
            $cadena .= "Autos estacionados: <br>";
            $i = 1;
            foreach ($this->_autos as $auto) {
                $cadena .= $i++. ") ". Auto::MostrarAuto($auto);
            }
            return $cadena ."<br>";
        } else {
            return $cadena .= "No hay autos estacionados<br><br>";
        }
    }

    
    //Usado para guardar en csv
    public static function MostrarGarageEstatico($garage)
    {

        $cadena = "<b>Garage:</b> " . $garage->_razonSocial . ", Precio por hora: $" . $garage->_precioPorHora . "<br>";

        if (count($garage->_autos) != 0) {
            $cadena .= "Autos estacionados: <br>";
            $i = 1;
            foreach ($garage->_autos as $auto) {
                $cadena .= $i++. ") ". Auto::MostrarAuto($auto);
            }
            return $cadena ."<br>";
        } else {
            return $cadena .= "No hay autos estacionados<br><br>";
        }
    }

    public function Equals(Auto $autoPasado)
    {
        foreach ($this->_autos as $clave => $auto) {
            if ($auto->Equals($autoPasado, $auto)) {
                return [$clave, true];
            }
        }
        return false;
    }

    public function Add($autoPasado)
    {
        if (!$this->Equals($autoPasado)) {
            array_push($this->_autos, $autoPasado);
            return true;
        } else {
            return false;
        }
    }

    public function Remove($autoPasado){
        $siEstaEIndice = $this->Equals($autoPasado);
        //var_dump($siEstaEIndice);
        if($siEstaEIndice){
            array_splice($this->_autos, $siEstaEIndice[0], 1);
            return true;
        }
        return false;
    }

    // Hacer los métodos necesarios en la clase Garage para poder leer el listado desde el archivo
    // garage.csv

    // Se deben cargar los datos en un array de garage.
    // En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos
    // los métodos.


    public static function DarAltaGarage($garage){
        $archivo = fopen("GaragesEj20.csv", "w");
        if($archivo){
           fwrite($archivo, Garage::MostrarGarageEstatico($garage). PHP_EOL);
        }
        fclose($archivo);
    }
    
    //<<*>>\\
    public static function LeerGarageDesdeCsvconFread($path){
        $archivo = fopen($path,"r");
        if($archivo){

                $data = fread($archivo, filesize($path));
            
            fclose($archivo);
            return $data;
        }
        return "No se pudo abrir o encontrar el archivo <br>";
    }

    public static function LeerGarageDesdeCsvConFeofyFgets($path){
        $archivo = fopen($path,"r");
        if($archivo){
            while (!feof($archivo)) {
                echo fgets($archivo);
            }
            fclose($archivo);
            return true;
        }
        return false;

    }
}

?>