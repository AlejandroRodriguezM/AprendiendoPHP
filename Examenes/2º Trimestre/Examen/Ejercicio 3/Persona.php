<?php
//POR ALEJANDRO RODRIGUEZ MENA
class Persona
{
    const SEXO_DEFECTO = "H";
    private $nombre;
    private $edad;
    private $dni;
    private $sexo;
    private $peso;
    private $altura;
    private $amigos;
    // constructor con nombre, edad y sexo, peso y altura
    public function __construct($nombre, $edad, $sexo = self::SEXO_DEFECTO, $peso, $altura)
    {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->sexo = $sexo;
        $this->peso = $peso;
        $this->altura = $altura;
        $this->generaDNI();
        $this->amigos = array();
    }

    //Setters y getters
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setEdad($edad)
    {
        $this->edad = $edad;
    }
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }
    public function setPeso($peso)
    {
        $this->peso = $peso;
    }
    public function setAltura($altura)
    {
        $this->altura = $altura;
    }
    public function setAmigos($amigos)
    {
        $this->amigos = $amigos;
    }

    // getters
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function getDni()
    {
        return $this->dni;
    }

    public function getSexo()
    {
        return $this->sexo;
    }

    public function getPeso()
    {
        return $this->peso;
    }

    public function getAltura()
    {
        return $this->altura;
    }

    public function getAmigos()
    {
        return $this->amigos;
    }

    //Constantes para calcular IMC
    const PESO_BAJO = -1;
    const PESO_IDEAL = 0;
    const SOBREPESO = 1;

    //Funcion que devuelve un numero entre -1,0 o 1 segun el resultado del calculo del IMC
    public function calcularIMC()
    {
        $imc = $this->peso / ($this->altura * $this->altura);
        if ($imc < 20) {
            return self::PESO_BAJO;
        } else if ($imc >= 20 && $imc <= 25) {
            return self::PESO_IDEAL;
        } else {
            return self::SOBREPESO;
        }
    }
    //Comprueba si es mayor de edad y devuelve
    public function esMayorDeEdad()
    {
        return $this->edad >= 18;
    }
    // toString()
    public function __toString()
    {
        return "Nombre: " . $this->nombre . ", Edad: " . $this->edad . ", DNI: " . $this->dni . ", Sexo: " . $this->sexo . ", Peso: " . $this->peso . ", Altura: " . $this->altura . ", Amigos: " . implode(",", $this->amigos);
    }
    // genera un DNI
    private function generaDNI()
    {
        $numero = rand(10000000, 99999999);
        $letra = "";
        $resto = $numero % 23;
        $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
        $letra = $letras[$resto];
        $this->dni = $numero . $letra;
    }

    //Funcion que devuelve los amigos mayores de edad
    public function amigosMayoresDeEdad($amigos)
    {
        $amigosMayores = array();
        foreach ($amigos as $amigo) {
            if ($amigo->esMayorDeEdad()) {
                $amigosMayores[] = $amigo;
            }
        }
        return $amigosMayores;
    }
}
