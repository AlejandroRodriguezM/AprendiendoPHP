<?php
//POR ALEJANDRO RODRIGUEZ MENA
namespace Controlador;
require_once '../Modelo/Soporte.php';
use Modelo\Soporte as Soporte;

class Juego extends Soporte{
    public $consola;
    private $minNumeroJugadores;
    private $maxNumeroJugadores;

    public function __construct($titulo,$numero,$precio,$consola, $minNumeroJugadores,$maxNumeroJugadores)
    {
        parent::__construct($titulo,$numero,$precio);
        $this->consola=$consola;
        $this->minNumeroJugadores=$minNumeroJugadores;
        $this->maxNumeroJugadores=$maxNumeroJugadores;
    }
    public function muestraJugadoresPosibles(){
        if($this->minNumeroJugadores==$this->maxNumeroJugadores && $this->minNumeroJugadores==1){
            return "Para un jugador";
        }else
         if($this->minNumeroJugadores==$this->maxNumeroJugadores && $this->minNumeroJugadores>1){
            return "Para {$this->minNumeroJugadores} jugador";
         }else{
            return "De {$this->minNumeroJugadores} a {$this->maxNumeroJugadores}";
         }
    }
    public function muestraResumen(){
        parent::muestraResumen();
        echo self::muestraJugadoresPosibles();
    }
}