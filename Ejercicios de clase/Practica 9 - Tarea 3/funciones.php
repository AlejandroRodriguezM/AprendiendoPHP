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
function operacionTransaccion($query, $base)
{
  try {
    $conexion = conectar($base);
    $conexion->query($query);
  } catch (PDOException $e) {
    die("Codigo: " . $e->getCode() . "<br>Error: " . $e->getMessage());
  } finally {
    $conexion = null;
  }
}

function checkID($codigo,$query)
{
  $conexion = conectar("ventas_comerciales");
  $registros = $conexion->query($query);
  $existe = false;
  while ($fila = $registros->fetchALL(PDO::FETCH_ASSOC)) {
    foreach ($fila as $key => $value) {
      if ($value == $codigo) {
        $existe = true;
        echo "<script>alert('El codigo ya existe')</script>";
      }
    }
  }
  return $existe;
}
