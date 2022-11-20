<?php
    //Conexión a la base de datos
    function conectar($base){
        try{
          $conexion=new PDO("mysql:host=localhost;dbname=".$base,"root","1234");
          $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
          echo $e->getMessage();
        }
        return $conexion;
      }
    //Inserta un registro
    function insertar($sql,$base){
      $conexion=conectar($base);
      $todo_bien=true;
      //iniciamos la transacción
      $conexion->beginTransaction();
      if ($conexion->exec($sql)==0)
        $todo_bien=false;
      if ($todo_bien){
        $conexion->commit();
        print "<p>Los cambios se han realizado correctamente</p>";
      }else{
        $conexion->rollback();
        print "<p>No se han podido realizar los cambios</p>";
      }
      unset($conexion);
    }
    function borrarUsuario($query,$base){
      $conexion=conectar($base);
      $conexion->exec($query);
      unset($conexion);
    }
    function modificarUsuario($query,$base){
      $conexion=conectar($base);
      $conexion->exec($query);
      unset($conexion);
    }
    

?>