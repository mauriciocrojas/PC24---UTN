<?php


header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER['REQUEST_METHOD'];
if($method == "OPTIONS") {
    die();
}

sleep(3);

if($method == "GET") {
    echo '[{"id":1, "nombre":"Clark", "apellido":"Kent", "edad":45, "alterego":"Superman", "ciudad":"Metropolis", "publicado":2002},{"id":2, "nombre":"Bruce", "apellido":"Wayne", "edad":35, "alterego":"Batman", "ciudad":"Gotica", "publicado":20012},{"id":3, "nombre":"Bart", "apellido":"Alen", "edad":30, "alterego":"Flash", "ciudad":"Central", "publicado":2017},{"id":4, "nombre":"Lex", "apellido":"Luthor", "edad":18, "enemigo":"Superman", "robos":500, "asesinatos":7},{"id":5, "nombre":"Harvey", "apellido":"Dent", "edad":20, "enemigo":"Batman", "robos":750, "asesinatos":2},{"id":666, "nombre":"Celina", "apellido":"kyle", "edad":23, "enemigo":"Batman", "robos":25, "asesinatos":0}]';
    die();
}




if($method == "DELETE") {
    $objeto = json_decode(file_get_contents('php://input'), true);

    if (isset($objeto['id'])==false || $objeto['id'] == 666 || $objeto['id'] == "666") {
        http_response_code(400);
        echo "Error No se pudo procesar";
        die();
    }
    
    echo "Exito";
    die();
}


if($method == "POST") {
    $objeto = json_decode(file_get_contents('php://input'), true);

    $estHeroe=1;
    $estVillano=1;

    if (isset($objeto['id'])==false || isset($objeto['nombre'])==false || isset($objeto['apellido'])==false || isset($objeto['edad'])==false || isset($objeto['alterego'])==false || isset($objeto['ciudad'])==false || isset($objeto['publicado'])==false)   {
        $estHeroe=0;
    }

    if (isset($objeto['id'])==false || isset($objeto['nombre'])==false || isset($objeto['apellido'])==false || isset($objeto['edad'])==false || isset($objeto['enemigo'])==false || isset($objeto['robos'])==false || isset($objeto['asesinatos'])==false)   {
        $estVillano=0;
    }

    if ($estHeroe==0 && $estVillano==0){
        http_response_code(400);
        echo "Estructura Incorrecta";
        die();
    }
    
    
    if ($objeto['id']==666) {
        http_response_code(400);
        echo "Error No se pudo procesar";
        die();
    }
    
    echo "Exito";
    die();
}


if($method == "PUT") {
    $objeto = json_decode(file_get_contents('php://input'), true);
    $estHeroe=1;
    $estVillano=1;

    if (isset($objeto['nombre'])==false || isset($objeto['apellido'])==false || isset($objeto['edad'])==false || isset($objeto['alterego'])==false || isset($objeto['ciudad'])==false || isset($objeto['publicado'])==false)   {
        $estHeroe=0;
    }

    if (isset($objeto['nombre'])==false || isset($objeto['apellido'])==false || isset($objeto['edad'])==false || isset($objeto['enemigo'])==false || isset($objeto['robos'])==false || isset($objeto['asesinatos'])==false)   {
        $estVillano=0;
    }
   
    if ($estVillano==0 && $estHeroe==0){
        http_response_code(400);
    //    $s=$objeto['nombre']. $objeto['apellido'].$objeto['edad'].$objeto['titulo'].$objeto['facultad'].$objeto['anoGraduacion']; 
        echo "Estructura Incorrecta";
        die();
    }

    $s = (string)time();
    echo '{"id":' . $s . "}";
    die();
}

?>