<?php
class AbmPersona
{
  //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto

  /**
   * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
   * @param array $param
   * @return Persona
   */
  private function cargarObjeto($param)
  {
    $obj = null;
    if (array_key_exists('NroDni', $param) && array_key_exists('Apellido', $param) && array_key_exists('Nombre', $param) && array_key_exists('fechaNac', $param) && array_key_exists('Telefono', $param) && array_key_exists('Domicilio', $param)) {
      $obj = new Persona();
      $obj->setear($param['NroDni'], $param['Apellido'], $param['Nombre'], $param['fechaNac'], $param['Telefono'], $param['Domicilio']);
    }
    return $obj;
  }

  /**
   * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
   * @param array $param
   * @return Persona
   */
  private function cargarObjetoConClave($param)
  {
    $obj = null;
    if (isset($param['NroDni'])) {
      $obj = new Persona();
      $obj->setear($param['NroDni'], null, null, null, null, null);
    }
    return $obj;
  }

  /**
   * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
   * @param array $param
   * @return boolean
   */
  private function seteadosCamposClaves($param)
  {
    $resp = false;
    if (isset($param['NroDni']))
      $resp = true;
    return $resp;
  }

  /**
   * 
   * @param array $param
   */
  public function alta($param)
  {
    $resp = false;
    //$param['id'] = null;    Entiendo que esta línea es para relaciones con id autoincremental
    $elObjPersona = $this->cargarObjeto($param);
    //verEstructura($elObjPersona);
    if ($elObjPersona != null && $elObjPersona->insertar()) {
      $resp = true;
    }
    return $resp;
  }

  /**
   * permite eliminar un objeto 
   * @param array $param
   * @return boolean
   */
  public function baja($param)
  {
    $resp = false;
    if ($this->seteadosCamposClaves($param)) {
      $elObjPersona = $this->cargarObjetoConClave($param);
      if ($elObjPersona != null && $elObjPersona->eliminar()) {
        $resp = true;
      }
    }
    return $resp;
  }

  /**
   * permite modificar un objeto
   * @param array $param
   * @return boolean
   */
  public function modificacion($param)
  {
    //echo "Estoy en modificacion";
    $resp = false;
    if ($this->seteadosCamposClaves($param)) {
      $elObjPersona = $this->cargarObjeto($param);
      if ($elObjPersona != null && $elObjPersona->modificar()) {
        $resp = true;
      }
    }
    return $resp;
  }

  /**
   * permite buscar un objeto
   * @param array $param
   * @return array
   */
  public function buscar($param)
  {
    $where = " true ";
    if ($param <> NULL) {
      if (isset($param['NroDni'])) {
        $where .= " and NroDni =" . $param['NroDni'];
      }
      if (isset($param['Apellido'])) {
        $where .= " and Apellido ='" . $param['Apellido'] . "'";
      }
      if (isset($param['Nombre'])) {
        $where .= " and Nombre ='" . $param['Nombre'] . "'";
      }
      if (isset($param['fechaNac'])) {
        $where .= " and fechaNac ='" . $param['fechaNac'] . "'";
      }
      if (isset($param['Telefono'])) {
        $where .= " and Telefono ='" . $param['Telefono'] . "'";
      }
      if (isset($param['Domicilio'])) {
        $where .= " and Domicilio ='" . $param['Domicilio'] . "'";
      }
    }
    $arreglo = Persona::listar($where);
    return $arreglo;
  }


  public function cargarPersona($datos)
  {

    $arregloPersonas = $this->buscar($datos);
    if (empty($arregloPersonas)) {
      $control = $this->alta($datos);
      if ($control) {
        $respuesta = "Carga exitosa.";
      } else {
        $respuesta = "Carga Fallida.";
      }
    } else {
      $respuesta = "La persona ya esta cargada.";
    }
    return $respuesta;
  }

  /**
  * Devuelve los valores de una persona para la vista.
  * @param array $param
  * @return array
  */
  public function obtenerDatosParaVista($param) {
    $datosPersona = $this->buscar($param);
    $resultados = [];

    if (!empty($datosPersona)) {
      $persona = $datosPersona[0];
      $resultados = [
        'Nombre' => $persona->getNombre(),
        'Apellido' => $persona->getApellido(),
        'NroDni' => $persona->getNroDni(),
        'fechaNac' => $persona->getFechaNac(),
        'Telefono' => $persona->getTelefono(),
        'Domicilio' => $persona->getDomicilio()
      ];
    }
    return $resultados;
  }
  
}
