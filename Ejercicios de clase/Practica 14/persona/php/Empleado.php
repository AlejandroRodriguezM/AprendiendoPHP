<?php

class Empleado extends Persona
{
    protected $sueldo;

    public function __construct($nombre, $edad, $sueldo)
    {
        parent::__construct($nombre, $edad);
        $this->sueldo = $sueldo;
    }

    //get y set

    public function getSueldo()
    {
        return $this->sueldo;
    }

    public function setSueldo($sueldo)
    {
        $this->sueldo = $sueldo;
    }

    public function __toString()
    {
        return parent::__toString() . " Sueldo: " . $this->getSueldo();
    }
}
