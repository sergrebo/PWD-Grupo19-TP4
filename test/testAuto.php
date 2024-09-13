<?php
include_once '../configuracion.php';

$duenio = new Persona();
$duenio->setear(33823405, 'Rebolledo', 'Sergio', '1988-06-24', 2994610843, 'Francisco Berola 742');

if ($duenio->insertar()) {
  echo "<br>El registro del dueño se insertó correctamente";
  verEstructura($duenio);
} else {
  echo "<br>" . $duenio->getMensajeOperacion();
}

$obj = new Auto();
$obj->setear('ODR 744', 'Fiat Palio', 2013, 33823405);

if ($obj->insertar()) {
  echo "<br>El registro del auto se insertó correctamente";
  verEstructura($obj);
} else {
  echo "<br>" . $obj->getMensajeOperacion();
}

$obj->setModelo(2014);

if ($obj->modificar()) {
  echo "<br>El registro del auto se actualizó correctamente";
  verEstructura($obj);
} else {
  echo "<br>" . $obj->getMensajeOperacion();
}

if ($obj->eliminar()) {
  echo "<br>El registro del auto se eliminó correctamente";
} else {
  echo "<br>" . $obj->getMensajeOperacion();
}

if ($duenio->eliminar()) {
  echo "<br>El registro del dueño del auto se eliminó correctamente";
} else {
  echo "<br>" . $obj->getMensajeOperacion();
}

?>