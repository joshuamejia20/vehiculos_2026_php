<?php

    require("../sql/conf.php");

    try {
        $sql = "SELECT u.id_usuario, u.nombres, u.apellidos, u.usuario, CAST(u.estado as UNSIGNED) estado_usuario
            FROM usuario u
            INNER JOIN clave c ON u.id_usuario=c.id_usuario AND CAST(c.estado as UNSIGNED)=1
            WHERE u.usuario='$_POST[usuario]'
            AND c.clave=PASSWORD('$_POST[contrasena]')";
        $resultado = mysqli_query($con, $sql);

        if($resultado){
            if(mysqli_num_rows($resultado) > 0){
                $items = array();
                while ($row = mysqli_fetch_assoc($resultado)) {
                    $items[] = $row;
                }

                if((int)$items[0]['estado_usuario']==2){
                    $response=array(
                        'success'=>false,
                        'error'=>'Cuenta de usuario inactiva'
                    );
                    echo json_encode($response);
                    exit();
                }else{
                    session_start();
                    $_SESSION['ucad_user']=$items[0]['usuario'];
                    $_SESSION['ucad_id_usuario']=$items[0]['id_usuario'];
                    $_SESSION['ucad_nombre']=$items[0]['nombres'];
                    $_SESSION['ucad_apellidos']=$items[0]['apellidos'];
                }

                $response = array(
                    'success'=>true,
                    'data'=>$items,
                    'total'=>mysqli_num_rows($resultado)
                );
            }else{
                $response = array(
                    'success'=>false,
                    'error'=>"Credenciales incorrectas"
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