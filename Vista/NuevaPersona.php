<!-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
  <title>Ingresa Persona</title>
</head> 
<body> -->
<?php

include_once './estructura/cabecera.php';

?>
  <div class="container">
    <h1 class="">Ingrese sus datos </h1>

    <form action="action/action_NuevaPersona.php" method="post" id="formulario" class="needs-validation" novalidate>

      <div class="form-group col-md-4 mb-3">
        <label for="validationCustom01" class="form-label">DNI</label>
        <input type="text" name="NroDni" class="form-control" id="validationCustom01" required>
      </div>

      <div class="form-group col-md-4 mb-3">
        <label for="validationCustom03">Apellido</label>
        <input type="text" name="Apellido" class="form-control" id="validationCustom03" required>
      </div>

      <div class="form-group col-md-4 mb-3">
        <label for="validationCustom02" class="form-label">Nombre</label>
        <input type="text" name="Nombre" class="form-control" id="validationCustom02" required>
      </div>

      <div class="form-group col-md-4 mb-3">
        <label for="validationCustom04">Fecha de Nacimiento</label>
        <input type="date" name="fechaNac" class="form-control" id="validationCustom04" max="2006-01-01" min="1950-01-01" required>
      </div>


      <div class="form-group col-md-4 mb-3">
        <label for="validationCustom05" class="form-label">Telefono</label>
        <input type="text" name="Telefono" class="form-control" id="validationCustom05" required>
      </div>


      <div class="form-group col-md-4 mb-3">
        <label for="validationCustom06">Domicilio</label>
        <input type="text" name="Domicilio" class="form-control" id="validationCustom06" required>
      </div>


      <input class="btn btn-primary" type="submit">
  </div>
  </form>

  </div>
  <script src="js/validacion.js"></script>
<?php
  include_once './estructura/pie.php';
?>
<!--  
</body>

</html>
-->
