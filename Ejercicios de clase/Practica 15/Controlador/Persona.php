<?php
namespace Controlador;

require_once 'Modelo/Persona.php';

use Modelo\Persona as ModeloPersona;

class Persona extends ModeloPersona
{
    public function saludar()
    {
        return "Hola desde persona controllers";
    }

    public function getDatosPersonales()
    {
        return "DPI: " . $this->intDpi . ", Nombre: " . $this->strNombre . ", Edad: " . $this->intEdad;
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