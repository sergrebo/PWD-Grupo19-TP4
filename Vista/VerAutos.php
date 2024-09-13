<?php
include_once '../configuracion.php';

$obj = new AbmAuto;
$arregloAutos = [];
$arregloAutos = $obj->buscar($arregloAutos);
if (!empty($arregloAutos)) {
  $objManip = new Manipulacion;
  $cadena = $objManip->imprimirAutos($arregloAutos);
} else {
  $cadena = 'No hay autos registrados.';
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ver Autos</title>
</head>

<body>
  <h1>Lista de autos</h1>
  <ul><?php echo $cadena ?></ul>
</body>

</html>