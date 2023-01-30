<?php
//POR ALEJANDRO RODRIGUEZ MENA
namespace Controlador;
require_once '../Modelo/Soporte.php';
use Modelo\Soporte as Soporte;
class CintaVideo extends Soporte{
    private $duracion;

    public function __construct($titulo,$numero,$precio,$duracion)
    {
        parent::__construct($titulo,$numero,$precio);
        $this->duracion=$duracion;
    }


    public function muestraResumen()
    {
        parent::muestraResumen();
        echo '<p>Duracion: '.$this->duracion.'</p>';
    }
    public function muestraResumen2(){
        return parent::muestraResumen2()."Duracion:{$this->duracion}";
    }
}