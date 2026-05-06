<?php

    $params = $_POST;
    $resultado = 0;

    //print_r($params);
    switch ((int)$params["operacion"]) {
        case 1:
            $resultado = (int)$params["num1"]  +  (int)$params["num2"];
            break;
        case 2:
            $resultado = (int)$params["num1"]  -  (int)$params["num2"];
            break;
        case 3:
            $resultado = (int)$params["num1"]  *  (int)$params["num2"];
            break;
        case 4:
            $resultado = (int)$params["num1"]  /  (int)$params["num2"];
            break;
        
        default:
            # code...
            break;
    }

    //$respuesta=array('success'=>true, 'resultado'=>$resultado);

    $respuesta=array('success'=>false, 'error'=>"Josué no diferencia entre el indexado y el asociativo");

    echo json_encode($respuesta);

?>