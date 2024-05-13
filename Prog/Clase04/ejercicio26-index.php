<?php

require_once "ejercicio26-clases.php";

// Alumno: Mauricio Rojas
// Aplicación No 26 (RealizarVenta)
// Archivo: RealizarVenta.php
// método:POST
// Recibe los datos del producto(código de barra), del usuario (el id) y la cantidad de ítems.
// Verificar que el usuario y el producto exista y tenga stock.
// Crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000). 
// Carga los datos necesarios para guardar la venta en un nuevo renglón.
// Retorna:
// “venta realizada” se hizo una venta
// “no se pudo hacer“ si no se pudo hacer
// Hacer los métodos necesarios en las clases

$user01 = new User("Mambru");
$user02 = new User("Perez");

$users = array($user01, $user02);

$product01 = new Product(1234, 5);
$product02 = new Product(5678, 6);

$products = array($product01, $product02);

$venta01 = new Shop($_POST["UserName"], $_POST["CodeProduct"], $_POST["Qty"]);

if (
    User::SearchUser($venta01->UserName, $users) &&
    Product::SearchProductAndStock($venta01->CodeProduct, $products, $venta01->qtyShop)
) {
    echo "Venta realizada";
    Shop::SaveShop($venta01);
} else {
    echo "No se pudo realizar la venta";
}
