<?php
/**
 * Sesiones (1) 02 - sesiones-1-02-2.php
 *
 * @author Escriba aquí su nombre
 *
 */
session_name("sesion2");
session_start();


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


// Comprobamos el texto
if(!empty($texto)){
    $_SESSION["texto"]=$texto;
   
  }
  header("Location:sesiones-1-02-1.php");  


// Si el texto no es válido ...

    // ... volvemos al formulario 

    // ... guardamos el texto en la sesión 

    // Volvemos al formulario 
