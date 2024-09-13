<?php
include_once '../configuracion.php';

//if(isset($_GET['dni'])){
    //$dni = $_GET['dni'];}

   $dni = data_submitted();

$abmPersona = new AbmPersona();
$abmAuto = new AbmAuto();

// Buscar la persona por DNI
$persona = $abmPersona->buscar($dni);

// Buscar los autos por el DNI del dueño
$autos = $abmAuto->buscar(['dniDuenio'=>$dni['NroDni']]);

if (!empty($persona)) {
    $persona = $persona[0]; // Suponemos que solo hay una persona con ese DNI
    echo "<h2>Datos de la persona:</h2>";
    echo "Nombre: " . $persona->getNombre() . "<br>";
    echo "Apellido: " . $persona->getApellido() . "<br>";
    echo "Fecha de Nacimiento: " . $persona->getFechaNac() . "<br>";
    echo "Teléfono: " . $persona->getTelefono() . "<br>";
    echo "Domicilio: " . $persona->getDomicilio() . "<br>";
} else {
    echo "No se encontró una persona con el DNI: " . $dni;
}

// Mostrar los autos de la persona
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


?>