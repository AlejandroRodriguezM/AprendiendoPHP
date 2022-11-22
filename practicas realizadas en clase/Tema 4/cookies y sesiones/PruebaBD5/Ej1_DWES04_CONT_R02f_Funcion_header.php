<!DOCTYPE html>
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 4 : Desarrollo de aplicaciones web con PHP -->
<!-- Ejemplo: Función header para autentificación HTTP -->
<?php
	if (!isset($_SERVER['PHP_AUTH_USER'])){
	header('WWW-Authenticate: Basic Realm="Contenido restringido"');
	header('HTTP/1.0 401 Unauthorized');
	echo "Usuario no reconocido!";
	exit;
}
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>
Ejercicio: Función header para autentificación HTTP
</title>
<link href="dwes.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
if (isset($_SERVER['PHP_AUTH_USER']) and isset($_SERVER['PHP_AUTH_PW'])){
	echo "Nombre de usuario: ".$_SERVER['PHP_AUTH_USER']."<br />";
	echo "Contraseña: ".$_SERVER['PHP_AUTH_PW']."<br />";
}
else
	echo "No se ha autentificado";
?>
</body>
</html>