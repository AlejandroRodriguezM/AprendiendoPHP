<?php

include "Soporte.php";
class CintaVideo extends Soporte{
    private $duracion;

    public function __construct($titulo, $numero, $precio, $duracion){
        parent::__construct($titulo, $numero, $precio);
        $this->duracion = $duracion;
    }

    public function muestraResumen(){
        parent::muestraResumen();
        echo "Duracion: " . $this->duracion . " Minutos<br>";
    }
}