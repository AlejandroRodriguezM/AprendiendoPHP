<?php

// Accedemos a la sesión
session_name("Ejercicio2");
session_start();

// Si algún contador no está guardado en la sesión, ponemos ambos a cero
if (!isset($_SESSION["azul"]) || !isset($_SESSION["naranja"])) {
  $_SESSION["azul"] = $_SESSION["naranja"] = 0;
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <title>Ejercicio 2 por Alejandro Rodriguez Mena</title>
</head>

<body>
  <h1>Votar una opción</h1>

  <form action="funciones.php" method="get">
    <p>Haga clic en los botones para votar por una opción:</p>

    <table>
      <tr>
        <td style="vertical-align: top;"><button type="submit" name="accion" value="azul" style="font-size: 30px; color: blue; width:450px;height: 70px;">Partido Azul</button></td>
        <td>
          <?php

          if (isset($_SESSION['azul'])) {
            echo $_SESSION['azul'];
          }

          ?>
        </td>
      </tr>
      <tr>
        <td><button type="submit" name="accion" value="naranja" style="font-size: 30px; color: orange; width:450px;height: 70px;">Partido Naranja</button></td>
        <td>
          <?php

          if (isset($_SESSION['naranja'])) {
            echo $_SESSION['naranja'];
          }

          ?>
        </td>
      </tr>
    </table>

    <p>
      <button type="submit" name="accion" value="cero">Poner a cero</button>
    </p>
  </form>
</body>

</html>