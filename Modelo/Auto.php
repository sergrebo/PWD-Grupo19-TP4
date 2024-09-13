<?php

class Auto
{

  private $patente;
  private $marca;
  private $modelo;
  private $dniDuenio;
  private $mensajeOperacion;

  public function __construct()
  {

    $this->patente = "";
    $this->marca = "";
    $this->modelo = "";
    $this->dniDuenio = "";
  }

  public function setear($patente, $marca, $modelo, $dniDuenio)
  {
    $this->setPatente($patente);
    $this->setMarca($marca);
    $this->setModelo($modelo);
    $this->setDniDuenio($dniDuenio);
  }




  public function getPatente()
  {
    return $this->patente;
  }


  public function setPatente($patente)
  {
    $this->patente = $patente;
  }


  public function getMarca()
  {
    return $this->marca;
  }


  public function setMarca($marca)
  {
    $this->marca = $marca;
  }


  public function getModelo()
  {
    return $this->modelo;
  }


  public function setModelo($modelo)
  {
    $this->modelo = $modelo;
  }


  public function getDniDuenio()
  {
    return $this->dniDuenio;
  }


  public function setDniDuenio($dniDuenio)
  {
    $this->dniDuenio = $dniDuenio;
  }

  public function getMensajeOperacion()
  {
    return $this->mensajeOperacion;
  }


  public function setMensajeOperacion($mensajeOperacion)
  {
    $this->mensajeOperacion = $mensajeOperacion;
  }

  public function __toString()
  {
    return ("Patente: " . $this->getPatente() . "\n" . "Marca: " . $this->getMarca() . "\n" . "Modelo: " . $this->getModelo() . "\n" . "Dni del dueño: " . $this->getDniDuenio());
  }


  public function cargar()
  {
    $resp = false;
    $base = new BaseDatos();
    $sql = "SELECT * FROM auto WHERE Patente = " . $this->getPatente();
    if ($base->Iniciar()) {
      $res = $base->Ejecutar($sql);
      if ($res > -1) {
        if ($res > 0) {
          $row = $base->Registro();
          $this->setear($row['Patente'], $row['Modelo'], $row['Marca'], $row['DniDuenio']);
        }
      }
    } else {
      $this->setMensajeOperacion("auto->cargar: " . $base->getError());
    }
    return $resp;
  }

  public function insertar()
  {
    $resp = false;
    $base = new BaseDatos();
    $sql = "INSERT INTO auto (Patente, Modelo, Marca, DniDuenio) VALUES ('" . $this->getPatente() . "', '" . $this->getModelo() . "', '" . $this->getMarca() . "', '" . $this->getDniDuenio() . "');";

    if ($base->Iniciar()) {
      if ($base->Ejecutar($sql)) {
        $resp = true;
      } else {
        $this->setMensajeOperacion("auto->insertar: " . $base->getError());
      }
    } else {
      $this->setMensajeOperacion("auto->insertar: " . $base->getError());
    }
    return $resp;
  }


  public function modificar()
  {
    $resp = false;
    $base = new BaseDatos();
    $sql = "UPDATE auto SET Modelo='" . $this->getModelo() . "', Marca='" . $this->getMarca() . "', DniDuenio='" . $this->getDniDuenio() . "' WHERE Patente='" . $this->getPatente() . "'";

    if ($base->Iniciar()) {
      if ($base->Ejecutar($sql)) {
        $resp = true;
      } else {
        $this->setMensajeOperacion("auto->modificar: " . $base->getError());
      }
    } else {
      $this->setMensajeOperacion("auto->modificar: " . $base->getError());
    }
    return $resp;
  }

  public function eliminar()
  {
    $resp = false;
    $base = new BaseDatos();
    $sql = "DELETE FROM auto WHERE Patente='" . $this->getPatente() . "'";
    if ($base->Iniciar()) {
      if ($base->Ejecutar($sql)) {
        return true;
      } else {
        $this->setMensajeOperacion("auto->eliminar: " . $base->getError());
      }
    } else {
      $this->setMensajeOperacion("auto->eliminar: " . $base->getError());
    }
    return $resp;
  }


  public static function listar($parametro = "")
  {
    $arreglo = array();
    $base = new BaseDatos();
    $sql = "SELECT * FROM auto ";
    if ($parametro != "") {
      $sql .= 'WHERE ' . $parametro;
    }
    $res = $base->Ejecutar($sql);
    if ($res > -1) {
      if ($res > 0) {
        while ($row = $base->Registro()) {
          $obj = new Auto();
          $obj->setear($row['Patente'], $row['Marca'], $row['Modelo'], $row['DniDuenio']);
          array_push($arreglo, $obj);
        }
      }
    } else {
      $this->setmensajeoperacion("Auto->listar: " . $base->getError());
    }
    return $arreglo;
  }
}
