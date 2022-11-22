<?php

function seeTable(){
    global $conexion;
    $query= "SELECT * FROM miembros";
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

?>
