<?php

// Alumno: Mauricio Rojas
// Aplicación No 20 BIS (Registro CSV)
// Archivo: registro.php
// método:POST
// Recibe los datos del usuario(nombre, clave,mail )por POST ,
// crear un objeto y utilizar sus métodos para poder hacer el alta,
// guardando los datos en usuarios.csv.
// retorna si se pudo agregar o no.

// Cada usuario se agrega en un renglón diferente al anterior.
// Hacer los métodos necesarios en la clase usuario

require_once "ejercicio20bis-usuario.php";

$nombre = $_POST["usuario"];
$clave = $_POST["clave"];
$mail = $_POST["mail"];

echo Usuario::DarDeAltaUsuarioEnCsv($nombre,$clave,$mail)? "Se pudo agregar el usuario <br>" : "No se pudo agregar el usuario <br>";
