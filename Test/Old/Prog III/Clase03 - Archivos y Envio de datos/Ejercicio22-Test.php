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

    include_once "Ejercicio22-Usuario.php";

    $usuario1 = new Usuario("123", "usuario1@mail.com");
    $usuario2 = new Usuario("234", "usuario2@mail.com");
    $usuario3 = new Usuario("345", "usuario3@mail.com");

    $usuarios = array ($usuario1, $usuario2, $usuario3);

    $mail = $_POST["mail"];
    $clave = $_POST["clave"];

   echo Usuario::ChequearUsuarioExistente($usuarios, $mail, $clave);

?>