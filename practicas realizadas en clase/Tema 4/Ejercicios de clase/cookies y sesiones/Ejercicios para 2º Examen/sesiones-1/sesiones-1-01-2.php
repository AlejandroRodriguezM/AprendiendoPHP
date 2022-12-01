<?php
/**
 * Sesiones (1) 01 - sesiones-1-01-2.php
 *
 * @author Escriba aquí su nombre
 *
 */
session_name("sesion1");
session_start();



?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Formulario Texto 1 (Resultado).
    Sesiones (1). Sesiones.
    Escriba aquí su nombre
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="ejercicios.css" title="Color">
</head>

<body>
  <h1>Formulario Texto 1 (Resultado)</h1>

<?php
// Funciones auxiliares 1
function recoge($var, $m = "")
{
    $tmp = is_array($m) ? [] : "";
    if (isset($_REQUEST[$var])) {
        if (!is_array($_REQUEST[$var]) && !is_array($m)) {
            $tmp = trim(htmlspecialchars($_REQUEST[$var]));
        } elseif (is_array($_REQUEST[$var]) && is_array($m)) {
            $tmp = $_REQUEST[$var];
            array_walk_recursive($tmp, function (&$valor) {
                $valor = trim(htmlspecialchars($valor));
            });
        }
    }
    return $tmp;
}

// Recogemos el texto
$texto=$_REQUEST['texto'];
if(!empty($texto)){
  $_SESSION["texto"]=$texto;
  //lo mostramos
  print "<p>El texto es:<strong>$texto</strong></p>";
}

// Comprobamos el texto y escribimos avisos si es necesario


// Si el texto es válido,

  // guardamos el texto en la sesión

    // y lo mostramos

?>

  <p><a href="sesiones-1-01-1.php">Volver a la primera página.</a></p>

  <footer>
    <p>Escriba aquí su nombre</p>
  </footer>
</body>
</html>
