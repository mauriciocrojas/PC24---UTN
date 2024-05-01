<?php

class Usuario
{
    public $usuario;
    public $clave;
    public $mail;

    public function __construct($usuario, $clave, $mail)
    {
        $this->usuario = $usuario;
        $this->clave = $clave;
        $this->mail = $mail;
    }

    public function MostrarUsuario (){
        $cadena = "Usuario: " . $this->usuario .
                   " Clave: "  . $this->clave.
                   " Mail: "   . $this->mail . "\n";
                   return $cadena;
    }

    public function DarDeAltaUsuarioEnCsv($nombre, $usuario, $mail)
    {
        $flag = false;
        $usuario = new Usuario($nombre, $usuario, $mail);

        $archivo = fopen("ejercicio20bis-usuarios.csv", "a");
        if($archivo){
            fwrite($archivo, $usuario->MostrarUsuario());
            $flag = true;

        }
        fclose($archivo);
        return $flag;
    }
}
