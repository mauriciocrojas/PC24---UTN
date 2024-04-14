<?php

include_once "Ejercicio20-Usuario.php";

// $usuario1 = new Usuario ("Pepe", "pep", "peperoni@cilantro.com");

$nombre = $_POST["nombre"];
$clave = $_POST["clave"];
$mail = $_POST["mail"];

$usuario1 = new Usuario ($nombre, $clave, $mail);

echo Usuario::MostrarUsuario($usuario1);

if(Usuario::DarDeAltaUsuarioEnCsv($usuario1)){
    echo"Se guardó el usuario en el archivo csv<br>";

}else{
    echo"No se pudo guardar el usuario en el archivo csv<br>";
}

?>