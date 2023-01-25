<?php
namespace Controlador;

require_once 'Modelo/Persona.php';

use Modelo\Persona as ModeloPersona;

class Cliente extends ModeloPersona
{
    protected $fltCredito;

    public function __construct($intDpi, $strNombre, $intEdad, $fltCredito)
    {
        parent::__construct($intDpi, $strNombre, $intEdad);
        $this->fltCredito = $fltCredito;
    }

    public function setCredito($fltCredito)
    {
        $this->fltCredito = $fltCredito;
    }

    public function getCredito()
    {
        return $this->fltCredito;
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