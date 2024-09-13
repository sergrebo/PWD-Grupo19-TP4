<?php
include_once '../../configuracion.php';


$datos = data_submitted();


$objAbmPersona = new AbmPersona();
$resp = $objAbmPersona->cargarPersona($datos);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo $resp ?>
</body>
</html>