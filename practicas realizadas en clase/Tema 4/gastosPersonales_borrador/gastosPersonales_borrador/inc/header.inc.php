<?php
/* Este archivo va a ser lo primero que se ejecute en cada pagina
 * Se establecen los parametros regionales, se incluye las funciones disponibles
 *  y se abre la conexion a la base de datos
 */
date_default_timezone_set('Europe/Madrid');
setlocale (LC_TIME, "es_ES");
require_once("funciones.inc.php");


try {
	$conexion = new PDO('mysql:host=localhost;dbname=conta2', 'root', 'root');
	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	$error = "#".$e->getCode().": ".$e->getMessage();
}
