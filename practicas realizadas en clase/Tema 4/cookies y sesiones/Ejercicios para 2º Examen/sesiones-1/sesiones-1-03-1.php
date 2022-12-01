<?php
/**
 * Sesiones (1) 03 - sesiones-1-03-1.php
 *
 * @author Escriba aquí su nombre
 *
 */
session_name("sesion3");
session_start();


?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Formulario Palabra en mayúsculas (Formulario).
    Sesiones (1). Sesiones.
    Escriba aquí su nombre
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="ejercicios.css" title="Color">
</head>

<body>
  <h1>Formulario Palabra en mayúsculas (Formulario)</h1>

  <form action="sesiones-1-03-2.php" method="get">

<?php
// Si hay un texto guardado en la sesión, 
if(!isset($_SESSION["error"])&&isset($_SESSION['texto'])){
  print "<p>Ha escrito una palabra en mayúscula:<strong>$_SESSION[texto]</strong></p>";
}
?>
    <p>
      <label>Escriba una palabra Mayúscula: <input type="text" name="texto" size="20" maxlength="20" value="<?php
      if (isset($_SESSION['error'])){
        echo $_SESSION['texto'];
      }
    ?>">
    <?php
      if (isset($_SESSION['error'])){
        print "<span style='color:red'>$_SESSION[error]</span>";
      }
    ?>
    </label>
    </p>
    
    <p>
      <input type="submit" value="Comprobar">
      <input type="reset" value="Borrar">
    </p>
  </form>

  <footer>
    <p>Escriba aquí su nombre</p>
  </footer>
</body>
</html>
