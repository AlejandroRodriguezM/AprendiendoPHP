<?php
/**
 * Sesiones (1) 03 - sesiones-1-03-2.php
 *
 * @author Escriba aquí su nombre
 *
 */

session_name("sesion3");
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
$texto=$_REQUEST["texto"];
$_SESSION["texto"]=$texto; 

// Comprobamos el texto
if(empty($texto)){
    $_SESSION['error']="No has introducido datos"; 
}elseif(!ctype_upper($texto)){
    $_SESSION['error']="No has introducido la palabra en mayúscula"; 
}else{
    unset($_SESSION["error"]);
}

// Volvemos al formulario 
header("Location:sesiones-1-03-1.php");
