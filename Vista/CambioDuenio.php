<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
  <title>Transferencia de vehículo</title>
</head>
<body>
<div class="container">
    <h1 class="">Ingrese los datos del vehículo</h1>

    <form action="action/action_CambioDuenio.php" method="post" id="formulario" class="needs-validation" novalidate>

      <div class="form-group col-md-4 mb-3">
        <label for="validationCustom01" class="form-label">Patente del vehículo</label>
        <input type="text" name="Patente" class="form-control" id="validationCustom01" required>
      </div>

      <div class="form-group col-md-4 mb-3">
        <label for="validationCustom04">DNI del nuevo propietario</label>
        <input type="text" name="NroDni" class="form-control" id="validationCustom04"required>
      </div>

      <input class="btn btn-primary" type="submit">
  </div>
  </form>

  </div>
  <script src="js/validacion_BuscarAuto.js"></script>
</body>
</html>