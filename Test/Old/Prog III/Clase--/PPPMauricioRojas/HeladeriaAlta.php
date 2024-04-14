<?php

require_once "Helado.php";
    
    if(isset($_POST["Sabor"]) && isset($_POST["Precio"]) && 
        isset($_POST["Tipo"]) && isset($_POST["Stock"])){
        $pSabor = $_POST["Sabor"];
        $pPrecio = floatval($_POST["Precio"]);
        $pTipo = $_POST["Tipo"];
        $pStock = intval($_POST["Stock"]);

        $pID = rand(1, 1000);
        $miHeladeria = Helado::HeladoAlta($pID, $pSabor, $pTipo, $pPrecio, $pStock);
        echo "<h3>Producto a Buscar:</h3>"."<br>";
        Helado::printSingleProductAsTable($miHeladeria);

        echo Helado::actualizarArchivo($miHeladeria, "add");
        
    }else{
        echo "Faltan datos";
    }
?>