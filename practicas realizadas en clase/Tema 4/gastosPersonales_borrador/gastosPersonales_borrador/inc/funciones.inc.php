<?php

// Devuelve la cadena GET con los datos del usuario para usar en las URLs
function generarFakeCookie($login, $password, $cifrar = true)
{
	// Guardamos la clave cifrada por seguridad
	if ($cifrar) {
		$password = password_hash($password, PASSWORD_DEFAULT);
	}
	// Creamos la cookie
	$cookie = "login=$login&password=$password";
	// Devolvemos la cookie
	return $cookie;
}

/** Verifica si el usuario guardado en la "Cookie" es correcto para acceder a su cuenta
 * Puede recibir un parámetro que indica la URL a la que hay que redireccionar si falla.
 * Devuelve un array con los datos del usuario, incluida la cadena GET de la "cookie"
 */
function protegeAccesoCuenta($redirect = "../")
{
	// Si no hay cookie, redirigimos
	if (!isset($_COOKIE['login'])) {
		header("Location: $redirect");

		// Si hay cookie, comprobamos que sea correcta
	} else {
		// Obtenemos los datos del usuario
		$datos = explode("&", $_COOKIE['login']);
		$login = explode("=", $datos[0])[1];
		$password = explode("=", $datos[1])[1];
		// Comprobamos que el usuario exista
		$usuario = getUserData($login);
		if ($usuario) {
			// Comprobamos que la contraseña sea correcta
			if (password_verify($password, $usuario['password'])) {
				// Devolvemos los datos del usuario
				return $usuario;
			}
		}
		// Si no es correcta, redirigimos
		header("Location: $redirect");
	}
}


/* Verifica si el usuario guardado en la "Cookie" es correcto para acceder a la seccion administrativa
 * Puede recibir un parámetro que indica la URL a la que hay que redireccionar si falla.
 * Devuelve la cadena GET para usar en la URL si es correcto.
 */
function protegeAccesoAdmin($redirect = "../")
{
	// Si no hay cookie, redirigimos
	if (!isset($_COOKIE['login'])) {
		header("Location: $redirect");

		// Si hay cookie, comprobamos que sea correcta
	} else {
		// Obtenemos los datos del usuario
		$datos = explode("&", $_COOKIE['login']);
		$login = explode("=", $datos[0])[1];
		$password = explode("=", $datos[1])[1];
		// Comprobamos que el usuario exista
		$usuario = getUserData($login);
		if ($usuario) {
			// Comprobamos que la contraseña sea correcta
			if (password_verify($password, $usuario['password'])) {
				// Comprobamos que el usuario sea administrador
				if ($usuario['admin']) {
					// Devolvemos la cookie
					return $_COOKIE['login'];
				}
			}
		}
		// Si no es correcta, redirigimos
		header("Location $redirect");
	}
}

// Devuelve un array con los Login existentes
function getLoginsList()
{
	// Abrimos la conexion a la base de datos
	global $conexion;
	// Preparamos la consulta
	$consulta = $conexion->prepare("SELECT login FROM usuarios");
	// Ejecutamos la consulta
	$consulta->execute();
	// Devolvemos los datos
	return $consulta->fetchAll(PDO::FETCH_COLUMN);
}


/**
 * Obtener los datos de un usuario a partir de su Login
 */
function getUserData($login)
{
	$conexion = connection_bd("conta2");
	$sql = "SELECT * FROM usuarios WHERE login='$login'";
	$resultado = $conexion->query($sql);
	$usuario = $resultado->fetch(PDO::FETCH_ASSOC);
	// Devolvemos los datos del usuario
	return $usuario;
}




/* Valida los datos de usuario
*	Recibe el array asosiativo por referencia con los datos del usuario
*	array(
*		'login' => "",
*		'password' => "",
*		'repassword' => "",
*		'nombre' => "",
*		'fNacimiento' => ""
*	);
*	Los dos siguiente parametros sirven para validar los datos al modificar un usuario:
*		$requirePW sirve para indicar si se devuelve error si no se indica un pw.
*		$loginExists sirve para indicar si el error se produce cuando el usuario ya existe o no.
*	Devuelve FALSE si son validos, o devuelve el mensaje de error si no lo son.
*/
function errorValidarDatosUsuario(&$fValue, $requirePW = true, $loginExists = true)
{
	global $conexion;

	// Se ha introducido un login de longitud correcta
	if (strlen($fValue['login']) < 1 || strlen($fValue['login']) > 10) {
		return "Falta el nombre de Login o es muy largo(max: 10 caracteres)";
	}
	// El nombre de login no existe
	try {
		$consulta = $conexion->prepare("SELECT * FROM Usuarios WHERE login=?");
		$consulta->bindParam(1, $fValue['login']);
		$consulta->execute();
		$yaExiste = $consulta->rowCount();
		if ($yaExiste && $loginExists) {
			return "El nombre de Login ya existe.";
		} elseif (!$yaExiste && !$loginExists) {
			return "El nombre de Login no existe.";
		}
	} catch (PDOException $e) {
		return "#" . $e->getCode() . ": " . $e->getMessage();
	}

	// Se valida la clave si es requerido o si se ha introducido algo
	if ($requirePW || strlen($fValue['password']) || strlen($fValue['repassword'])) {
		// Las claves coinciden
		if ($fValue['password'] !== $fValue['repassword']) {
			return "Las claves no coinciden";
			// Le borro el campo de repetir clave para obligarle a escribirlo otra vez
			$fValue['repassword'] = "";
		}
		// Se ha introducido una clave de longitud correcta
		if (strlen($fValue['password']) < 1 || strlen($fValue['password']) > 20) {
			return "La clave debe contener de 1 a 20 caracteres.";
		}
	}

	// Se ha introducido un nombre con longitud correcta
	if (strlen($fValue['nombre']) < 1 || strlen($fValue['nombre']) > 30) {
		return "El nombre debe contener de 1 a 30 caracteres.";
	}

	// Validar la fecha, se espera formato yyyy-mm-dd
	if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $fValue['fNacimiento'])) {
		return "La fecha proporcionada es incorrecta";
	}

	return false;
}

// Obtener los 10 ultimos movimientos de un usuario
function getMovimientos($soloRecibos = false)
{
	// Abrimos la conexion a la base de datos
	global $conexion;
	// Preparamos la consulta y comprobamos que existen los mivimientos
	$consulta = $conexion->prepare("SELECT * FROM movimientos WHERE login=? ORDER BY fecha DESC LIMIT 10");
	$consulta->bindParam(1, $_SESSION['login']);
	$base = "ventas_comerciales";
	$conexion = conectar($base);
	$registros = $conexion->query($consulta) or die($conexion->error);
	if ($registros->fetchColumn() == 0) {
		return "<b class='mens_error'>No existen movimientos </b>";
	} else {
		$consulta->execute();
		// Devolvemos los datos
		return $consulta->fetchAll(PDO::FETCH_ASSOC);
	}
}


/* Insertar un nuevo movimiento en la DB
 * Recibe un array con los datos del movimiento
 * El parametro $pago indica si es un pago, 
 * con lo que convertirá la cantidad a un numero negativo.
 * Devuelve FALSE si todo ha ido bien, o el mensaje de error si no ha ido bien.
 */
function guardarNuevoMovimiento($mov, $pago = false)
{
	// Abrimos la conexion a la base de datos
	global $conexion;
	// Preparamos la consulta
	try {
		$consulta = $conexion->prepare("INSERT INTO movimientos (codigoMov, loginUsu, fecha, concepto, cantidad) VALUES (?, ?, ?, ?, ?)");
		// Ejecutamos la consulta
		$consulta->execute(array($mov['fecha'], $mov['concepto'], $mov['cantidad'] * ($pago ? -1 : 1), $mov['tipo']));
		// Devolvemos los datos
		return $consulta->rowCount();
	} catch (PDOException $e) {
		return "#" . $e->getCode() . ": " . $e->getMessage();
	}
}

/* Devolver un recibo
 * Recibe el codigo del recibo.
 * Devuelve FALSE si todo ha ido bien o el mensaje de error si no ha ido bien.
*/
function devolverRecibo($codigoMov)
{
	// Abrimos la conexion a la base de datos
	global $conexion;
	// Preparamos la consulta
	try {
		//Modify movimientos and usuarios
		$consulta = $conexion->prepare("DELETE movimientos WHERE codigoMov = $codigoMov");
		$consulta->execute(array($codigoMov));

		$consulta = $conexion->prepare("UPDATE usuarios SET presupuesto = presupuesto + (SELECT cantidad FROM movimientos WHERE codigoMov = $codigoMov) WHERE login = (SELECT loginUsu FROM movimientos WHERE codigoMov = $codigoMov)");
		$consulta->execute(array($codigoMov, $codigoMov));
		// Devolvemos los datos
		return $consulta->rowCount();
	} catch (PDOException $e) {
		return "#" . $e->getCode() . ": " . $e->getMessage();
	}
}


/* Validación de los datos de un nuevo movimiento.
 * Recibe el array con los datos del nuevo movimiento
 *	array(
 *		'fecha' => "",
 *		'concepto' => "",
 *		'cantidad' => "",
 *	);
 * Devuelve FALSE si todo es correcto o un texto con el mensaje de error si no es correcto.
 */
function errorValidarNuevoMovimiento($fValue)
{
	// Validar la fecha
	if (empty($fValue['fecha'])) {
		return 'Debe indicar la fecha.';
	}
	$fecha = explode("-", $fValue['fecha']);
	if (count($fecha) != 3 || !checkdate($fecha[1], $fecha[2], $fecha[0]) || $fecha[0] < 2000) {
		return 'Fecha inválida';
	}

	// Validar el concepto
	if (empty($fValue['concepto'])) {
		return 'Debe indicar un concepto.';
	}
	if (strlen($fValue['concepto']) > 20) {
		return "El concepto debe contener 20 caracteres máximo.";
	}

	// Validar que la cantidad sea un numero mayor que 0
	if (empty($fValue['cantidad']) || $fValue['cantidad'] <= 0) {
		return 'Debe indicar una cantidad positiva';
	}

	return false;
}


/* 
 * Recibe una cantidad y devuelve una etiqueta HTML span
 * con la cantidad formateada como moneda y 
 * una clase que indica si es positiva o negativa.
 */
function htmlSpanMoneda($cantidad)
{
	if ($cantidad < 0) {
		$span = '<span class="negativo">';
	} else {
		$span = '<span class="positivo">';
	}
	$span .= number_format($cantidad, 2) . ' €</span>';

	return $span;
}


/*
 * Recibe la cantidad de un movimiento y tambien el saldoContable
 * antes de el movimiento, de forma que actualiza su valor por referencia.
 * Tambien devuelve el saldocontable formateado con la funcion htmlSpanMoneda.
 */
function calcularSaldoContable($cantidad, &$saldoContable)
{
	$saldoContable += $cantidad;

	return htmlSpanMoneda($saldoContable);
}

/**
 * Se borrara el usuario cuyo login queramos
 */
function borrarUsuario($login)
{
	// Abrimos la conexion a la base de datos
	global $conexion;
	// Preparamos la consulta
	try {
		$consulta = $conexion->prepare("DELETE FROM usuarios WHERE login = ?");
		// Ejecutamos la consulta
		$consulta->execute(array($login));
		// Devolvemos los datos
		return $consulta->rowCount();
	} catch (PDOException $e) {
		return "#" . $e->getCode() . ": " . $e->getMessage();
	}
}
