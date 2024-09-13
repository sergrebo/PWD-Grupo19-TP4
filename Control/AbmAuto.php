<?php
class AbmAuto
{
  //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto

  /**
   * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
   * @param array $param
   * @return Auto
   */
  private function cargarObjeto($param)
  {
    $obj = null;
    if (array_key_exists('Patente', $param) && array_key_exists('Marca', $param) && array_key_exists('Modelo', $param) && array_key_exists('dniDuenio', $param)) {
      $obj = new Auto();
      $obj->setear($param['Patente'], $param['Marca'], $param['Modelo'], $param['dniDuenio']);
    }
    return $obj;
  }

  /**
   * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
   * @param array $param
   * @return Auto
   */
  private function cargarObjetoConClave($param)
  {
    $obj = null;
    if (isset($param['Patente'])) {
      $obj = new Auto();
      $obj->setear($param['Patente'], null, null, null);
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
    if (isset($param['Patente']))
      $resp = true;
    return $resp;
  }

  /**
   * Verifica que las claves del arreglo parametro se correspondan con los nombres de los atributos e ingresa el nuevo registro a la tabla correspondiente
   * @param array $param
   * @return boolean
   */
  public function alta($param)
  {
    $resp = false;
    //$param['id'] = null;    Entiendo que esta línea es para relaciones con id autoincremental
    $elObjAuto = $this->cargarObjeto($param);
    //verEstructura($elObjAuto);
    if ($elObjAuto != null && $elObjAuto->insertar()) {
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
      $elObjAuto = $this->cargarObjetoConClave($param);
      if ($elObjAuto != null && $elObjAuto->eliminar()) {
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
      $elObjAuto = $this->cargarObjeto($param);
      if ($elObjAuto != null and $elObjAuto->modificar()) {
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
      if (isset($param['Patente'])) {
        $where .= " and Patente ='" . $param['Patente'] . "'";
      }
      if (isset($param['Marca'])) {
        $where .= " and Marca ='" . $param['Marca'] . "'";
      }
      if (isset($param['Modelo'])) {
        $where .= " and Modelo ='" . $param['Modelo'] . "'";
      }
      if (isset($param['dniDuenio'])) {
        $where .= " and dniDuenio ='" . $param['dniDuenio'] . "'";
      }
      //echo $where;
    }
    $arreglo = Auto::listar($where);
    return $arreglo;
  }

  public function cambiarDuenio($objAuto, $dniDuenio)
  {
    $objAuto->setDniDuenio($dniDuenio);
    $arreglo = [
      'Patente' => $objAuto->getPatente(),
      'Marca' => $objAuto->getMarca(),
      'Modelo' => $objAuto->getModelo(),
      'dniDuenio' => $objAuto->getDniDuenio(),
    ];
    return $arreglo;
  }
}
