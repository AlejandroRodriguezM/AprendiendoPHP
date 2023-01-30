<?php
//POR ALEJANDRO RODRIGUEZ MENA
namespace Modelo;

class Soporte{
    private static $IVA = 0.21;
    public $titulo;
    protected $numero;
    private $precio;

    public function __construct($titulo, $numero, $precio){

        $this->titulo = $titulo;
        $this->numero = $numero;
        $this->precio = $precio;

    }
    public function muestraResumen2(){
        $resumen="<br>RESUMEN DE DATOS<br>
            Titulo:{$this->titulo}<br>
            Numero:{$this->numero}<br>
            Precio:{$this->precio}<br>
        ";
        return $resumen;
    }
    public function getNumero()
    {
            return $this->numero;
    }

    public function getPrecio()
    {
            return $this->precio;
    }

    public function getPrecioConIva(){
        return $this->precio + ($this->precio * self::$IVA);
    }

      /**
       * Muestra datos
       * @return void
       */

    public function muestraResumen(){
        echo "<p>Titulo: ".$this->titulo."</p>";
        echo "<p>Numero: ".$this->numero."</p>";
        echo "<p>Precio: ".$this->precio."</p>";
    }
}