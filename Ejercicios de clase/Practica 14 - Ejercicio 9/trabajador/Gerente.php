<?php
    class Gerente extends Trabajador{
        private $salario;

        public function __construct($nombre, $apellidos, $edad,$salario)
        {
            parent::__construct($nombre, $apellidos,$edad);
            $this->salario=$salario;
        }
        public function debePagarImpuestos()
        {
            $s=$this->calcularSueldo();
            return ($s>3000);
        }

        public function calcularSueldo(){
            return $this->salario+($this->salario)*($this->edad)/100;
        }
    }
?>