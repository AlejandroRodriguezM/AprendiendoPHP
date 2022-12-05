<?php

// Accedemos a la sesión
session_name("Ejercicio1");
session_start();

// Si el número no está guardado en la sesión, ponemos el valor a cero
if (!isset($_COOKIE["numero"])) {
  $valor = 0;
  setcookie("numero", 0, time() + 3600);
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <title>Ejercicio 1 por Alejandro Rodriguez Mena</title>
</head>

<body>
  <h1>Incrementar y decrementar</h1>

  <form action="funciones.php" method="get">
    <p>Haga clic en los botones para modificar el valor:</p>

    <p>
      <button type="submit" name="accion" value="bajar" style="font-size: 4rem">-</button>
      <?php
      // Mostramos el número, guardado en la cookie
      print "<span style=\"font-size: 4rem\">".$_COOKIE['numero']."</span>\n";
      ?>
      <button type="submit" name="accion" value="subir" style="font-size: 4rem">+</button>
    </p>

    <p>
      <button type="submit" name="accion" value="cero">Poner a cero</button>
    </p>
  </form>
</body>

</html>