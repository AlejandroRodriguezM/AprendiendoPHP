<?php
namespace Controlador;

require_once 'Modelo/Persona.php';

use Modelo\Persona as ModeloPersona;

class Empleado extends ModeloPersona
{
    protected $strPuesto;

    public function __construct($intDpi, $strNombre, $intEdad, $strPuesto)
    {
        parent::__construct($intDpi, $strNombre, $intEdad);
        $this->strPuesto = $strPuesto;
    }

    public function setPuesto($strPuesto)
    {
        $this->strPuesto = $strPuesto;
    }

    public function getPuesto()
    {
        return $this->strPuesto;
    }

    public function getDatosPersonales()
    {
        return $this->getMensaje() . $this->strNombre;
    }

    public function setMensaje($mensaje)
    {
        $this->mensaje = $mensaje;
    }

    public function getMensaje()
    {
        return $this->mensaje;
    }
}