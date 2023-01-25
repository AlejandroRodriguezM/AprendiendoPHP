<?php

class Soporte{

    public $titulo;
    private $numero;
    private $precio;

    private static $IVA = 0.21;

    public function __construct($titulo, $numero, $precio){
        $this->titulo = $titulo;
        $this->numero = $numero;
        $this->precio = $precio;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function getPrecioConIva(){
        return $this->getPrecio() + ($this->precio * Soporte::$IVA);
    }

    public function muestraResumen(){
        echo "Titulo: " . $this->titulo . "<br>";
        echo "Numero: " . $this->numero . "<br>";
        echo "Precio: " . $this->precio . "<br>";
        echo "Precio con IVA: " . $this->getPrecioConIva() . "<br>";
    }
}



?>