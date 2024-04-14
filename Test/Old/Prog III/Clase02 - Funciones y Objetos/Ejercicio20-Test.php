<?php
/*
Aplicación Nº 20 (Auto - Garage)
Crear la clase Garage que posea como atributos privados:
_razonSocial (String)
_precioPorHora (Double)
_autos (Autos[], reutilizar la clase Auto del ejercicio anterior)
Realizar un constructor capaz de poder instanciar objetos pasándole como
parámetros: i. La razón social.
ii. La razón social, y el precio por hora.
Realizar un método de instancia llamado “MostrarGarage”, que no recibirá parámetros y
que mostrará todos los atributos del objeto.
Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un
objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.
Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage”
(sólo si el auto no está en el garaje, de lo contrario informarlo).
Ejemplo: $miGarage->Add($autoUno);
Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del
“Garage” (sólo si el auto está en el garaje, de lo contrario informarlo). Ejemplo:
$miGarage->Remove($autoUno);
Crear un método de clase para poder hacer el alta de un Garage y, guardando los datos en un
archivo garages.csv.
Hacer los métodos necesarios en la clase Garage para poder leer el listado desde el archivo
garage.csv
Se deben cargar los datos en un array de garage.
En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos
los métodos.
*/

include_once "Ejercicio19-Auto.php";
include_once "Ejercicio20-Garage.php";


$auto1= new Auto("Peugeot", "Negro", 30000, Date("d/m/Y"));
$auto2= new Auto("Honda", "Dorado", 40000, Date("12/03/2023"));
$auto3= new Auto("Fiat", "Verde", 20000);
$auto4= new Auto("Peugeot", "Negro", 30000, Date("d/m/Y"));


echo "<b>Auto 1:</b> <br>". Auto::MostrarAuto($auto1)."<br>";
echo "<b>Auto 2:</b> <br>". Auto::MostrarAuto($auto2)."<br>";
echo "<b>Auto 3:</b> <br>". Auto::MostrarAuto($auto3)."<br>";
echo "<b>Auto 4:</b> <br>". Auto::MostrarAuto($auto3)."<br>";

echo "<b>Comparo auto1 y auto 2:<br></b>";
if($auto1->Equals($auto1, $auto2)){
    echo "Son iguales<br><br>";
}else{
    echo "No son iguales<br><br>";
}

echo "<b>Comparo auto1 y auto 2:<br></b>";
if($auto1->Equals($auto1, $auto4)){
    echo "Son iguales<br><br>";
}else{
    echo "No son iguales<br><br>";
}

echo "<b>Creo el garage la tranquera y lo muestro: <br></b>";
$garage1 = new Garage ("La tranquera", 250);
echo  $garage1->MostrarGarage();

echo "<b>Intento agregar el auto1 al garage La tranquera: <br></b>";
if($garage1->Add($auto1)){
    echo "Se agrego el auto1 al garage<br><br>";
}else{
    echo "No se agregó el auto 1 al garage ya que este ya se encuentra en el mismo<br><br>";
}

echo "<b>Intento agregar el auto1 nuevamente al garage La tranquera: <br></b>";
if($garage1->Add($auto1)){
    echo "Se agrego el auto1 al garage<br><br>";
}else{
    echo "No se agregó el auto 1 al garage ya que este ya se encuentra en el mismo<br><br>";
}

echo "<b>Muestro el garage La tranquera: <br></b>";
echo  $garage1->MostrarGarage();

echo "<b>Elimino el auto1 del garage La tranquera: <br></b>";
if($garage1->Remove($auto1)){
    echo "Se eliminó el auto1 al garage<br><br>";
}else{
    echo "No se pudo eliminar el auto 1 del garage ya que este no se encuentra en el mismo<br><br>";
}

echo "<b>Muestro el garage La tranquera: <br></b>";
echo  $garage1->MostrarGarage();

echo "<b>Intento eliminar el auto1 nuevamente del garage La tranquera: <br></b>";
if($garage1->Remove($auto1)){
    echo "Se eliminó el auto1 al garage<br><br>";
}else{
    echo "No se pudo eliminar el auto 1 del garage ya que este no se encuentra en el mismo<br><br>";
}

echo "<b>Muestro el garage La tranquera: <br></b>";
echo  $garage1->MostrarGarage();

echo "<b>Intento agregar el auto1, auto2, y auto 3 al garage La tranquera: <br></b>";
if($garage1->Add($auto1) && $garage1->Add($auto2) && $garage1->Add($auto3)){
    echo "Se agrego el auto 1, 2, y 3 al garage<br><br>";
}else{
    echo "No se agregaron auto 1, 2, y 3  al garage ya que estos ya se encuentran en el mismo<br><br>";
}

//Parte archivos:
echo "<b> Se guardó los datos hasta el momento del garage en un archivo CSV.</b><br><br>";
Garage::DarAltaGarage($garage1);
//


echo "<b>Muestro el garage La tranquera: <br></b>";
echo  $garage1->MostrarGarage();

echo "<b>Elimino el auto3 del garage La tranquera: <br></b>";
if($garage1->Remove($auto3)){
    echo "Se eliminó el auto3 al garage<br><br>";
}else{
    echo "No se pudo eliminar el auto 3 del garage ya que este no se encuentra en el mismo<br><br>";
}

echo "<b>Muestro el garage La tranquera: <br></b>";
echo  $garage1->MostrarGarage();

echo "<b>Elimino el auto1 del garage La tranquera: <br></b>";
if($garage1->Remove($auto1)){
    echo "Se eliminó el auto1 al garage<br><br>";
}else{
    echo "No se pudo eliminar el auto 1 del garage ya que este no se encuentra en el mismo<br><br>";
}

echo "<b>Muestro el garage La tranquera: <br></b>";
echo  $garage1->MostrarGarage();

echo "<b>Elimino el auto2 del garage La tranquera: <br></b>";
if($garage1->Remove($auto2)){
    echo "Se eliminó el auto2 al garage<br><br>";
}else{
    echo "No se pudo eliminar el auto 2 del garage ya que este no se encuentra en el mismo<br><br>";
}

echo "<b>Muestro el garage La tranquera: <br></b>";
echo  $garage1->MostrarGarage();

//Parte archivos:
echo "<br><b> Parte lectura archivos: </b><br>";

echo "<br><b> Con Feof y Fgets: </b><br>";
echo Garage::LeerGarageDesdeCsvConFeofyFgets("GaragesEj20.csv");

echo "<br><b> Con Fread: </b><br>";
echo Garage::LeerGarageDesdeCsvconFread("GaragesEj20.csv");

?>