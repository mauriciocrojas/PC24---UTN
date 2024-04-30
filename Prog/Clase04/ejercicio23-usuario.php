<?php

class Usuario
{
    public $Id;
    public $nombre;
    public $clave;
    public $mail;
    public $fechaRegistro;

    public function __construct($Id, $nombre, $clave, $mail, $fechaRegistro)
    {
        $this->Id = $Id;
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->mail = $mail;
        $this->fechaRegistro = $fechaRegistro;
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
}
