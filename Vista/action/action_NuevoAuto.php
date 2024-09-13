<?php
include_once '../estructura/cabecera.php';

$datos = data_submitted();
$objAbmPersona = new AbmPersona;
$objAbmAuto = new AbmAuto;

$arregloAuxDni = ['NroDni' => $datos['dniDuenio']];
$arregloAuxPantente = ['Patente'=> $datos['Patente']];


//print_r($resp);
//print_r($arregloAux);

$resp = $objAbmPersona->buscar($arregloAuxDni);
$respuestaAuto = $objAbmAuto->buscar($arregloAuxPantente);



if(!empty($respuestaAuto)){
  $cadena = 'El auto ya esta registrado.';
}elseif(empty($resp)){
  //Debe ingresarse el nuevo registro de la persona
  $cadena = '<p>El DNI del propietario no pertenece a ninguna persona registrada ¿Desea cargarlo?</p><br><a href="../NuevaPersona.php"><button>Si</button></a><a href="../NuevoAuto.php"><button>Volver</button></a>';
} else {
  //La persona ya esta en la base de datos
  $rta = $objAbmAuto->alta($datos);
  if ($rta) {
    $cadena = 'Nuevo registro de auto cargado exitosamente.';
  } else {
    $cadena = 'Error en la carga de registro';
  }
}
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head> 
<body>
  -->
  <?php 
    echo "<p>$cadena</p>";
    include_once '../estructura/pie.php';
  ?>
<!-- </body>
</html> -->


