<?php
include_once '../estructura/cabecera.php';

$datos = data_submitted();
$objAbmAuto = new AbmAuto;
$arregloAutoEncontrado = $objAbmAuto->buscar($datos);
if (empty($arregloAutoEncontrado)) {
  //El vehículo no esta registrado
  $cadena = 'El vehículo no se encuentra registrado.';
} else {
  //El vehículo esta cargado como un único objeto Auto en $arregloAutoEncotrado
  $elObjAuto = $arregloAutoEncontrado[0];
  $objAbmPersona = new AbmPersona;
  $arregloPersonaEncontrada = $objAbmPersona->buscar($datos);
  if (empty($arregloPersonaEncontrada)) {
    //La persona no esta registrada
    $cadena = 'La persona no se encuentra registrada.';
  } else {
    //La persona esta en forma de un objeto Persona en el arreglo $arregloPersonaEncontrada como unico elemento
    $arregloAuto = $objAbmAuto->cambiarDuenio($elObjAuto, $datos['NroDni']);
    $resp = $objAbmAuto->modificacion($arregloAuto);
    if ($resp) {
      $cadena = 'Ha sido actualizado del propietario de vehículo';
    } else {
      $cadena = 'Error al intentar realizar la modificación del propietario del vehículo.';
    }
  }
}
?>

<!-- <!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transferencia de vehículo</title>
</head> 
<body>
  -->
  <p><?php echo $cadena ?></p>
<?php
  include_once '../estructura/pie.php';
?>
<!-- </body>
</html> -->
