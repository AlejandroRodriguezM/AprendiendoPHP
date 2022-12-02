<?php
// Si el usuario aún no se ha autentificado, pedimos las credenciales
if (!isset($_SERVER['PHP_AUTH_USER'])){
	header('WWW-Authenticate: Basic realm="Contenido restringido"');
	header("HTTP/1.0 401 Unauthorized");
	exit;
}
// Si ya ha enviado las credenciales, las comprobamos con la base de datos
else
{
	// Conectamos a la base de datos
try {	
	@$dwes=new mysqli("localhost","amigos","root","1234");
	$error=$dwes->connect_errno;
	}catch (Exception $ex)
        {
            exit;
        }
	// Si se estableció la conexión
if ($error==null){

		 date_default_timezone_set('Europe/Madrid');
		 
		// Ejecutamos la consulta para comprobar si existe
		// esa combinación de usuario y contraseña
		$sql="SELECT usuario FROM usuarios WHERE usuario='$_SERVER[PHP_AUTH_USER]' AND contrasena=md5('$_SERVER[PHP_AUTH_PW]')";
		$resultado=$dwes->query($sql);
		// Si no existe, se vuelven a pedir las credenciales
		if($resultado->num_rows==0){
			header('WWW-Authenticate: Basic realm="Contenido restringido"');
			header("HTTP/1.0 401 Unauthorized");
			echo "Debes introducir un usuario y contraseña!";
			exit;
		}
		else {
			if(isset($_COOKIE['ultimo_login'])){
				$ultimo_login=$_COOKIE['ultimo_login'];
			}
			setcookie("ultimo_login",time(),time()+3600);
		}
		$resultado->close();
		$dwes->close();
	}
	else {
		echo "Ocurrió algún error al conectar con la base de datos";
		exit;
	}
}
?>

<!DOCTYPE html >
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 4 : Desarrollo de aplicaciones web con PHP -->
<!-- Ejemplo: Cookies en autentificación HTTP -->
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>
Ejemplo Tema 4: Cookies en autentificación HTTP
</title>
<link href="dwes.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
	if ($error==null){
		echo"Nombre de usuario: ".$_SERVER['PHP_AUTH_USER']."<br />";
		echo "Hash de la contraseña: ".md5($_SERVER['PHP_AUTH_PW'])."<br />";
		if (isset($ultimo_login))
			echo "Ultimo login: ".date("d/m/y \a \l\a\s H:i",$ultimo_login);
		else
			echo "Bienvenido. Esta es su primera visita.";
	}
	else
		echo "Se ha producido el error $error.<br />";
?>
</body>
</html>