<?php
include_once '../../configuracion.php';

$datos = data_submitted();
$objAbmPersona = new AbmPersona;
$arregloAux = ['NroDni' => $datos['dniDuenio']];
print_r($arregloAux);

$resp = $objAbmPersona->buscar($arregloAux);
print_r($resp);

if (empty($resp)){
  //Debe ingresarse el nuevo registro de la persona
  $cadena = '<p>El DNI del propietario no pertene a ninguna persona registrada ¿Desea cargarlo?</p><br><a href="../NuevaPersona.php"><button>Si</button></a><a href="../NuevoAuto.php"><button>Volver</button></a>';
} else {
  //La persona ya esta en la base de datos
  $objAbmAuto = new AbmAuto;
  $rta = $objAbmAuto->alta($datos);
  if ($rta) {
    $cadena = 'Nuevo registro de auto cargado exitosamente.';
  } else {
    $cadena = 'Error en la carga de registro';
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php echo $cadena ?>
</body>
</html>