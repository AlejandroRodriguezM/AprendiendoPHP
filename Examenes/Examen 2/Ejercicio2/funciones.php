<?php

// Accedemos a la sesión
session_name("Ejercicio2");
session_start();

// Si alguno de los números de votos no está guardado en la sesión, redirigimos a la primera página
if (!isset($_SESSION["azul"]) || !isset($_SESSION["naranja"])) {
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
    $_SESSION["azul"] = $_SESSION["naranja"] = 0;
} elseif ($accion == "azul") {
    $_SESSION["azul"]++;
} elseif ($accion == "naranja") {
    $_SESSION["naranja"]++;
}

// Volvemos al formulario
header("Location:index.php");
