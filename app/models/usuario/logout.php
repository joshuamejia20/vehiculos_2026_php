<?php
    session_start();
    //session_destroy();

    unset(
        $_SESSION['ucad_user'],
        $_SESSION['ucad_id_usuario'],
        $_SESSION['ucad_nombre'],
        $_SESSION['ucad_apellidos']
    );

    if(!isset($_SESSION['ucad_user'])){
        $response=array(
            'success'=>true
        );
    }else{
        $response=array(
            'success'=>false,
            'error'=>'No fue posible cerrar la sesión, llamen a Brandon'
        );
    }

    echo json_encode($response);
?>