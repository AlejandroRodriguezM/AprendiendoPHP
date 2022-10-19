<?php
include 'config/misfunciones.php';

$emailErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_REQUEST["mail"])) {
    $mail = $_REQUEST["mail"];
    if (isset($_REQUEST["mailNuevo"])) {
      $mailNuevo = $_REQUEST["mailNuevo"];
    } else {
      $emailNuevo = "";
    }
  } else {
    $mail = "";
  }

  //validamos el email
  if (empty($_POST["mail"])) {
    $emailErr = "Introduce el email";
    if (empty($_POST["mailNuevo"])) {
      $emailErr = "Introduce el email";
    } else {
      if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Formato incorrecto";
      }
    }
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
    Ingrese el E-mail del alumno: <input type="text" name="mail" placeholder="Introduce Email" value="">
    <span class="error">*<?php echo $emailErr; ?></span>
    <br><br>
    Ingrese el Nuevo E-mail del alumno: <input type="text" name="mailNuevo" placeholder="Introduce Email" value="">
    <span class="error">* <?php echo $emailErr; ?></span>
    <br><br>
    <input type="submit" name="submit" value="Modificar">
    <input type="reset" value="Limpiar">
  </form>
  <?php

  if (($_SERVER["REQUEST_METHOD"] == "POST") && ($emailErr == "")) {

    $bd = "colegio";
    $query = "UPDATE alumnos SET Email='$mailNuevo' WHERE Email='$mail'";
    insertar($query, $bd);

    echo "El alumno fue modificado";
  }

  ?>

</body>

</html>