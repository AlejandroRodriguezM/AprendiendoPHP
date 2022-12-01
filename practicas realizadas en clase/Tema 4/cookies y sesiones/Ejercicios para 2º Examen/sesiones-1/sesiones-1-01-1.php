<?php
/**
 * Sesiones (1) 01 - sesiones-1-01-1.php
 *
 * @author Escriba aquí su nombre
 *
 */


// Accedemos a la sesión1
  session_name("sesion1");
  session_start();


?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Formulario Texto 1 (Formulario).
   
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="ejercicios.css" title="Color">
</head>

<body>
  <h1>Formulario Texto 1 (Formulario)</h1>

<?php
// Si hay un texto guardado en la sesión, 
  if(isset($_SESSION["texto"])){
    print "<p>El último texto escrito es:<strong>$_SESSION[texto]</strong></p>";
  }


?>

  <form action="sesiones-1-01-2.php" method="get">
    <p><label>Escriba texto: <input type="text" name="texto" size="20" maxlength="20"></label></p>

    <p>
      <input type="submit" value="Siguiente">
      <input type="reset" value="Borrar">
    </p>
  </form>

  <footer>
    <p>IES Playamar</p>
  </footer>
</body>
</html>
