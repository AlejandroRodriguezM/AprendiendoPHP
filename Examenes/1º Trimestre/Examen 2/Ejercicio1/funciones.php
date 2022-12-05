<?php

// Accedemos a la sesión
session_name("Ejercicio1");
session_start();

// Si no existe la cookie, redirigimos a la primera página
if (!isset($_COOKIE["numero"])) {
    header("Location:index.php");
    exit;
}

// Funciones auxiliares
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

// Recogemos accion
$accion = recoge("accion");

// Dependiendo de la acción recibida, modificamos el número guardado
if ($accion == "cero") {
    //poner el valor de la cookie a 0
    setcookie("numero", 0, time() + 3600);
} elseif ($accion == "subir") {
    //incrementar la cookie
    setcookie("numero", $_COOKIE["numero"] + 1, time() + 3600);
} elseif ($accion == "bajar") {
    //decrementar la cookie
    setcookie("numero", $_COOKIE["numero"] - 1, time() + 3600);
}

// Volvemos al formulario
header("Location:index.php");
