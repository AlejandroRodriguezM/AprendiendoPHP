<?php

function seeTableAficiones(){
    global $conexion;
    $query= "SELECT * FROM aficiones";
    $resultado = $conexion->query($query);
    if($resultado){
        $resultado->setFetchMode(PDO::FETCH_ASSOC);
        $tabla = $resultado->fetchAll();
    }
    else{
        $tabla = [];
        $tabla = "<tr><td colspan = '5'>No members in databse</td></tr>";
    }
    return $tabla;
}

function seeTableAmigosAficiones(){
    global $conexion;
    $query= "SELECT * FROM aficionesamigos";
    $resultado = $conexion->query($query);
    if($resultado){
        $resultado->setFetchMode(PDO::FETCH_ASSOC);
        $tabla = $resultado->fetchAll();
    }
    else{
        $tabla = [];
        $tabla = "<tr><td colspan = '5'>No members in databse</td></tr>";
    }
    return $tabla;
}

function seeTableAmigos(){
    global $conexion;
    $query= "SELECT * FROM tb_amigos";
    $resultado = $conexion->query($query);
    if($resultado){
        $resultado->setFetchMode(PDO::FETCH_ASSOC);
        $tabla = $resultado->fetchAll();
    }
    else{
        $tabla = [];
        $tabla = "<tr><td colspan = '5'>No members in databse</td></tr>";
    }
    return $tabla;
}
