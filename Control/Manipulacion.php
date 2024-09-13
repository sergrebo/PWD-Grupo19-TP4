<?php
class Manipulacion
{

  public function imprimirAutos($arreglo)
  {
    $respuesta = "";
    foreach ($arreglo as $objAuto) {
      $dniDuenio = $objAuto->getDniDuenio();
      $arregloAux = [];
      $arregloAux['NroDni'] = $dniDuenio;
      $objAbmPersona = new AbmPersona;
      $arregloObjPersona = $objAbmPersona->buscar($arregloAux);
      $objPersona = $arregloObjPersona[0];
      $respuesta .= '<li>Auto: ' . $objAuto->getPatente() . ' - ' . $objAuto->getMarca() . ' - ' . $objAuto->getModelo() .
        "<br>Dueño: " . $objPersona->getApellido() . ' ' . $objPersona->getNombre() . '</li>';
    }
    return $respuesta;
  }

  public function tablearAuto($arregloAuto) {
    $objAuto = $arregloAuto[0];
    $respuesta = '<tr> <th>Patente</th> <th>Marca</th> <th>Modelo</th> <th>DNI Dueño</th> </tr> <tr> <td>' . $objAuto->getPatente() . '</td> <td>' . $objAuto->getMarca() . '</td> <td>' . $objAuto->getModelo() . '</td> <td>' . $objAuto->getDniDuenio() . '</td> </tr>';
    return $respuesta;
  }

  public function imprimirPersonas($array){
  $respuesta = "";
  
  foreach($array as $objPersona){
    $respuesta .= '<li>' . $objPersona->getNombre() . ' - ' . $objPersona->getApellido() . ' - ' . $objPersona->getFechaNac() . ' - ' . $objPersona->getTelefono() . ' - ' . $objPersona->getDomicilio() . '<a href="action/autosPersona.php?NroDni='. $objPersona->getNroDni() .'">Ver Autos</a>' . '</li>';
  }
  return $respuesta;
  }


}


