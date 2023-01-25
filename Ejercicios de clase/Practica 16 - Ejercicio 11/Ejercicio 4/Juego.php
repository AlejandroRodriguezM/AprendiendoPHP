<?php

include "Soporte.php";

class Juego extends Soporte{

    private $plataforma;
    private $genero;

    public function __construct($titulo, $numero, $precio, $plataforma, $genero){
        parent::__construct($titulo, $numero, $precio);
        $this->plataforma = $plataforma;
        $this->genero = $genero;
    }

    public function muestraJugadoresPosibles(){

        
    }

    public function muestraResumen(){
        parent::muestraResumen();
        echo "Plataforma: " . $this->plataforma . "<br>";
        echo "Genero: " . $this->genero . "<br>";
    }
}