<?php

class Usuario
{
    public $Id;
    public $nombre;
    public $clave;
    public $mail;
    public $fechaRegistro;


    public function __construct($nombre, $clave, $mail)
    {
        $this->Id = Usuario::IdIncremental();
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->mail = $mail;
        $this->fechaRegistro = date("d-m-y H:i:s");
    }

    public static function IdIncremental()
    {
        return rand(1, 10000);
    }

    public static function AltaUsuarioEnArchivo($usuario)
    {
        $archivo = fopen("ejercicio23-usuarios.json", "a+");
        if ($archivo) {
            if (file_put_contents("ejercicio23-usuarios.json", json_encode($usuario, JSON_PRETTY_PRINT))) {
                echo "Datos guardados correctamente en el archivo JSON.";
            } else {
                echo "Error al guardar los datos en el archivo JSON.";
            }
        }
        fclose($archivo);
    }

    public static function GuardarArchivo($fileName, $tempLocation)
    {
        if (isset($fileName, $tempLocation)) {
            $folderName = "Ejercicio23-UsuarioArchivos/";
            $path =  $folderName . $fileName;

            //Si la carpeta no está creada, la crea. Si ya existe, salte el if
            if (!is_dir($folderName)) {
                mkdir($folderName, 0777);
            }

            echo move_uploaded_file($tempLocation, $path) ? "Se guardó el archivo" : "No se pudo guardar el archivo";
        } else {
            echo "El nombre del archivo o la ubicación temporal no están seteadas";
        }
    }
}
