<?php
include_once "Ejercicio23-Usuario.php";

$nombre = $_POST["nombre"];
$clave = $_POST["clave"];
$mail = $_POST["mail"];
$imagenUsuario = $_FILES["imagenusuario"];

// $nombre2 = $_POST["nombre2"];
// $clave2 = $_POST["clave2"];
// $mail2 = $_POST["mail2"];
// $imagenUsuario2 = $_FILES["imagenusuario2"];

$usuario = new Usuario ($nombre, $mail, $clave, $imagenUsuario["name"]);

//var_dump($_POST);
//var_dump($_FILES);


// $usuario2 = new Usuario ($nombre2, $mail2, $clave2, $imagenUsuario["name"]);


// $destino = "ImagenesUsuario/". $imagenUsuario["name"];

// if(move_uploaded_file($imagenUsuario["tmp_name"], $destino)){
//     echo "Se pudo guardar la imgen";
// }
// else{
//     echo "No se guardó la imagen";
// }

if($usuario->GuardarImagen($imagenUsuario["name"], $imagenUsuario["tmp_name"])){
    echo "Se pudo guardar la imagen";
}
else{
    echo "No se guardó la imagen";
}

$usuario->GuardarUserJson($usuario, "ArchivosUsuarioEj23/usuarios.json");

?>