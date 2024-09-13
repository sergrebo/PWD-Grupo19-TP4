<?php
include_once './estructura/cabecera.php';

$abmPersona = new AbmPersona();
$arrayPersonas = array();

$arrayPersonas = $abmPersona->buscar($arrayPersonas);

$objManip = new Manipulacion();

$cadena = $objManip->imprimirPersonas($arrayPersonas);

?>

<!--
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
-->

<body>
  <div class="row col-6 m-auto">
    <div class="">
      <h1>Personas</h1>
      <ul> <?php echo $cadena ?> </ul>
    </div>
  </div>
  <?php
  include_once './estructura/pie.php';
  ?>
  <!--
</body>

</html>