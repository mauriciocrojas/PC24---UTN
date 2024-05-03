<?php
// Alumno: Mauricio Rojas
// Validar
// Aplicación No 21 ( Listado CSV y array de usuarios)
// Archivo: listado.php
// método:GET
// Recibe qué listado va a retornar(ej:usuarios,productos,vehículos,...etc),por ahora solo tenemos
// usuarios).
// En el caso de usuarios carga los datos del archivo usuarios.csv.
// se deben cargar los datos en un array de usuarios.
// Retorna los datos que contiene ese array en una lista

// <ul>
// <li>Coffee</li>
// <li>Tea</li>
// <li>Milk</li>
// </ul>
// Hacer los métodos necesarios en la clase usuario


require_once "ejercicio21-usuario.php";

$nombre = $_GET["usuario"];
$clave = $_GET["clave"];
$mail = $_GET["mail"];


$usuario01 = new Usuario("Mau", "TopSecret", "mau@gmail.com");
$usuario02 = new Usuario($nombre, $clave, $mail);

$lista = array();

array_push($lista, $usuario01);
array_push($lista, $usuario02);

foreach ($lista as $usuario) {
    echo (Usuario::MostrarUsuario($usuario));
}


// var_dump($lista);
// var_dump($_GET);
