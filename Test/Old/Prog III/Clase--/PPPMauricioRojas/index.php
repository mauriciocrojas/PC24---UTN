<?php

$_DELETE = array();
$method = $_SERVER["REQUEST_METHOD"];


switch ($method) {
    case "POST":
        switch (key($_POST)) {
            case "Cargar":
                include "HeladeriaCarga.php";
                include "HeladoConsultar.php";
                break;
            }
        break;
}
?>