<?php

    require("../sql/conf.php");

    try {
        $filtro = $_POST["query"];
        $sql = "SELECT id_marca id,  nombre text 
        FROM marca
        WHERE CAST(estado as UNSIGNED)=1
        AND nombre LIKE '$filtro%'";
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
                    'error'=>"No se encontraron vehiculos"
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