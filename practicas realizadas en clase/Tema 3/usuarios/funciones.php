<?php
    //Conexión a la base de datos
    function conectar($base){
        $conexion = new mysqli("localhost","root","1234",$base);
        if ($conexion->connect_error)
          die("Problemas con la conexión");
        return $conexion;
      }

    //Insertar un registro y borrado
    function operacionTransaccion($query,$base){
        $conexion = conectar($base);
        $conexion->query($query) or die($conexion->error);
        $conexion->close();
      }

?>