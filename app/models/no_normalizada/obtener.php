<?php

    require("../sql/conf.php");

    try {
        $sql = "SELECT id_no_normalizada, marca, modelo, fecha, CAST(tipo_vehiculo as UNSIGNED) tipo_vehiculo, CAST(tipo_gasolina as UNSIGNED) tipo_gasolina, CAST(tipo_transmision as UNSIGNED) tipo_transmision, color, numero_puertas
        FROM no_normalizada
        WHERE id_no_normalizada = '$_POST[id_no_normalizada]'";
        $resultado = mysqli_query($con, $sql);

        if($resultado){
            if(mysqli_num_rows($resultado) > 0){
                $items = array();
                while ($row = mysqli_fetch_assoc($resultado)) {
                    $items[] = $row;
                }

                $response = array(
                    'success'=>true,
                    'data'=>$items,
                    'total'=>mysqli_num_rows($resultado)
                );
            }else{
                $response = array(
                    'success'=>false,
                    'error'=>"No se encontró el vehiculo seleccionado"
                );
                }
        }else{
            $response = array(
                'success'=>false,
                'error'=>"Hay inconvenientees en la consulta, llamen a Brandon" //mysqli_error($con)
            );
        }
    } catch (Exception $e) {
        $response = array(
            'success'=>false,
            'error'=>"Error en la consulta: ". $e->getMessage()
        );
    }

    echo json_encode($response);

?>