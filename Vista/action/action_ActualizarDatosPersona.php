<?php
include_once '../../configuracion.php';

$datos = data_submitted();
//print_r($datos);

$objAbmPersona = new AbmPersona;
$resp = $objAbmPersona->modificacion($datos);
if ($resp) {
  $cadena = 'Modificación exitosa.';
} else {
  $cadena = 'Error al intentar modificar el registro.';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizar Datos Persona</title>
</head>
<body>
  <h1>Resultado</h1>
  <p><?php echo $cadena ?></p>
</body>
</html>