<?php
    abstract class Trabajador extends Persona
    {
         protected $telefonos;

        public function __construct($nombre, $apellidos, $edad)
        {
            parent::__construct($nombre, $apellidos,$edad);
            $this->telefonos = [];
        }

        
        abstract public function debePagarImpuestos();

        abstract public function calcularSueldo();
        
        public function anyadirTelefonos(int $tel){
            array_push($this->telefonos, $tel);
        }
        public function listarTelefonos(){
            $cadena = "";
            for($i=0;$i < count($this->telefonos);$i++) {
                $cadena .= $this->telefonos[$i]."<br>";
            }
            return $cadena;
        }
        public function vaciarTelefonos(){
            $this->telefonos = [];
        }
        
    }
?>