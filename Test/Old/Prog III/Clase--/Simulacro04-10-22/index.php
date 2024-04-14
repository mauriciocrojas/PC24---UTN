<?php

// Se debe realizar una aplicación para dar de ingreso con imagen del item.
// Se deben respetar los nombres de los archivos y de las clases.
// Se debe crear una clase en PHP por cada entidad y los archivos PHP solo deben llamar a métodos de las clases.

// 1era parte

// 1-
// A- (1 pt.) index.php:Recibe todas las peticiones que realiza el postman, y administra a que archivo se debe incluir.
// B- (1 pt.) PizzaCarga.php: (por GET)se ingresa Sabor, precio, Tipo (“molde” o “piedra”), cantidad( de unidades). Se
// guardan los datos en en el archivo de texto Pizza.json, tomando un id autoincremental como
// identificador(emulado) .Sí el sabor y tipo ya existen , se actualiza el precio y se suma al stock existente.
// 2-
// (1pt.) PizzaConsultar.php: (por POST)Se ingresa Sabor,Tipo, si coincide con algún registro del archivo Pizza.json,
// retornar “Si Hay”. De lo contrario informar si no existe el tipo o el sabor.

// Código Obsoleto, copiado y pegado que no tenga utilidad (-1 punto).

// Se pueden bajar templetes de internet o traer código hecho, pero en ningún caso se debe incluir código obsoleto o que no
// cumpla ninguna función dentro del parcial.
// Se tiene que sumar 8 puntos para lograr un cuatro (4).
// Nueve puntos equivalen a un cinco (5),
// Diez puntos equivalen a seis (6),
// Once puntos: siete (7),
// Doce puntos a un ocho (8),
// Trece puntos equivale a un nueve (9)
// Y si se suman los catorce puntos la nota será de diez (10).


include_once "Pizza.php";

$sabor = $_GET["sabor"];
$precio = $_GET["precio"];
$tipo = $_GET["tipo"];
$cantidad = $_GET["cantidad"];

$saborCheq = $_POST["saborCheq"];
$tipoCheq = $_POST["tipoCheq"];
$precioCheq = $_POST["precioCheq"];
$cantidadCheq = $_POST["cantidadCheq"];

//$imagenUsuario = $_FILES["imagenusuario"];

// $pizza00 = new Pizza ("Palta", 50, 5, "Molde");
// $pizza01 = new Pizza ("Jamon", 40, 4, "Piedra");

//Recibo pizza desde GET
$pizza00 = new Pizza ($sabor, $precio, $tipo, $cantidad);

//Genero un array con la pizza recibida por GET
$pizzas0 = array ($pizza00);

//Guardo el objeto json
Pizza::PizzaCarga($pizzas0, "JsonSimulacroPP.json");

//Recibo pizza desde POST
$pizza01 = new Pizza ($saborCheq, $tipoCheq, $precioCheq, $cantidadCheq);

//Genero un array con la pizza recibida por POST
$pizzas1 = array ($pizza01);

//Leo el archivo, y lo guardo en una variable
$guardadoDesdeLectura = Pizza::PizzaLeer("JsonSimulacroPP.json");
echo $guardadoDesdeLectura;

//Genero un array desde el json
$arrayGeneradoDesdeLectura = Pizza::InsertarJsonEnArray($guardadoDesdeLectura);

//Consulto si lo que se envió por POST existe dentro del archivo json 
echo Pizza::PizzaConsultar($arrayGeneradoDesdeLectura, $saborCheq, $tipoCheq);



?>