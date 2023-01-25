<?php
    class Empleado extends Trabajador{
        private $horasTrabajadas;
        private $precioPorHoras;

        public function __construct($nombre, $apellidos, $edad,$horas,$preciohoras)
        {
            parent::__construct($nombre, $apellidos,$edad);
            $this->horasTrabajadas=$horas;
            $this->precioPorHoras=$preciohoras;
        }
        public function debePagarImpuestos()
        {
            $s=$this->calcularSueldo();
            return ($s>2000);
        }

        public function calcularSueldo(){
            $sueldo = $this->horasTrabajadas*$this->precioPorHoras;
            return $sueldo;
        }
    }
?>