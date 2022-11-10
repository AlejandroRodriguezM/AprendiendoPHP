<?php
//Conexión a la base de datos
function conectar($base)
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

//Insertar un registro y borrado
function operacionesMySql($query, $base)
{
  try {
    $conexion = conectar($base);
    // $conexion->query($query);
    $conexion->exec($query);
  } catch (PDOException $e) {
    die("Codigo: " . $e->getCode() . "<br>Error: " . $e->getMessage());
  } finally {
    $conexion = null;
  }
}

function checkID($query)
{
  $conexion = conectar("ventas_comerciales");
  $existe = false;
  $busqueda = $conexion->exec($query);
  if ($busqueda == 0) {
    $existe = true;
  }
  return $existe;
}

