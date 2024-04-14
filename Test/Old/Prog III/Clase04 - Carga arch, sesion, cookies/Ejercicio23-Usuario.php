<?php
/*
Aplicación Nº 23 (Registro JSON)
Archivo: registro.php
método:POST
Recibe los datos del usuario(nombre, clave,mail )por POST ,
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000). crear un dato
con la fecha de registro , toma todos los datos y utilizar sus métodos para poder hacer
el alta,
guardando los datos en usuarios.json y subir la imagen al servidor en la carpeta
Usuario/Fotos/.
retorna si se pudo agregar o no.
Cada usuario se agrega en un renglón diferente al anterior.
Hacer los métodos necesarios en la clase usuario

Rojas Mauricio
Ej 23
*/

class Usuario {

    public $_nombre;
    public $_clave;
    public $_mail;
    public $_id;
    public $_fechaRegistro;
    public $_imagen;

    public function __construct($_nombre, $_clave, $_mail, $_imagen)
    {
        $this->_nombre = $_nombre;
        $this->_clave = $_clave;
        $this->_mail = $_mail;
        $this->_id = rand(1,10000);
        $this->_fechaRegistro = date("d-m-Y");
        $this->_imagen = $_imagen;
    }

    public function GuardarImagen ($imagen, $tmp){
        $destino = "ArchivosUsuarioEj23/". $imagen;
        if(move_uploaded_file($tmp, $destino)){
            return true;
        }
        return false;
    }

    public static function GuardarUserJson($usuario, $nombreArchivo)
    {
       // var_dump($usuario);

        $archivo = fopen($nombreArchivo, 'a+');
        if ($archivo) {
              $guardado = fwrite($archivo, json_encode($usuario) . PHP_EOL);
        }

        if($guardado){
            fclose($archivo);
            return true;
        }
    }

}


?>