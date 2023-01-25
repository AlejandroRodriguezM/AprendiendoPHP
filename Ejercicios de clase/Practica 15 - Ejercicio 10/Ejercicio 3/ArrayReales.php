<?php 

class ArrayReales
{
    private $valores;

    public function __construct(array $valores)
    {
        $this->valores = $valores;
    }

    public function minimo()
    {
        return min($this->valores);
    }

    public function maximo()
    {
        return max($this->valores);
    }

    public function sumatorio()
    {
        return array_sum($this->valores);
    }
}

interface Estadisticas
{
    public function minimo();
    public function maximo();
    public function sumatorio();
}