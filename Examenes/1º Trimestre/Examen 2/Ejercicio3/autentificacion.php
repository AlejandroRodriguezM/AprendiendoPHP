<?php
session_start();

?>
<!DOCTYPE html>
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 4 : Desarrollo de aplicaciones web con PHP -->
<!-- Ejemplo: Función header para autentificación HTTP -->
<?php
if (!isset($_SERVER['PHP_AUTH_USER'])) {
	header('WWW-Authenticate: Basic Realm="Contenido restringido"');
	header('HTTP/1.0 401 Unauthorized');
	echo "Usuario no reconocido!";
	exit;
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autentificacion</title>
</head>

<body>
	<?php
	if ($_SERVER['PHP_AUTH_USER'] != 'dwes' || $_SERVER['PHP_AUTH_PW'] != 'dwes') {
		header('WWW-Authenticate: Basic Realm="Contenido restringido"');
		header('HTTP/1.0 401 Unauthorized');
		echo "Usuario no reconocido!";
		exit;
	} else {
		$_SESSION['autentificacion'] = 'autentificacion';
		header("Location:formulario1.php");
	}

	?>
</body>

</html>