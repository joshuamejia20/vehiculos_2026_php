<?php

    require("../sql/conf.php");
    define('_URL_SYSTEM_', 'C:/xampp/htdocs/vehiculos_2026_php/');
    require_once(_URL_SYSTEM_.'resources/mpdf/vendor/autoload.php');

    date_default_timezone_set('America/El_Salvador');

    setlocale(LC_TIME, 'spanish');

    try {
        session_start();
        $usuario = $_SESSION['ucad_user'];
        $sql = "SELECT * FROM no_normalizada";
        $resultado = mysqli_query($con, $sql);

        if($resultado){
            if(mysqli_num_rows($resultado) > 0){
                /*$items = array();
                while ($row = mysqli_fetch_assoc($resultado)) {
                    $items[] = $row;
                }*/
                $contenido = '
                    <table width="100%" style="border: 1px solid #ccc; margin-top: 550px !important;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Año</th>
                                <th>Tipo</th>
                                <th>Gasolina</th>
                                <th>Transmisión</th>
                                <th>Color</th>
                                <th>Puertas</th>
                            </tr>
                        </thead>
                        <tbody>
                ';

                $contador = 1;
                while($fila = mysqli_fetch_assoc($resultado)){
                    $contenido .= '
                        <tr>
                            <td style="border: 1px solid #ccc;">'.$contador.'</td>
                            <td style="border: 1px solid #ccc;">'.$fila["marca"].'</td>
                            <td style="border: 1px solid #ccc;">'.$fila["modelo"].'</td>
                            <td style="border: 1px solid #ccc;">'.$fila["fecha"].'</td>
                            <td style="border: 1px solid #ccc;">'.$fila["tipo_vehiculo"].'</td>
                            <td style="border: 1px solid #ccc;">'.$fila["tipo_gasolina"].'</td>
                            <td style="border: 1px solid #ccc;">'.$fila["tipo_transmision"].'</td>
                            <td style="border: 1px solid #ccc;">'.$fila["color"].'</td>
                            <td style="border: 1px solid #ccc;">'.$fila["numero_puertas"].'</td>
                        </tr>
                    ';

                    $contador++;
                }

                $contenido .= '
                        </tbody>
                    </table>
                ';

                $texto_encabezado = '
                    <table width="100%">
                        <tr>
                            <td>
                                <img src="'._URL_SYSTEM_.'media/img/ucad.jpeg" width="75" />
                            </td>
                            <td style="text-align:center">
                                UNIVERSIDAD CRISTIANA DE LAS ASAMBLEAS DE DIOS<br>
                                CIENCIAS ECONÓMICAS<br>
                                LISTA DE VEHICULOS REGISTRADOS
                            </td>
                        </tr>
                    </table>
                ';

                $texto_pie = '
                    <table width="100%">
                        <tr>
                            <td width="33%">Fecha Impresión:'.date('d/m/Y H:i:s').'</td>
                            <td width="33%" style="text-align:right;">
                                {PAGENO}
                            </td>
                            <td width="33%">Impreso por: '.$usuario.'</td>
                        </tr>
                    </table>
                ';

                //configuraciones para la creacion del pdf
                $mpdfConfig = array(
                    'mode'=>'utf-8',
                    'format'=>'letter',
                    'default_font_size'=>12,
                    'margin_left'=>30, // equivale a 30mm
                    'margin_right'=>30,
                    'margin_top'=>30,
                    'margin_bottom'=>30,
                    'margin_header'=>30,
                    'margin_footer'=>30,
                    'orientation'=>'P'
                );

                //instanciar la clase MPDF
                $mpdf = new \Mpdf\Mpdf();
                $mpdf->allow_charset_conversion = true;
                $mpdf->charset_in='UTF-8';
                $mpdf->setAutoTopMargin="stretch";
                $mpdf->setAutoBottomMargin="stretch";
                $mpdf->SetHTMLHeader($texto_encabezado);
                $mpdf->SetHTMLFooter($texto_pie);
                $mpdf->writeHTML($contenido);

                #nombrar  el documento
                $file = "datos_vehiculos.pdf";
                $mpdf->output(_URL_SYSTEM_. 'media/tmp/'. $file);

                if(@file_exists(_URL_SYSTEM_. 'media/tmp/'. $file)){
                    $response = array(
                        'success'=>true,
                        'url'=>'media/tmp/'.$file
                    );
                }else{
                    $response = array(
                        'success'=>false,
                        'error'=>"No fue posible crear el archivo PDF"
                    );
                }
            }else{
                $response = array(
                    'success'=>false,
                    'error'=>"No se encontraron vehiculos para imprimir el pdf"
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