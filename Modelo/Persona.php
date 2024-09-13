<?php
class Persona
{
  private $NroDni;
  private $Apellido;
  private $Nombre;
  private $fechaNac;
  private $Telefono;
  private $Domicilio;
  private $mensajeOperacion;

  public function __construct()
  {
    $this->NroDni = "";
    $this->Apellido = "";
    $this->Nombre = "";
    $this->fechaNac = "";
    $this->Telefono = "";
    $this->Domicilio = "";
  }

  public function setear($NroDni, $Apellido, $Nombre, $fechaNac, $Telefono, $Domicilio)
  {
    $this->setNroDni($NroDni);
    $this->setApellido($Apellido);
    $this->setNombre($Nombre);
    $this->setFechaNac($fechaNac);
    $this->setTelefono($Telefono);
    $this->setDomicilio($Domicilio);
  }

  public function getNroDni()
  {
    return $this->NroDni;
  }
  public function setNroDni($NroDni)
  {
    $this->NroDni = $NroDni;
  }

  public function getApellido()
  {
    return $this->Apellido;
  }
  public function setApellido($Apellido)
  {
    $this->Apellido = $Apellido;
  }

  public function getNombre()
  {
    return $this->Nombre;
  }
  public function setNombre($Nombre)
  {
    $this->Nombre = $Nombre;
  }

  public function getFechaNac()
  {
    return $this->fechaNac;
  }
  public function setFechaNac($fechaNac)
  {
    $this->fechaNac = $fechaNac;
  }

  public function getTelefono()
  {
    return $this->Telefono;
  }
  public function setTelefono($Telefono)
  {
    $this->Telefono = $Telefono;
  }

  public function getDomicilio()
  {
    return $this->Domicilio;
  }
  public function setDomicilio($Domicilio)
  {
    $this->Domicilio = $Domicilio;
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
    return "DNI: " . $this->getNroDni() . " - " . $this->getApellido() . " " . $this->getNombre() .
      "\nFecha nacimiento: " . $this->getFechaNac() . " - Tel: " . $this->getTelefono() . " - Domicilio: " . $this->getDomicilio();
  }

  public function cargar()
  {
    $resp = false;
    $base = new BaseDatos();
    $sql = "SELECT * FROM persona WHERE NroDni = " . $this->getNroDni();
    if ($base->Iniciar()) {
      $res = $base->Ejecutar($sql);
      if ($res > -1) {
        if ($res > 0) {
          $row = $base->Registro();
          $this->setear($row['NroDni'], $row['Apellido'], $row['Nombre'], $row['fechaNac'], $row['Telefono'], $row['Domicilio']);
        }
      }
    } else {
      $this->setMensajeOperacion("persona->cargar: " . $base->getError());
    }
    return $resp;
  }

  public function insertar()
  {
    $resp = false;
    $base = new BaseDatos();
    $sql = "INSERT INTO persona(NroDni, Apellido, Nombre, fechaNac, Telefono, Domicilio)  VALUES('" . $this->getNroDni() . "', '" . $this->getApellido() . "', '" . $this->getNombre() . "', '" . $this->getFechaNac() . "', '" . $this->getTelefono() . "', '" . $this->getDomicilio() . "');";
    if ($base->Iniciar()) {
      if ($base->Ejecutar($sql)) {
        $resp = true;
      } else {
        $this->setMensajeOperacion("persona->insertar: " . $base->getError());
      }
    } else {
      $this->setMensajeOperacion("persona->insertar: " . $base->getError());
    }
    return $resp;
  }

  public function modificar()
  {
    $resp = false;
    $base = new BaseDatos();
    $sql = "UPDATE persona SET Apellido='" . $this->getApellido() . "', Nombre='" . $this->getNombre() . "', fechaNac='" . $this->getFechaNac() . "', Telefono='" . $this->getTelefono() . "', Domicilio='" . $this->getDomicilio() . "' WHERE NroDni=" . $this->getNroDni();
    if ($base->Iniciar()) {
      if ($base->Ejecutar($sql)) {
        $resp = true;
      } else {
        $this->setMensajeOperacion("persona->modificar: " . $base->getError());
      }
    } else {
      $this->setMensajeOperacion("persona->modificar: " . $base->getError());
    }
    return $resp;
  }

  public function eliminar()
  {
    $resp = false;
    $base = new BaseDatos();
    $sql = "DELETE FROM persona WHERE NroDni=" . $this->getNroDni();
    if ($base->Iniciar()) {
      if ($base->Ejecutar($sql)) {
        return true;
      } else {
        $this->setMensajeOperacion("persona->eliminar: " . $base->getError());
      }
    } else {
      $this->setMensajeOperacion("persona->eliminar: " . $base->getError());
    }
    return $resp;
  }

  public static function listar($parametro = "")
  {
    $arreglo = array();
    $base = new BaseDatos();
    $sql = "SELECT * FROM persona ";
    if ($parametro != "") {
      $sql .= 'WHERE ' . $parametro;
    }
    $res = $base->Ejecutar($sql);
    if ($res > -1) {
      if ($res > 0) {
        while ($row = $base->Registro()) {
          $obj = new Persona();
          $obj->setear($row['NroDni'], $row['Apellido'], $row['Nombre'], $row['fechaNac'], $row['Telefono'], $row['Domicilio']);
          array_push($arreglo, $obj);
        }
      }
    } else {
      $this->setMensajeOperacion("persona->listar: " . $base->getError());
    }
    return $arreglo;
  }
}