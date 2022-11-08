<?php
//Conexión a la base de datos
function conectar($base)
{
  try {
    $conexion = new PDO("mysql:host=localhost;dbname=$base", "root", "1234");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->exec("SET CHARACTER SET UTF8");
  } catch (PDOException $e) {
    die("Codigo: ". $e->getCode() . "<br>Error: " . $e->getMessage());
  } finally {
    return $conexion;
  }
}

//Insertar un registro y borrado
function operacionTransaccion($query, $base)
{
  try{
    $conexion = conectar($base);
    $conexion->query($query);
  }catch (PDOException $e) {
    die("Codigo: ". $e->getCode() . "<br>Error: " . $e->getMessage());
  } finally {
    $conexion = null;
  }

}

function formularioInsertarVenta()
{
  // formulario basico
  echo "<form action='insercion.php' method='post'>";
  echo "<label for='id'>Id</label>";
  echo "<input type='text' name='id' id='id'>";
  echo "<label for='id_producto'>Id producto</label>";
  echo "<input type='text' name='id_producto' id='id_producto'>";
  echo "<label for='cantidad'>Cantidad</label>";
  echo "<input type='text' name='cantidad' id='cantidad'>";
  echo "<label for='fecha'>Fecha</label>";
  echo "<input type='text' name='fecha' id='fecha'>";
  echo "<input type='submit' name='insertar' value='Insertar'>";
  echo "</form>";
}

function insertarVenta()
{
  //insertar datos
  if (isset($_POST['cr'])) {
    if (!empty($_POST['cod']) && !empty($_POST['ref']) && !empty($_POST['cant'] && !empty($_POST['fecha']))) {
      $codigo = $_POST['cod'];
      $referencia = $_POST['ref'];
      $cantidad = $_POST['cant'];
      $fecha = $_POST['fecha'];

      $base = "ventas_comerciales";
      $query = "INSERT INTO ventas(codComercial,refProducto,cantidad,fecha) values('$codigo','$referencia','$cantidad','$fecha')";
      operacionTransaccion($query, $base);
      // header("Location:index.php");
    }
  }
}

function insertarProducto($ref, $nom, $descripcion, $precio, $descuento)
{
  //insertar datos
  if (isset($_POST['insertarProducto'])) {
    if (!empty($_POST['cod']) && !empty($_POST['ref']) && !empty($_POST['cant'] && !empty($_POST['fecha']))) {
      $codigo = $_POST['cod'];
      $referencia = $_POST['ref'];
      $cantidad = $_POST['cant'];
      $fecha = $_POST['fecha'];

      $base = "ventas_comerciales";
      $query = "INSERT INTO ventas(codComercial,refProducto,cantidad,fecha) values('$codigo','$referencia','$cantidad','$fecha')";
      operacionTransaccion($query, $base);
      // header("Location:index.php");
    }
  }
}
