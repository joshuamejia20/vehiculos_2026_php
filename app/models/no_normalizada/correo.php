<?php

    require("../sql/conf.php");
    define('_URL_SYSTEM_', 'C:/xampp/htdocs/vehiculos_2026_php/');

    //importar PHPMailer
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require _URL_SYSTEM_. "resources/PHPMailer/Exception.php";
    require _URL_SYSTEM_."resources/PHPMailer/PHPMailer.php";
    require _URL_SYSTEM_."resources/PHPMailer/SMTP.php";

    try {
        $id = $_POST['id_no_normalizada'];
        $sql = "SELECT * FROM no_normalizada
            WHERE id_no_normalizada = $id";
        $resultado = mysqli_query($con, $sql);

        if($resultado){
            if(mysqli_num_rows($resultado) > 0){
                $vehiculo = mysqli_fetch_assoc($resultado);

                //crear el cuerpo del correo
                $html = "<h2>Detalle del Vehiculo registrado</h2>";
                $html .= "<table border='1'  style='border-collapse: collapse; width: 100%; font-family: Arial;'>";
                foreach ($vehiculo as $campo => $valor) {
                    $html.= "<tr>
                                <th style='background: #f2f2f2; padding: 8px; text-align: left;'>". ucfirst($campo)."</th>
                                <td style='padding: 8px;'>$valor</td>
                            </tr>";
                }
                $html.="</table>";

                //configuracion de phpmailer para GMAIL
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host='smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'josue.mejia@ucad.edu.sv';
                $mail->Password = 'aquivalaclave';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;
                $mail->CharSet = 'UTF-8';

                $mail->setFrom('josue.mejia@ucad.edu.sv', 'INGENIERO SUPREMO');
                $mail->addAddress('ca22022@ucad.edu.sv', 'Nathaly Contreras');
                $mail->addAddress('mb21148@ucad.edu.sv', 'Natan Martinez');
                $mail->addAddress('ga21038@ucad.edu.sv', 'Roberto Aleman');
                $mail->addCC('pl22034@ucad.edu.sv', 'Esdras Mate');
                $mail->addBCC('mr21181@ucad.edu.sv', 'Josué  Callejas');
                $mail->addBCC('pc22114@ucad.edu.sv', 'Ricardinho ppt');

                $mail->isHTML(true);
                $mail->Subject = 'Información del vehiculo ' .$vehiculo['marca']. ' '. $vehiculo['modelo'];
                $mail->Body= $html;

                $mail->send();

                $response = array(
                    'success'=>true,
                    'msg'=>'Los correos electrónicos fueron enviados exitosamente'
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