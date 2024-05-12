<?php

// Alumnno: Mauricio Rojas
// Aplicación No 24 ( Listado JSON y array de usuarios)
// Archivo: listado.php
// método:GET
// Recibe qué listado va a retornar(ej:usuarios,productos,vehículos,etc.),por ahora solo tenemos
// usuarios).
// En el caso de usuarios carga los datos del archivo usuarios.json.
// se deben cargar los datos en un array de usuarios.
// Retorna los datos que contiene ese array en una lista.
// Hacer los métodos necesarios en la clase usuario

require_once "ejercicio24-usuario.php";

$users = array();

$users = Usuario::GetDataJson("ejercicio23-usuarios.json");

//var_dump ($users);

echo Usuario::ShowUsers($users);