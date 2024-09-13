<!-- <!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
  <title>Buscar Persona</title>
</head>
<body> -->
<?php
  include_once './estructura/cabecera.php';
?>

  <div class="container">
    <form action="./action/action_BuscarPersona.php" method="post" id="formulario" class="needs-validation" novalidate>
      <fieldset>
        <legend>Ingrese el DNI de la persona que desea buscar</legend>
        <div class="form-group">
          <label for="dni">DNI </label>
          <input type="text" name="NroDni" id="dni">
          <input type="submit" value="Enviar">
        </div>
      </fieldset>
    </form>
  </div>
  <script src="js/validacion.js"></script>
<?php
  include_once './estructura/pie.php';
?>
<!-- </body>

</html> -->