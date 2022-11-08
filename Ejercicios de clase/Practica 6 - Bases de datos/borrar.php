<?php
include 'config/misfunciones.php';

$emailErr = "";

if (isset($_REQUEST["mail"])) {
  $mail = $_REQUEST["mail"];
} else {
  $mail = "";
}

//validamos el email
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["mail"])) {
    $emailErr = "Introduce el email";
  } else {
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Formato incorrecto";
    }
  }
}


?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Cursos</title>
  <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>

<body>

  <fieldset class="scrollmenu">
    <a href="principal.php">Inicio</a>
    <a href="insertar.php">Insertar</a>
    <a href="listar.php">Listar</a>
    <a href="borrar.php">Borrar</a>
    <a href="modificar.php">Modificar</a>
  </fieldset>

   <p><span class="error">* required field</span></p>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Ingrese el E-mail a borrar: <input type="text" name="Email" placeholder="Introduce Email" value="">
    <span class="error">* <?php echo $emailErr; ?></span>
    <br><br>
    <input type="submit" name="submit" value="Borrar">
    <input type="reset" value="Limpiar">
  </form>

  <?php

  if (($_SERVER["REQUEST_METHOD"] == "POST") && ($emailErr == "")) {

    $mail = $_REQUEST["Email"];
    $query = "delete from alumnos where Email='$mail'";
    $bd = "colegio";
    borrar($query, $mail, $bd);
  }

  ?>

</body>

</html>