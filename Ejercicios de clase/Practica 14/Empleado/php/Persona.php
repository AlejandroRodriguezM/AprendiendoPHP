<?php


class Persona {
    protected $nombre;
    protected $apellido;

    public function __construct($nombre, $apellido) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    //get y set

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function getNombreCompleto(){
        return $this->nombre . " " . $this->apellido;
    }

    public function __toString(){
        return $this->getNombreCompleto();
        
    }


}