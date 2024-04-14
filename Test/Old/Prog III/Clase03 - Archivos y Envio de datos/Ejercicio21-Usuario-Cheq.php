<?php

/*
Aplicación Nº 21 ( Listado CSV y array de usuarios)
Archivo: listado.php
método:GET
Recibe qué listado va a retornar(ej:usuarios,productos,vehículos,...etc),por ahora solo tenemos
usuarios).
En el caso de usuarios carga los datos del archivo usuarios.csv.
se deben cargar los datos en un array de usuarios.
Retorna los datos que contiene ese array en una lista
<ul>
<li>Coffee</li>
<li>Tea</li>
<li>Milk</li>
</ul>
Hacer los métodos necesarios en la clase usuario

Mauricio Rojas
Ej 21
*/


class Usuario {

    private $_nombre;
    private $_clave;
    private $_mail;

    public function __construct($_nombre, $_clave, $_mail)
    {
        $this->_nombre = $_nombre;
        $this->_clave = $_clave;
        $this->_mail = $_mail;
    }


    public static function MostrarUsuario($usuario){
        return "Nombre: ". $usuario->_nombre . ", Clave: ". $usuario->_clave . ", Mail: ". $usuario->_mail."<br>";
    }

    public static function GenerarArray($listado){
        $usuarios = array();
       foreach ($listado as $usuario){
        array_push($usuarios, $usuario);
       }
       return $usuarios;
    }
}


?>