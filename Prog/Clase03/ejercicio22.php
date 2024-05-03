<?php

// Alumno: Mauricio Rojas
// Aplicación No 22 (Login)
// Archivo: Login.php
// método:POST
// Recibe los datos del usuario(clave,mail )por POST ,
// crear un objeto y utilizar sus métodos para poder verificar si es un usuario registrado, 
// Retorna un :
// “Verificado” si el usuario existe y coincide la clave también.
// “Error en los datos” si esta mal la clave.
// “Usuario no registrado si no coincide el mail“
// Hacer los métodos necesarios en la clase usuario.

require_once "ejercicio22-usuario.php";

$nombre = $_POST["usuario"];
$clave = $_POST["clave"];
$mail = $_POST["mail"];

$usuario01 = new Usuario("Mau", "TopSecret", "mau@gmail.com");
$usuario02 = new Usuario("Mau", "TopSecreta", "mau@gmail.com");
$usuarioPasado = new Usuario($nombre, $clave, $mail);

$listaUsuarios = array();
array_push($listaUsuarios, $usuario01);
array_push($listaUsuarios, $usuario02);

// var_dump($listaUsuarios);
// var_dump($usuarioPasado);

foreach ($listaUsuarios as $usuario) {
    $indice = array_search($usuario, $listaUsuarios);

    echo "Comparando usuario ingresado, con usuario registrado nro ". ($indice+1) . " || Resultado: " . $usuarioPasado->ValidarUsuario($usuario) . "\n";
}
