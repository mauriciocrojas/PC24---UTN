<?php

/*
Aplicación Nº 22 ( Login)
Archivo: Login.php
método:POST
Recibe los datos del usuario(clave,mail )por POST ,
crear un objeto y utilizar sus métodos para poder verificar si es un usuario registrado,
Retorna un :
“Verificado” si el usuario existe y coincide la clave también.
“Error en los datos” si esta mal la clave.
“Usuario no registrado si no coincide el mail“
Hacer los métodos necesarios en la clase usuario

Rojas Mauricio
Ej 22
*/

class Usuario {

public $_clave;
public $_mail;

public function __construct($_clave, $_mail)
{
    $this->_clave = $_clave;
    $this->_mail = $_mail;
}

public static function ChequearUsuarioExistente($arrayDeUsuarios, $mail, $clave){
    foreach($arrayDeUsuarios as $usuario){
        if($usuario->_mail == $mail && $usuario->_clave == $clave){
            return "Usuario verificado con éxito <br>";
        }else if($usuario->_mail == $mail && $usuario->_clave != $clave){
            return "Error en los datos <br>";
        }else{
            return "Usuario no registrado<br>";
        }
    }
}

}

?>