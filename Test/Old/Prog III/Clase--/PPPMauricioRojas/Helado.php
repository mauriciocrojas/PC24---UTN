<?php

class Helado{

    //--- ATTRIBUTES ---//
    public $_id;
    public $_sabor;
    public $_tipo;
    public $_precio;
    public $_stock;

    public function __construct(){}

    public function getId(){
        return $this->_id;
    }


    public function getSabor(){
        return $this->_sabor;
    }


    public function getTipo(){
        return $this->_tipo;
    }

    public function getPrecio(){
        return $this->_precio;
    }


    public function getStock(){
        return $this->_stock;
    }

    public function setId($id){
        if (is_int($id)) {
            $this->_id = $id;
        }
    }

  
    public function setSabor($sabor){
        if(isset($sabor) && is_string($sabor)){
            $this->_sabor = $sabor;
        }
    }


    public function setTipo($tipo="Crema"){
        if(isset($tipo) && is_string($tipo) && ($tipo == "Agua" || $tipo == "Crema")){
            $this->_tipo = $tipo;
        }
    }


    public function setPrecio($precio){
        if(isset($precio) && is_numeric($precio)){
            $this->_precio = abs($precio);
        }
    }


    public function setStock($stock){
        if(isset($stock) && is_numeric($stock)){
            $this->_stock = $stock;
        }
    }


    public static function HeladoAlta($id, $sabor, $tipo, $precio, $stock){
        $miHeladeria = new Helado();
        $miHeladeria->setId($id);
        $miHeladeria->setSabor($sabor);
        $miHeladeria->setTipo($tipo);
        $miHeladeria->setPrecio($precio);
        $miHeladeria->setStock($stock);
        return $miHeladeria;
    }

   
    public function __Equals($obj){
        if(isset($obj) && is_a($obj, "Helado")){
            if($this->getSabor() == $obj->getSabor() && $this->getTipo() == $obj->getTipo()){
                return true;
            }
        }
        return false;
    }

 
    public function isInArray($array){
        if(isset($array) && is_array($array)){
            foreach($array as $newObject){
                if($this->__Equals($newObject)){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Checks if the array have an object of tipo "$tipo" and sabor "$sabor".
     * @param array $array The array to check.
     * @param string $sabor The sabor of the ice cream.
     * @param string $tipo The tipo of the ice cream.
     * @return string The message with the result of the check.
     */
    public static function SearchFor($array, $sabor, $tipo){
        $message =  "";
        $both = false;
        $sTipo = false;
        $sSabor = false;
        foreach ($array as $object){
            if($object->getSabor() == $sabor && $object->getTipo() == $tipo){
                $both = true;
            }
            else if($object->getTipo() == $tipo){
                $sTipo = true;
            }else if($object->getSabor() == $sabor){
                $sSabor = true;
            }
        }

        if($both){
            $message =  "<h3>Si Hay</h3><br>";
        }else if($sTipo || $sSabor){
            $message =  "<h3>No Hay Esa Combinacion.</h3><br>";
            if ($sTipo) {
                $message .=  "<h3>Hay de tipo: ".$tipo."</h3><br>";
            }
            if ($sSabor) {
                $message .=  "<h3>Hay de sabor: ".$sabor."</h3><br>";
            }
        }else{
            $message =  "<h3>No hay de tipo ".$tipo." ni de sabor ".$sabor."</h3><br>";
        }

        return $message;
    }

    
    public static function leerJson($nombreArchivo = "Heladeria.json"){
        $arrayAux = array();
        if (file_exists($nombreArchivo)) {

            $file = fopen($nombreArchivo, "r");

            if($file){
                $json = fread($file, filesize($nombreArchivo));
                $array = json_decode($json, true);
                foreach ($array as $unHelado) {
                    $miHelado = Helado::HeladoAlta(
                        intval($unHelado["_id"]),
                        $unHelado["_sabor"],
                        $unHelado["_tipo"],
                        floatval($unHelado["_precio"]),
                        intval($unHelado["_cantidad"])
                    );
                    array_push($arrayAux, $miHelado);

                    fclose($file);
            }
        }

        return $arrayAux;
    }
    }

    public static function guardarJson($arrayHelado, $nombreArchivo = "Helado.json")
    {
        $auxBool = false;

            $file = fopen($nombreArchivo, "w");
            if ($file){
                $json = json_encode($arrayHelado, JSON_PRETTY_PRINT);
                fwrite($file, $json);
                
                $auxBool = true;
            }

            if ($auxBool){
                fclose($file);

            }

            return $auxBool;

    }


    public static function actualizarArchivo($heladoNuevo, $accion):bool{
        $arrayDeHelados = self::leerJson();
        if (!$heladoNuevo->isInArray($arrayDeHelados)) {
            if ($accion == "add") {
                echo "Se agregó el objeto.<br>";
                array_push($arrayDeHelados, $heladoNuevo);
                return self::guardarJson($arrayDeHelados);
            }
        }else{
            foreach ($arrayDeHelados as $helado) {
                if ($accion == "add") {
                    if ($heladoNuevo->__Equals($helado)) {
                        echo "Ya existe<br>";
                        $helado->setCantidad($helado->getStock() + $heladoNuevo->getStock());
                        $helado->setPrecio($heladoNuevo->getPrecio());
                        $helado->calculateFinalPrice();
                        return self::guardarJson($arrayDeHelados);
                    }
                } elseif ($accion == "sub") {
                    if ($heladoNuevo->__Equals($helado) &&
                        $heladoNuevo->getStock() <= $helado->getStock()) {
                        echo "<h3>Hay stock, se descontaran ".$heladoNuevo->getStock()." unidades<br>";
                        $helado->setCantidad($helado->getStock() - $heladoNuevo->getStock());
                        return self::guardarJson($arrayDeHelados);
                    }
                }
            }
        }
    }
}

?>