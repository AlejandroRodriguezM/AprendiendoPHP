<?php
    class Persona { 
        protected $nombre;
        protected $apellidos;
        protected $edad;
        public function __construct($nombre,$apellidos,$edad)
        {
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->edad = $edad;
        }

        public function getNombre()
        {
            return $this->nombre;
        }

        public function getApellidos()
        {
            return $this->apellidos;
        }
        public function getEdad(){
            return $this->edad;
        }
        public function getNombreCompleto(){
            return $this->nombre." ".$this->apellidos;
        }
        public function setNombre($n)
        {
            $this->nombre = $n;
        }

        public function setApellidos($a)
        {
            $this->apellidos = $a;
        }
        public function setEdad($ed){
            $this->edad=$ed;
        }
        public function imprimir()
        {
            echo "<p>Nombre:".$this->nombre . "<br>Apellidos:";
            echo $this->apellidos . "<br>Edad:";
            echo $this->edad . "</p>";
        }


    }
?>