<?php
/* Este archivo va a ser lo primero que se ejecute en cada pagina
 * Se establecen los parametros regionales, se incluye las funciones disponibles
 *  y se abre la conexion a la base de datos
 */
date_default_timezone_set('Europe/Madrid');
setlocale (LC_TIME, "es_ES");
require_once("functions.inc.php");
require_once("functionsDataBase.inc.php");

try {
	$conexion = new PDO('mysql:host=localhost;dbname=conta2', 'root', '1234');
	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	$error_Code = $e->getCode();
	$message = $e->getMessage();
	die("Code: " . $error_Code . "\nMessage: " . $message);
}
