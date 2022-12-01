<?php
/**
 * Sesiones (1) 02 - sesiones-1-02-1.php
 *
 * @author Escriba aquí su nombre
 *
 */
  session_name("sesion2");
  session_start();


?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Formulario Texto 2 (Formulario).
    Sesiones (1). Sesiones.
    Escriba aquí su nombre
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="ejercicios.css" title="Color">
</head>

<body>
  <h1>Formulario Texto 2 (Formulario)</h1>

<?php
// Si hay un texto guardado en la sesión, 
if(isset($_SESSION["texto"])){
  print "<p>El último texto escrito es:<strong>$_SESSION[texto]</strong></p>";
}

?>

  <form action="sesiones-1-02-2.php" method="get">
    <p><label>Escriba texto: <input type="text" name="texto" size="20" maxlength="20"></label></p>

    <p>
      <input type="submit" value="Siguiente">
      <input type="reset" value="Borrar">
    </p>
  </form>

  <footer>
    <p>Escriba aquí su nombre</p>
  </footer>
</body>
</html>
