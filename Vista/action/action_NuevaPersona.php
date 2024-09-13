<?php
//include_once '../../configuracion.php';

include_once '../estructura/cabecera.php';

$datos = data_submitted();


$objAbmPersona = new AbmPersona();

if (!$objAbmPersona->buscar($datos)) {
    $resp = $objAbmPersona->alta($datos);
}
else {
    $resp = false;
}
//$resp = $objAbmPersona->alta($datos);
//print_r($resp);



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
<div class="container mt-4">
        <h2>Resultado de la inserción</h2>
        <?php
            if ($resp) {
                echo "<p class='text-success'>La persona se pudo cargar con éxito.</p>";
            }
            else {
                echo "<p class='text-danger'>La persona no se pudo cargar.</p>";
            }
        ?>
    </div>
<?php 
    include_once '../estructura/pie.php';
?>

<!-- </body>
</html> -->