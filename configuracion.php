<?php header('Content-Type: text/html; charset=utf-8');
header ("Cache-Control: no-cache, must-revalidate ");

/////////////////////////////
// CONFIGURACION APP//
/////////////////////////////

$PROYECTO ='PHPMYSQL';

//variable que almacena el directorio del proyecto
$ROOT =$_SERVER['DOCUMENT_ROOT']."/$PROYECTO/";

include_once($ROOT.'util/funciones.php');


// Variable que define la pagina de autenticacion del proyecto
$INICIO = "Location:http://".$_SERVER['HTTP_HOST']."/$PROYECTO/vista/login/login.php";

// variable que define la pagina principal del proyecto (menu principal) QUITAMOS LOCATION: PORQUE NO FUNCIONABA EL LINK PARA VOLVER AL INDEX
$PRINCIPAL = "http://".$_SERVER['HTTP_HOST']."/$PROYECTO/index.php";


$_SESSION['ROOT']=$ROOT;

?>