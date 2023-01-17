<?php

class Empleado extends Persona
{
    const sueldoTope = 2100;
    protected $sueldo;
    protected $telefonos;

    public function __construct($nombre, $apellido, $sueldo, $telefonos)
    {
        parent::__construct($nombre, $apellido);
        $this->sueldo = $sueldo;
        $this->telefonos = $telefonos;
    }

    public function getSueldo()
    {
        return $this->sueldo;
    }

    public function setSueldo($sueldo)
    {
        $this->sueldo = $sueldo;
    }

    public function debePagarImpuestos(){
        if ($this->sueldo > self::sueldoTope) {
            return true;
        } else {
            return false;
        }
    }

    public function anyadirTelefono($telefono){
        $this->telefonos[] = $telefono;
    }

    public function listarTelefonos(){
        foreach ($this->telefonos as $telefono) {
            echo $telefono . "<br>";
        }
    }

    public function vaciarTelefonos(){
        $this->telefonos = [];
    }

    public static function toHtml($Empleado){
        $html = "<table border='1'>";
        $html .= "<tr><th>Nombre</th><th>Edad</th><th>Sueldo</th><th>Telefonos</th><th>Impuestos</th></tr>";
        $html .= "<tr><td>" . $Empleado->getNombre() . "</td>";
        $html .= "<td>" . $Empleado->getApellido() . "</td>";
        $html .= "<td>" . $Empleado->sueldo . "</td>";
        $html .= "<td>";
        foreach ($Empleado->telefonos as $telefono) {
            $html .= $telefono . "<br>";
        }
        $html .= "</td>";
        if($Empleado->debePagarImpuestos()){
            $html .= "<td style='color:red'>Debe de pagar impuestos</td>";
        } else {
            $html .= "<td style='color:green'>No debe de pagar impuestos</td>";
        }
        $html .= "<td>";
        $html .= "<form action='index.php' method='post'>";
        $html .= "<input type='submit' name='back' value='Back'>";
        $html .= "</form>";
        $html .= "</td>
        </tr>";
        $html .= "</table>";
        return $html;
    }

    public function __toString()
    {
        return parent::__toString() . " " . $this->sueldo;
    }


}


