<?php
/**
 * Funcion que permite conectarte a la base de datos.
 *
 * @param [String] $base
 * @return $conexion
 */
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

/**
 * Funcion que sirve para insertar datos, modificar, u eliminar de la base de datos
 *
 * @param [String] $query
 * @param [String] $base
 * @return void
 */
function operacionesMySql($query, $base)
{
  try {
    $conexion = conectar($base);
    $conexion->exec($query);
  } catch (PDOException $e) {
    die("Codigo: " . $e->getCode() . "<br>Error: " . $e->getMessage());
  } finally {
    $conexion = null;
  }
}

/**
 * Funcion que sirve para comprobar si el ID o referencia se encuentra dentro de la base de datos.
 *
 * @param [String] $query
 * @return boolean
 */
function checkID($query)
{
  $conexion = conectar("ventas_comerciales");
  $existe = false;
  $busqueda = $conexion->query($query);
  if ($busqueda->fetchColumn() == 0) {
    $existe = true;
  }
  return $existe;
}



