<?php
include_once '../configuracion.php';

$obj = new Persona();
$obj->setear(33832405, 'Rebolledo', 'Sergio', '1988/06/24', 2994610843, 'Francisco Berola 742');

if ($obj->insertar()) {
  echo "<br>El registro se insertó correctamente";
  verEstructura($obj);
} else {
  echo "<br>" . $obj->getMensajeOperacion();
}

$obj->setTelefono(2994983796);

if ($obj->modificar()) {
  echo "<br>El registro se actualizó correctamente";
  verEstructura($obj);
} else {
  echo "<br>" . $obj->getMensajeOperacion();
}

if ($obj->eliminar()) {
  echo "<br>El registro se eliminó correctamente";
} else {
  echo "<br>" . $obj->getMensajeOperacion();
}

?>