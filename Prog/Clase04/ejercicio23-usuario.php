<?php

class Usuario
{
    public $Id;
    public $nombre;
    public $clave;
    public $mail;
    public $fechaRegistro;


    public function __construct($nombre, $clave, $mail)
    {
        $this->Id = Usuario::IdIncremental();
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->mail = $mail;
        $this->fechaRegistro = date("d-m-y H:i:s");
    }

    public static function IdIncremental()
    {
        return rand(1, 10000);
    }

    public static function MostrarUsuario($usuario)
    {
        $cadena = "Id: " . $usuario->Id .
            ", Nombre: " . $usuario->nombre .
            ", Clave: " . $usuario->clave .
            ", Mail: " . $usuario->mail .
            ", Fecha de registro: " . $usuario->fechaRegistro;

            return $cadena;
    }

    public static function AltaUsuarioEnArchivo($usuario){
        $archivo = fopen("ejercicio23-usuarios.json", "a+");
        if($archivo){
            if(file_put_contents("ejercicio23-usuarios.json" , json_encode($usuario, JSON_PRETTY_PRINT))){
                echo "Datos guardados correctamente en el archivo JSON.";
            } else {
                echo "Error al guardar los datos en el archivo JSON.";
            }
        }
        fclose($archivo);
    }
}
