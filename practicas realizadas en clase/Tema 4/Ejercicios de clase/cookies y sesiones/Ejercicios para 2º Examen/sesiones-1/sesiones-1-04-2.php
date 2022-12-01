<?php
/**
 * Sesiones (1) 04 - sesiones-1-04-2.php
 *
 * @author Escriba aquí su nombre
 *
 */

// Accedemos a la sesión 3


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

// Recogemos las dos palabras


// Guardamos las palabras en la sesión 2


// Comprobamos la palabra en mayúsculas

    // Si no se recibe palabra, guardamos en la sesión el mensaje de error 4
   

    // Si la palabra está en minúsculas, guardamos en la sesión el mensaje de error 5}
  

    // Si la palabra es correcta, borramos los posibles errores anteriores 6
    

// Comprobamos la palabra en minúsculas 7

    // Si no se recibe palabra, guardamos en la sesión el mensaje de error
   

    // Si la palabra está en mayúsculas, guardamos en la sesión el mensaje de error
   
    // Si la palabra es correcta, borramos los posibles errores anteriores
   
// Volvemos al formulario 8

