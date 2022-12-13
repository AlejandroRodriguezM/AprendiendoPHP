<?php
class MayorMenor {
    private int $mayor;
    private int $menor;

    public function setMayor (int $may) {
        $this -> mayor = $may;
    }

    public function setMenor (int $men) {
        $this -> menor = $men;
    }

    public function getMayor() : int {
        return $this -> mayor;
    }

    public function getMenor() : int {
        return $this -> menor;
    }

    public function numeroMayorYMenor($lista): ?MayorMenor{
        $this -> mayor = max($lista);
        $this -> menor = min($lista);
        return $this;
    }
}
