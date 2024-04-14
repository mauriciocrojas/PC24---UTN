<?php

/*
Crear la clase Garage que posea como atributos privados:

_razonSocial (String)
_precioPorHora (Double)
_autos (Autos[], reutilizar la clase Auto del ejercicio anterior)

Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros:

i. La razón social.
ii. La razón social, y el precio por hora.

Realizar un método de instancia llamado “MostrarGarage”, que no recibirá parámetros y
que mostrará todos los atributos del objeto.
Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un
objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.
Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage”
(sólo si el auto no está en el garaje, de lo contrario informarlo).
Ejemplo: $miGarage->Add($autoUno);
Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del
“Garage” (sólo si el auto está en el garaje, de lo contrario informarlo).
Ejemplo: $miGarage->Remove($autoUno);
En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos los
métodos.

Rojas Mauricio
Ej 18
*/

require_once "Ejercicio17-Auto.php";

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
      $i = 1;
      $cadena = "<b>Razon Social:</b> " . $this->_razonSocial . ", <b>Precio por hora:</b> $" . $this->_precioPorHora . "<br>";
      if (count($this->_autos) != 0) {
         $cadena .= "Autos alojados:<br>";
         foreach ($this->_autos as $auto) {
            $cadena .= $i++ . ") " . Auto::MostrarAuto($auto);
         }
         return $cadena;
      } else {
         return $cadena .= "No hay autos alojados.<br><br>";
      }
   }

   public function Equals(Auto $autoPasado)
   {
      $alojado = "";
      foreach ($this->_autos as $clave => $auto) {
         if ($auto->Equals($autoPasado, $auto)) {
            $alojado = [$clave, true];
            break;
         } else {
            $alojado = false;
         }
      }
      return $alojado;
   }

   public function Add(Auto $autoPasado)
   {
      if (!$this->Equals($autoPasado)) {
         array_push($this->_autos, $autoPasado);
         return true;
      } else {
         return false;
      }
   }

   public function Remove(Auto $autoPasado)
   {
      $siEstaEIndice = $this->Equals($autoPasado);
      if ($siEstaEIndice) {
         array_splice($this->_autos, $siEstaEIndice[1]);
         return "Se eliminó el auto.<br><br>";
      } else {
         return "El auto no se encuentra en el garage.<br><br>";
      }
   }
}
