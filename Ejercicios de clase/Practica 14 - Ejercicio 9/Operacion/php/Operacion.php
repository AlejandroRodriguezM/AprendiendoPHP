<?php

class Operacion {
    public $valor1;
    public $valor2;
    public $resultado;

    public function cargar1($val) {
        $this->valor1 = $val;
    }

    public function cargar2($val) {
        $this->valor2 = $val;
    }

    public function mostrarResultado() {
        echo $this->resultado;
    }
}


