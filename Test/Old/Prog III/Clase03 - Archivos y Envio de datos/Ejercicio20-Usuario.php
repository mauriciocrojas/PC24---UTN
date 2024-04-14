<?php

/*
Aplicación Nº 20 (Registro CSV)
Archivo: registro.php
método:POST
Recibe los datos del usuario(nombre, clave,mail )por POST ,
crear un objeto y utilizar sus métodos para poder hacer el alta,
guardando los datos en usuarios.csv.
retorna si se pudo agregar o no.
Cada usuario se agrega en un renglón diferente al anterior.
Hacer los métodos necesarios en la clase usuario

Mauricio Rojas
Ej 20
*/

class Usuario {

    private $_nombre;
    private $_clave;
    private $_mail;

    public function __construct($_nombre, $_clave, $_mail)
    {
        $this->_nombre = $_nombre;
        $this->_clave = $_clave;
        $this->_mail = $_mail;
    }

    public static function MostrarUsuario($usuario){
        return "Nombre: ". $usuario->_nombre . ", Clave: ". $usuario->_clave . ", Mail: ". $usuario->_mail;
    }

    public static function DarDeAltaUsuarioEnCsv($usuario){
        $archivo = fopen("UsuariosEj20.csv", "a+");

        if($archivo){
            fwrite($archivo, Usuario::MostrarUsuario($usuario) .PHP_EOL);
            return true;
        }else{
            return false;
        }
    }
}

?>