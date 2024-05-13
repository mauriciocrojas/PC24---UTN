<?php

require_once "ejercicio25-producto.php";

// Alumno: Mauricio Rojas
// Aplicación No 25 ( AltaProducto)
// Archivo: altaProducto.php
// método:POST
// Recibe los datos del producto(código de barra (6 cifras ),nombre ,tipo, stock, precio )por POST ,
// crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000). 
// Crear un objeto y utilizar sus métodos para poder verificar si es un producto existente, si ya existe 
// el producto se le suma el stock , de lo contrario se agrega al documento en un nuevo renglón.
// Retorna un :
// “Ingresado” si es un producto nuevo
// “Actualizado” si ya existía y se actualiza el stock.
// “no se pudo hacer“si no se pudo hacer
// Hacer los métodos necesarios en la clase

$codigoDeBarras = $_POST["codigoDeBarras"];
$nombre = $_POST["nombre"];
$tipo = $_POST["tipo"];
$stock =$_POST["stock"];
$precio =$_POST["precio"];


echo (Producto::AddProduct($codigoDeBarras, $nombre, $tipo, (int)$stock, (int)$precio));
