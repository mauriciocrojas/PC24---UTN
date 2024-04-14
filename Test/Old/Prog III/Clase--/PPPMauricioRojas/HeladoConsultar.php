<?php

require_once 'Helado.php';

    if(isset($_POST['Sabor']) && isset($_POST['Tipo'])){
        $hFlavor = $_POST['Sabor'];
        $hType = $_POST['Tipo'];
        var_dump(key($_POST));

        //--- Gets the old array of objects from the file. ---//
        $myArray = Helado::ReadJSON();

        echo '<h1>Helado a Buscar</h1><br>';
        echo '<h2> Sabor: '.$hFlavor.' | Tipo: '.$hType.'</h2><br>';

        //--- search the object in the array. ---//
        echo '<h3>Resultado de la Busqueda: de '.$hFlavor.' y '.$hType.'</h3>';
        echo '<h3>'.Helado::SearchFor($myArray, $hFlavor, $hType).'</h3> <br>';
    } 
?>