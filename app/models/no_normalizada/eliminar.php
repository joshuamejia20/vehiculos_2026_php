<?php
require("../sql/conf.php");
try {

    $sql = "DELETE FROM no_normalizada
            WHERE id_no_normalizada='$_POST[id_no_normalizada]'";
    $del_vehiculo = mysqli_query($con, $sql);

    if (mysqli_affected_rows($con) > 0) {
        $response = array(
            'success' => true,
            'msg' => "Vehiculo eliminado exitosamente"
        );
    } else {
        $response = array(
            'success' => false,
            'error' => "Error al eliminar el vehiculo"
        );
    }
} catch (Exception $e) {
    $response = array(
        'success' => false,
        'error' => "Error en la consulta: " . $e->getMessage()
    );
}

echo json_encode($response);
