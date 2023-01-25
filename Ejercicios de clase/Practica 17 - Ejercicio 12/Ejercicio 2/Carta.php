<?php 

class Carta{
    private $numero;

    public function __construct($numero){
        $this->numero = $numero;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function generarCarta(){
        $numero = $this->generadorNumero();
        $carta = "<img src='cartas/$numero.png' alt='carta' width='100px'>";
        return $carta;
    }

    public function generadorNumero(){
        $numero = rand(1, 13);
        return $numero;
    }
}