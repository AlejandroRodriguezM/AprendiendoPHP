<?php
//Conexión a la base de datos
function conectar($base)
{
  $conexion = new mysqli("localhost", "root", "1234", $base);
  if ($conexion->connect_error)
    die("Problemas con la conexión");
  return $conexion;
}

//Insertar un registro y borrado
function operacionTransaccion($query, $base)
{
  $conexion = conectar($base);
  $conexion->query($query) or die($conexion->error);
  $conexion->close();
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
    // si se ha pulsado el boton insertar
    if (isset($_REQUEST['insertar']) == "Insertar") {
      $id = $_REQUEST['id'];
      $fecha = $_REQUEST['fecha'];
      $id_producto = $_REQUEST['id_producto'];
      $cantidad = $_REQUEST['cantidad'];
      $query = "insert into ventas values($id,$id_producto,$cantidad,$fecha)";
      operacionTransaccion($query, "ventas_comerciales");
    }
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

function insertarProducto($ref,$nom,$descripcion,$precio,$descuento)
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
