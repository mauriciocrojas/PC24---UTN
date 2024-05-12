<?php

require_once "ejercicio23-usuario.php";
// Aplicación No 23 (Registro JSON)
// Archivo: registro.php
// método:POST
// Recibe los datos del usuario(nombre, clave,mail )por POST ,
// crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000).

// Crear un dato con la fecha de registro , toma todos los datos y utilizar sus métodos para poder hacer
// el alta, guardando los datos en usuarios.json y subir la imagen al servidor en la carpeta
// Usuario/Fotos/.
// retorna si se pudo agregar o no.
// Hacer los métodos necesarios en la clase usuario.

$nombre = $_POST["nombre"];
$clave = $_POST["clave"];
$mail = $_POST["mail"];

$usuario1 = new Usuario($nombre, $clave, $mail);
$usuario2 = new Usuario("NoName", "Nono", "Nn@gmail.com");

$usuarios = array($usuario1, $usuario2);

echo Usuario::AltaUsuarioEnArchivo($usuarios);

$nameFile = $_FILES["file"]["name"];
$locationTemp = $_FILES["file"]["tmp_name"];
$sizeFile = $_FILES["file"]["size"];

echo Usuario::GuardarArchivo($nameFile, $locationTemp);
