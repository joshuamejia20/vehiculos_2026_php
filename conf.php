<?php

define('MODULO_DEFECTO', 'login');
define('LAYOUT_LOGIN', 'login.php');
define('LAYOUT_DESKTOP', 'desktop.php');
define('MODULO_PATH', realpath('app/views'));
define('LAYOUT_PATH', realpath('app/templates'));

$conf['error']=array(
    'archivo'=>"404.php",
    'layout'=>LAYOUT_LOGIN
);
$conf['login']=array(
    'archivo'=>"login.php",
    'layout'=>LAYOUT_LOGIN
);
$conf['vehiculos']=array(
    'archivo'=>"crud.html",
    'layout'=>LAYOUT_DESKTOP
);
$conf['ricardinho']=array(
    'archivo'=>"presentacion.html",
    'layout'=>LAYOUT_DESKTOP
);
$conf['marca']=array(
    'archivo'=>"marca.html",
    'layout'=>LAYOUT_DESKTOP
);
$conf['home']=array(
    'archivo'=>"home.php",
    'layout'=>LAYOUT_DESKTOP
);

?>