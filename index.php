<!--
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
-->

<?php
include_once './Vista/estructura/cabecera.php';
?>

<body>
  <div class="row col-4 m-auto py-3">
    <div class="w-100 mb-5">
      <h1 class="mb-3">Elija su opción</h1>
      <div class="d-grid gap-2">
        <a href="./Vista/VerAutos.php"><button type="button" class="btn btn-primary w-100">VER AUTOS</button></a>
        <a href="./Vista/BuscarAuto.php"><button type="button" class="btn btn-primary w-100">BUSCAR AUTO</button></a>
        <a href="./Vista/listaPersona.php"><button type="button" class="btn btn-primary w-100">LISTA PERSONAS</button></a>
        <a href="./Vista/NuevaPersona.php"><button type="button" class="btn btn-primary w-100">NUEVA PERSONA</button></a>
        <a href="./Vista/NuevoAuto.php"><button type="button" class="btn btn-primary w-100">NUEVO AUTO</button></a>
        <a href="./Vista/CambioDuenio.php"><button type="button" class="btn btn-primary w-100">CAMBIO DUEÑO</button></a>
        <a href="./Vista/BuscarPersona.php"><button type="button" class="btn btn-primary w-100">BUSCAR PERSONA</button></a>
      </div>

    </div>
  </div>

  <?php
  include_once './Vista/estructura/pie.php';
  ?>
  <!--
</body>

</html>