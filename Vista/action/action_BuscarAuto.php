<?php
include_once '../../configuracion.php';

$datos = data_submitted();
//print_r($datos);
$obj = new AbmAuto;
$arregloAuto = $obj->buscar($datos);
//print_r($arregloAuto);
if (!empty($arregloAuto)) {
  $objManip = new Manipulacion;
  $cadena = $objManip->tablearAuto($arregloAuto);
} else {
  $cadena = 'No existe el auto que tenga la patente ingresada.';
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultado busqueda auto</title>
</head>
<body>
  <h1>Resultado</h1>
  <table> <?php echo $cadena ?> </table>
</body>
</html>