<?php

class Empleado{

    private String $nombre;
    private String $apellido;
    private int $sueldo;
    private int $telefono;

    public function setNombre(String $nom){
        $this -> nombre = $nom;
    }

    public function setApellido(String $ape){
        $this -> apellido = $ape;
    }

    public function setSueldo(int $suel){
        $this -> sueldo = $suel;
    }

    public function setTelefono(int $tel){
        $this -> telefono = $tel;
    }

    public function getNombre(){
        return $this -> nombre;
    }

    public function getApellido(){
        return $this -> apellido;
    }

    public function getSueldo(){
        return $this -> sueldo;
    }

    public function getTelefono(){
        return $this -> telefono;
    }

    public function nombreCompleto(){
        $nombreUsuario = $this -> nombre;
        $apellidoUsuario = $this -> apellido;
        return $nombreUsuario . " " . $apellidoUsuario;
    }

    public function pagarHacienda(){
        $sueldoUsuario = $this -> sueldo;
        $pagar = false;

        if($sueldoUsuario > 3333){
            $pagar = true;
        }
        return $pagar;
    }

    public function insertTelefono(){
        print($this->nombreCompleto());
    }

}
