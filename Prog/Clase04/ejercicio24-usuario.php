<?php

class Usuario
{

    public static function GetDataJson($pathFile)
    {
        $file = fopen($pathFile, "r");

        if ($file) {
            $content = file_get_contents($pathFile);
            $data = json_decode($content, true);
        }
        fclose($file);
        return $data;
    }

    public static function ShowUsers($usuarios)
    {
        $cadena = "Usuarios: <br>\n";
        foreach ($usuarios as $usuario) {
            $cadena .= "Id: " . $usuario["Id"] .
                " Nombre: " . $usuario["nombre"] .
                " Clave: " . $usuario["clave"] .
                " Mail: " . $usuario["mail"] .
                " Fecha registro: " . $usuario["fechaRegistro"] . "<br>\n";
        }
        echo $cadena;
    }
}
