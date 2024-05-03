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

    // crear un objeto y utilizar sus métodos para poder verificar si es un usuario registrado, 
    // Retorna un :
    // “Verificado” si el usuario existe y coincide la clave también.
    // “Error en los datos” si esta mal la clave.
    // “Usuario no registrado si no coincide el mail“
    public function ValidarUsuario(Usuario $usuario)
    {
        if ($this->usuario == $usuario->usuario && $this->clave == $usuario->clave && $this->mail == $usuario->mail) {
            return "Verificado"."\n";
        } else if ($this->usuario == $usuario->usuario && $this->clave != $usuario->clave && $this->mail == $usuario->mail) {
            return "Error en los datos"."\n";
        } else if ($this->usuario == $usuario->usuario && $this->clave == $usuario->clave && $this->mail != $usuario->mail) {
            return "Usuario no registrado, no coincide el mail"."\n";
        }
    }
}
