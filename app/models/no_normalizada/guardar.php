<?php
require '../sql/conf.php';

try {

    if ($_POST["id_no_normalizada"] != "") {
        $id_insertado = $_POST['id_no_normalizada'];
            $sql = "CALL extraer_datos($id_insertado, 'no_normalizada', @datos)";
            $solicitar_datos = mysqli_query($con, $sql);

            $sql = "SELECT @datos";
            $registro_datos = mysqli_query($con, $sql);

            $datos = mysqli_fetch_assoc($registro_datos);
            $info_previa = $datos['@datos'];
        $sql = "UPDATE no_normalizada
            SET marca='$_POST[marca]',
            modelo='$_POST[modelo]',
            fecha='$_POST[fecha]',
            tipo_vehiculo='$_POST[tipo_vehiculo]',
            tipo_gasolina='$_POST[tipo_gasolina]',
            tipo_transmision='$_POST[tipo_transmision]',
            color='$_POST[color]',
            numero_puertas='$_POST[numero_puertas]'
            WHERE id_no_normalizada='$_POST[id_no_normalizada]'";
        $update_vehiculo = mysqli_query($con, $sql);

        if (mysqli_affected_rows($con) > 0) {
            $sql = "CALL extraer_datos($id_insertado, 'no_normalizada', @datos)";
            $solicitar_datos = mysqli_query($con, $sql);

            $sql = "SELECT @datos";
            $registro_datos = mysqli_query($con, $sql);

            $datos = mysqli_fetch_assoc($registro_datos);
            $info_posterior = $datos['@datos'];
            session_start();
            $id_usuario = $_SESSION['ucad_id_usuario'];

            $sql = "CALL registrar_bitacora($id_insertado, 'no_normalizada', 4, $id_usuario, '$info_previa', '$info_posterior')";
            $registro_bitacora = mysqli_query($con, $sql);
            $response = array(
                'success' => true,
                'msg'=>'Vehiculo actualizado exitosamente'
            );
        } else {
            $response = array(
                'success' => false,
                'error' => 'NO fue posible actualizar el registro'
            );
        }
    } else {
        $info_previa = "";
        $sql = "INSERT INTO no_normalizada(marca, modelo, fecha, tipo_vehiculo, tipo_gasolina, tipo_transmision, color, numero_puertas)
        VALUES('$_POST[marca]', '$_POST[modelo]', '$_POST[fecha]', '$_POST[tipo_vehiculo]', '$_POST[tipo_gasolina]', '$_POST[tipo_transmision]', '$_POST[color]', '$_POST[numero_puertas]')";
        $insert_tabla = mysqli_query($con, $sql);

        if (mysqli_insert_id($con) > 0) {
            $id_insertado = mysqli_insert_id($con);
            $sql = "CALL extraer_datos($id_insertado, 'no_normalizada', @datos)";
            $solicitar_datos = mysqli_query($con, $sql);

            $sql = "SELECT @datos";
            $registro_datos = mysqli_query($con, $sql);

            $datos = mysqli_fetch_assoc($registro_datos);
            $info_posterior = $datos['@datos'];
            session_start();
            $id_usuario = $_SESSION['ucad_id_usuario'];

            $sql = "CALL registrar_bitacora($id_insertado, 'no_normalizada', 3, $id_usuario, '$info_previa', '$info_posterior')";
            $registro_bitacora = mysqli_query($con, $sql);

            $response = array(
                'success' => true,
                'msg' => 'Registro realizado exitosamente'
            );
        } else {
            $response = array(
                'success' => false,
                'error' => 'Error al registrar el vehiculo'
            );
        }
    }
} catch (Exception $e) {
    $response = array(
        'success' => false,
        'error' => 'Error en el modelo: ' . $e->getMessage()
    );
}

echo json_encode($response);
