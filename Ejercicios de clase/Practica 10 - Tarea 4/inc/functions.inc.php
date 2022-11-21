<?php
/**
 * Funcion que permite conectarte a la base de datos.
 *
 * @param [String] $base
 * @return $conexion
 */
function connection_bd($base)
{
  try {
    $conexion = new PDO("mysql:host=localhost;dbname=$base", "root", "1234");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->exec("SET CHARACTER SET UTF8");
  } catch (PDOException $e) {
    die("Codigo: " . $e->getCode() . "<br>Error: " . $e->getMessage());
  } finally {
    return $conexion;
  }
}

function obtain_password($login, $con){
    try{
        $sql="Select password from usuarios where login='$login'";
        if($result=$con->query($sql)){
            $row=$result->fetch();
            if($row != null){
                unset($result);
                return $row['password'];
            }
        }
    }catch(PDOException $e){
        $error_Code=$e->getCode();
        $message=$e->getMessage();
        die("Code: ".$error_Code."\nMessage: ".$message);
    }
}


