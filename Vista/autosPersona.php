<?php
include_once './estructura/cabecera.php';

//if(isset($_GET['dni'])){
//$dni = $_GET['dni'];}

$dni = data_submitted();

$abmPersona = new AbmPersona();
$abmAuto = new AbmAuto();

// Buscar la persona por DNI
$persona = $abmPersona->buscar($dni);

// Buscar los autos por el DNI del dueño
$autos = $abmAuto->buscar(['dniDuenio' => $dni['NroDni']]);

$arregloDatosPersona = $abmPersona->datosParaVista($persona);

/*
if (!empty($persona)) {

    

    echo "<h2>Datos de la persona:</h2>";
    echo "Nombre: " . $persona->getNombre() . "<br>";
    echo "Apellido: " . $persona->getApellido() . "<br>";
    echo "Fecha de Nacimiento: " . $persona->getFechaNac() . "<br>";
    echo "Teléfono: " . $persona->getTelefono() . "<br>";
    echo "Domicilio: " . $persona->getDomicilio() . "<br>";
} else {
    echo "No se encontró una persona con el DNI: " . $dni;
}
*/


// Mostrar los autos de la persona
$arregloDatosAutos = [];
foreach ($autos as $objAuto) {
  $arregloDatosAutos[] = $abmAuto->datosParaVista($objAuto);
}

/*
echo "<h2>Autos de la persona:</h2>";
if (!empty($autos)) {
    echo "<ul>";
    foreach ($autos as $auto) {
        echo "<li>Patente: " . $auto->getPatente() . ", Marca: " . $auto->getMarca() . ", Modelo: " . $auto->getModelo() . "</li>";
    }
    echo "</ul>";
} else {
    echo "Esta persona no tiene autos registrados.";
}
*/
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
  <div class="row col-4 m-auto">
    <h2>Datos Persona</h2>
    <?php
    if (is_array($arregloDatosPersona)) {
      foreach ($arregloDatosPersona as $clave => $valor) {
        echo $clave . ": " . $valor . '<br>';
      } 
    } else {
      echo "No se encontró una persona con el DNI: " . $dni . ".";
    }
    ?>

    <h2>Datos Autos</h2>
    <?php
    if (count($arregloDatosAutos)==0) {
      echo 'Esta persona no tiene autos registrados.';
    } else {
      foreach ($arregloDatosAutos as $arregloAsocAuto) {
        foreach ($arregloAsocAuto as $clave => $valor) {
          echo $clave . ": " . $valor . '<br>';
        }
        echo '<br>';
      }
    }
    ?>

    </div>
    
</body>
</html>

<?php
include_once './estructura/pie.php';
?>