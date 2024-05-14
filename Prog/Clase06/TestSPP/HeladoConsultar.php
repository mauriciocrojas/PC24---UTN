<?php


// 1era parte
// 2-
// (1pt.) HeladoConsultar.php: (por POST) Se ingresa Sabor y Tipo, si coincide con algún registro del archivo
// heladeria.json, retornar “existe”. De lo contrario informar si no existe el tipo o el nombre.


class HeladoConsultar
{

    public static function SearchIceCreamParam($sabor, $tipo, $helados)
    {
        $cadena = '';
        foreach ($helados as $helado) {
            if ($helado["sabor"] == $sabor && $helado["tipo"] = $tipo) {
                $cadena = "Existe un helado de este tipo o sabor\n";
                break;
            } else {
                $cadena = "No existe un helado de este tipo o sabor\n";
            }
        }
        echo $cadena;
    }
}
