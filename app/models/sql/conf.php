<?php

error_reporting("E_ALL"); // E_ERROR

$servidor = "localhost"; //127.0.0.1 10.2.0.15
$usuario = "root";
$clave = "";
$base = "bd_vehiculos_2026";
$puerto = 3306;

$con = mysqli_connect($servidor, $usuario, $clave, $base, $puerto);

if($con){
    $con->set_charset("utf-8");
}else{
    $response = array(
        'success'=>false,
        'error'=>'No hay conexión a la base de datos'
    );
    echo json_encode($response);
    exit();
}

?>