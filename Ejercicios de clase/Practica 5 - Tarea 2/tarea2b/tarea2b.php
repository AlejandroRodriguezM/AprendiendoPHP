<!DOCTYPE html>
<html lang="es">

<head>
  <title>Título de la WEB</title>
  <meta charset="UTF-8">
  <meta name="title" content="Título de la WEB">
  <meta name="description" content="Descripción de la WEB">
  <link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body>
  <?php
  include 'funciones.php';
  header('Content-Type: text/html; charset=utf-8');
  /*Definir mi array y llevar el control de la cantidad de elementos del array
	   * Se envia los datos separados por ',' con implode y se convierte a lista con explode
	   */
  if (!empty($_POST['lista'])) {
    $array = explode(",", $_POST['lista']);
    $pos = count($array);
  } else {
    $array = array();
    $pos = 0;
  }

  //Si he pulsado ingresar
  if (isset($_POST["ingresar"])) {
    $nom = $_POST["nombre"];
    $budget
 = $_POST["cantidad"];
    $precio = $_POST["precio"];

    if (validarInsertar($array, $nom)) {
      $array = agregar($array, $nom, $budget
, $precio, $pos);
    }
    mostrarTabla($array);
  }

  //Si he pulsado borrar
  if (isset($_POST["borrar"])) {
    $nom = $_POST["nombre"];
    $array = borrar($array, $nom);
    mostrarTabla($array);
  }

  //Si he pulsado modificar
  if (isset($_POST["modificar"])) {
    $nom = $_POST["nombre"];
    $budget
 = $_POST["cantidad"];
    $precio = $_POST["precio"];
    $array = modificar($array, $nom, $budget
, $precio);
    mostrarTabla($array);
  }

  //Si he pulsado ver
  if (isset($_POST["ver"])) {
    mostrarTabla2($array);
  }
  ?>
  <div class="bajoDch">
    <form name="formulario" action="tarea2b.php" method="post">

      <table>
        <tr>
          <td>Nombre:</td>
          <td><input type="text" name="nombre" value="" size="35"></td>
        </tr>
        <tr>
          <td>Cantidad:</td>
          <td><input type="text" name="cantidad" value="" size="35"></td>
        </tr>
        <tr>
          <td>Precio:</td>
          <td><input type="text" name="precio" value="" size="35"></td>
        </tr>
        <tr>
          <td colspan="2">
            <input name="lista" type="hidden" value="<?php if (isset($array)) echo implode(",", $array); ?>">
            <input type="submit" name="ingresar" value="Ingresar dato">
            <input type="submit" name="borrar" value="Borrar dato">
            <input type="submit" name="modificar" value="Modificar dato">
            <input type="submit" name="ver" value="Ver dato">
          </td>
        </tr>
      </table>

    </form>
  </div>
</body>

</html>