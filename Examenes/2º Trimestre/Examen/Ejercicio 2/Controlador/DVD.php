<?php
//POR ALEJANDRO RODRIGUEZ MENA
namespace Controlador;
require_once '../Modelo/Soporte.php';
use Modelo\Soporte as Soporte;

class Dvd extends Soporte{
    public $idiomas;
    private $formatPantalla;

    public function __construct($titulo,$numero,$precio,$idiomas, $formatPantalla)
    {
        parent::__construct($titulo,$numero,$precio);
        $this->idiomas=$idiomas;
        $this->formatPantalla=$formatPantalla;
    }

    public function muestraResumen()
    {
        parent::muestraResumen();
        echo '<p>idiomas: '.$this->idiomas.'</p>';
        echo '<p>formato de Pantalla: '.$this->formatPantalla.'</p>';
    }
}