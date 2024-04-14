<?php
// 1era parte

// 1-
// A- (1 pt.) index.php:Recibe todas las peticiones que realiza el postman, y administra a que archivo se debe incluir.

// B- (1 pt.) PizzaCarga.php: (por GET)se ingresa Sabor, precio, Tipo (“molde” o “piedra”), cantidad( de unidades). 
// Se guardan los datos en en el archivo de texto Pizza.json, tomando un id autoincremental como
// identificador(emulado) .Sí el sabor y tipo ya existen , se actualiza el precio y se suma al stock existente.

// 2- (1pt.) PizzaConsultar.php: (por POST)Se ingresa Sabor,Tipo, si coincide con algún registro del archivo Pizza.json,
// retornar “Si Hay”. De lo contrario informar si no existe el tipo o el sabor.

class Pizza {

    public $_sabor;
    public $_precio;
    public $_tipo;
    public $_cantidad;
    public $_id;

    public function __construct($_sabor, $_precio, $_tipo, $_cantidad)
    {
        
        $this->_id = rand(1,1000);
        //Pensar ID autoincremental

        $this->_sabor = $_sabor;
        $this->_precio = $_precio;
        $this->_tipo = $_tipo;
        $this->_cantidad = $_cantidad;
    }


    public static function PizzaCarga($pizza, $nombreArchivo)
    {   


        $archivo = fopen($nombreArchivo, 'w+');
        if ($archivo) {
            //Leer el archivo y guardar array
            $pizzas = json_decode(file_get_contents("JsonSimulacroPP.json"), true);

            echo $pizzas;
            
            //Agregar al array guardado la pizza que estoy cargando
            $pizzas.array_push($pizza);

            //Guardar la pizza anterior con la pizza que cargue de archivo
            $guardado = fwrite($archivo, json_encode($pizzas));
        }

        if($guardado){
            fclose($archivo);


            return true;
        }



    }

    public static function PizzaLeer($path){
        $archivo = fopen($path,"r");
        if($archivo){

                $data = fread($archivo, filesize($path));
            
            fclose($archivo);
            return $data;
        }
        return "No se pudo abrir o encontrar el archivo <br>";
    }

    public static function InsertarJsonEnArray($data){

        $newArray = array ();
        $newArray = json_decode($data);

        return $newArray;
  
    }

    public static function PizzaConsultar($arrayDePizzas, $sabor, $tipo){
        foreach($arrayDePizzas as $pizza){
            if($pizza->_sabor == $sabor && $pizza->_tipo == $tipo){
                return "Sí hay pizzas de ese tipo y sabor <br>";
            }else if($pizza->_sabor == $sabor && $pizza->_tipo != $tipo){
                return "No existe ese tipo <br>";
            }else if($pizza->_sabor != $sabor && $pizza->_tipo == $tipo){
                return "No existe ese sabor <br>";
            }
        }
    }

    public static function PizzaConsultarAgregarStockYPrecio(){
        // B- (1 pt.) PizzaCarga.php: (por GET)se ingresa Sabor, precio, Tipo (“molde” o “piedra”), cantidad( de unidades). Se
        // guardan los datos en en el archivo de texto Pizza.json, tomando un id autoincremental como
        // identificador(emulado) .
        
        //Ver esto
        //Sí el sabor y tipo ya existen , se actualiza el precio y se suma al stock existente.
    }




    public static function GenerarArray($listado){
        $pizzas = array();
       foreach ($listado as $pizza){
        array_push($pizzas, $pizza);
       }
       return $pizzas;
    }
}
?>