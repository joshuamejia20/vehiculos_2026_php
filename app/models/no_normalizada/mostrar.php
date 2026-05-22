<?php

require("../sql/conf.php");

try {
    $params = $_POST;

    //variables para paginacion del datatable
    $params['limit'] = $params['length'];
   $params['order_column'] = $params['columns'][$params['order'][0]['column']]['data'];
   //$params['order_column'] = $params['order'][0]['column'];
    $params['order'] = $params['order'][0]['dir'];
    $params['query'] = ($params['search']['value'] != "") ? '%' . $params['search']['value'] . "%" : '%';
    $sql = "SELECT SQL_CALC_FOUND_ROWS * 
            FROM no_normalizada
            WHERE 
            marca LIKE '$params[query]'
            OR modelo LIKE '$params[query]'
            OR fecha LIKE '$params[query]'
            OR tipo_vehiculo LIKE '$params[query]'
            OR tipo_gasolina LIKE '$params[query]'
            OR tipo_transmision LIKE '$params[query]'
            OR color LIKE '$params[query]'
            OR numero_puertas LIKE '$params[query]'
            ORDER BY $params[order_column] $params[order]
            LIMIT $params[start], $params[limit]";
            //print_r($sql);
    $resultado = mysqli_query($con, $sql);

    if ($resultado) {
        if (mysqli_num_rows($resultado) > 0) {

            $sql = "SELECT FOUND_ROWS() as total";
            $conteo = mysqli_query($con, $sql);
            $numero = 0;
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $response['data'][$numero]['numero'] = $fila['numero'];
                $response['data'][$numero]['marca'] = $fila['marca'];
                $response['data'][$numero]['modelo'] = $fila['modelo'];
                $response['data'][$numero]['fecha'] = $fila['fecha'];
                $response['data'][$numero]['color'] = $fila['color'];
                $response['data'][$numero]['numero_puertas'] = $fila['numero_puertas'];
                $response['data'][$numero]['tipo_gasolina'] = $fila['tipo_gasolina'];
                $response['data'][$numero]['id_no_normalizada'] = $fila['id_no_normalizada'];
                $response['data'][$numero]['tipo_transmision'] = $fila['tipo_transmision'];
                $response['data'][$numero]['tipo_vehiculo'] = $fila['tipo_vehiculo'];

                $numero++;
            }

            while($fila=mysqli_fetch_assoc($conteo)){
                $total=intval($fila['total']);
            }


            $response['recordsTotal']=((mysqli_num_rows($conteo)>0) ? $total : 0);
            $response['recordsFiltered']=((mysqli_num_rows($conteo)>0) ? $total : 0);



            /*$response = array(
                'success' => true,
                'data' => $ree,
                'total' => mysqli_num_rows($resultado)
            );*/
        } else {
            $response = array(
                'success' => false,
                'error' => "No se encontraron vehiculos"
            );
        }
    } else {
        $response = array(
            'success' => false,
            'error' => "Hay inconvenientes en la consulta, llamen a Brandon" //mysqli_error($con)
        );
    }
} catch (Exception $e) {
    $response = array(
        'success' => false,
        'error' => "Error en la consulta: " . $e->getMessage()
    );
}

echo json_encode($response);
