<?php


class User
{
    public $userName;
    public $idUser;

    public function __construct($userName)
    {
        $this->userName = $userName;
        $this->idUser = rand(1, 1000);
    }


    public static function SearchUser($userEntry, $users)
    {
        foreach ($users as $user) {
            if ($user->userName == $userEntry) {
                return true;
            }
        }
        return false;
    }
}


class Product
{
    public $codigoDeBarras;
    public $stock;
    public $idProduct;
    public $products = array();

    public function __construct($codigoDeBarras, $stock)
    {
        $this->codigoDeBarras = $codigoDeBarras;
        $this->stock = $stock;
        $this->idProduct = rand(1, 1000);
        $this->products = [];
    }

    public static function SearchProductAndStock($codeEntry, $products, $qtyShop)
    {
        foreach ($products as $product) {
            if ($product->codigoDeBarras == $codeEntry && $product->stock >= $qtyShop) {
                return true;
            }
        }
        return false;
    }
}

class Shop
{
    public $UserName;
    public $CodeProduct;
    public $qtyShop;
    public $idShop;

    public function __construct($UserName, $CodeProduct, $qtyShop)
    {
        $this->idShop = rand(1, 1000);
        $this->UserName = $UserName;
        $this->CodeProduct = $CodeProduct;
        $this->qtyShop = $qtyShop;
    }

    public static function SaveShop($venta)
    {
        $destino = "ejercicio26-ventas.json";
        $contenido = json_encode($venta, JSON_PRETTY_PRINT);
        file_put_contents($destino, $contenido, FILE_APPEND);
    }
}
