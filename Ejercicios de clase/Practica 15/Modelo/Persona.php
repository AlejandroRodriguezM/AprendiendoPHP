<?php
namespace Modelo;

abstract class Persona
{
    protected $intDpi;
    protected $strNombre;
    protected $intEdad;
    protected $mensaje;

    public function __construct($intDpi, $strNombre, $intEdad)
    {
        $this->intDpi = $intDpi;
        $this->strNombre = $strNombre;
        $this->intEdad = $intEdad;
    }

    abstract public function getDatosPersonales();

    abstract public function setMensaje($mensaje);

    abstract public function getMensaje();
}