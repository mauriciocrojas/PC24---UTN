<?php

require_once "HeladeriaAlta.php";
require_once "HeladoConsultar.php";


// Mauricio Rojas

// 1era parte
// 1-
// A- (1 pt.) 
// index.php: Recibe todas las peticiones que realiza el postman, y administra a qué archivo se debe incluir.

// 1:

$sabor = $_POST["sabor"];
$precio = $_POST["precio"];
$tipo = $_POST["tipo"];
$vaso = $_POST["vaso"];
$stock = $_POST["stock"];

// echo (HeladeriaAlta::AddProduct($sabor, (int)$precio, $tipo, $vaso, (int)$stock));

// $ubicacionTemp = $_FILES["file"]["tmp_name"];

// echo HeladeriaAlta::SaveFileLoaded($ubicacionTemp, $sabor, $tipo);

// 2:

//HeladeriaAlta::GetContentFile();
echo HeladoConsultar::SearchIceCreamParam($sabor,$tipo,HeladeriaAlta::ReturnArray());


// 3a: