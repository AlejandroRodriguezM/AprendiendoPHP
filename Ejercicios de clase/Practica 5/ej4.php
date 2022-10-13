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
  function existe($miarray, $miNombre)
  {
    $posicion = array_search($miNombre, $miarray, false);
    return $posicion;
  }

  if (!empty($_POST['listaProductos'])) {
    $array = explode(",", $_POST['listaProductos']);
    $pos = count($array);
  } else {
    $array = array();
    $pos = 0;
  }


  if (!empty($_POST['nombre'])) {
    $nom = $_POST['nombre'];
    $si = existe($array, $nom);
    if (!empty($_POST['telefono'])) {
      $tel = $_POST['telefono'];
      if ($si || $si === 0) {
        $array[$si + 1] = $tel;
        echo "<div class='altoDch1'>TELEFONO CAMBIADO</div>";
      } else {
        $array[$pos] = $nom;
        $array[$pos + 1] = $tel;
        echo "<div class='altoDch1'>DATO AÑADIDO</div>";
      }
    } else {
      //Si está vacio el teléfono
      $tel = NULL;
      $si = existe($array, $nom);
      if ($si || $si === 0) {
        unset($array[$si]);
        unset($array[$si + 1]);
        $array = array_values($array);
        echo "<div class='altoDch1'><p>DATO ELIMINADO</p></div>";
      } else {
        echo "<div class='altoDch2'><p>FALTA EL TELÉFONO</p></div>";
      }
    }
  } else {
    $nom = NULL;
    if (!empty($_POST['telefono'])) {
      echo "<div class='altoDch2'><p>FALTA EL NOMBRE</p></div>";
    } else {
      echo "<div class='altoDch2'><p>NO HA INTRODUCIDO DATOS</p></div>";
    }
  }
  if (count($array) > 1) {
    echo "<h1>List&iacute;n telef&oacute;nico:</h1>";
    echo "<table><tr align='center'><th>Nombre</th><th>Tel&eacute;fono</th></tr>";
    for ($i = 0; $i < count($array); $i += 2) {
      if ($array[$i] !== NULL && $array[$i + 1] !== NULL)
        echo "<tr><td>" . $array[$i] . "</td><td>" . $array[$i + 1] . "</td></tr>";
    }
    echo "</table>";
  }
  ?>
  <div class="bajoDch">
    <form name="formulario" action="ej4.php" method="post">

      <table>
        <tr>
          <td>Nombre:</td>
          <td><input type="text" name="nombre" value=""></td>
        </tr>
        <tr>
          <td>Teléfono:</td>
          <td><input type="text" name="telefono" value=""></td>
        </tr>
        <tr>
          <td colospan="2">
            <input name="listaProductos" type="hidden" value="<?php if (isset($array)) echo implode(",", $array); ?>">
            <input type="submit" name="ingresar" value="Ingresar dato">
          </td>
        </tr>
      </table>

    </form>
  </div>
</body>

</html>