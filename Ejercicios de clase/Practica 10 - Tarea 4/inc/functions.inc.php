<?php
/* Verifica si el usuario guardado en la "Cookie" es correcto para acceder a la seccion administrativa
 * Puede recibir un parámetro que indica la URL a la que hay que redireccionar si falla.
 * Devuelve la cadena GET para usar en la URL si es correcto.
 */
function protegeAccesoAdmin($redirect = "../")
{
	$adminName = "daw";
	$user = $_COOKIE['user'];
	if (strcmp($adminName, $user) !== 0) {
		header("Location: $redirect");
	}
}

function errorSesion($user){
	if (!isset($_COOKIE['login'])) {
		$num_fallos = 1;
		setcookie('login', $user, time() + 3600);
		setcookie('num_fallos', $num_fallos, time() + 3600);
		$error = "Contraseña incorrecta primer intento, al tercero se bloquea";
	} else if ($_COOKIE['num_fallos'] == 1 && $_COOKIE['login'] == $user) {
		$num_fallos = 2;
		setcookie('login', $user, time() + 3600);
		setcookie('num_fallos', $num_fallos, time() + 3600);
		$error = "Contraseña incorrecta segundo intento, al tercero se bloquea";
	} else if ($_COOKIE['num_fallos'] == 1 && $_COOKIE['login'] != $user) {
		$num_fallos = 1;
		setcookie('login', $user, time() + 3600);
		setcookie('num_fallos', $num_fallos, time() + 3600);
		$error = "Contraseña incorrecta primer intento, al tercero se bloquea";
	} else if ($_COOKIE['num_fallos'] == 2 && $_COOKIE['login'] == $user) {
		setcookie('login', null, -1);
		setcookie('num_fallos', null, -1);
		header("Location: index.php");
	} else if ($_COOKIE['num_fallos'] == 2 && $_COOKIE['login'] != $user) {
		$num_fallos = 1;
		setcookie('login', $user, time() + 3600);
		setcookie('num_fallos', $num_fallos, time() + 3600);
		$error = "Contraseña incorrecta primer intento, al tercero se bloquea";
	}
	return $error;
}

// Devuelve un array con los Login existentes
function getLoginsList()
{
	// Abrimos la conexion a la base de datos
	global $conexion;
	// Preparamos la consulta
	$sql = "SELECT login FROM usuarios";
	// Ejecutamos la consulta
	$resultado = $conexion->query($sql);
	$listaLogin = $resultado->fetchAll(PDO::FETCH_COLUMN);
	// Devolvemos los datos
	return $listaLogin;
}

/**
 * Obtener los datos de un usuario a partir de su Login
 *
 * @param [type] $login
 * @return array
 */
function getUserData($login)
{
	global $conexion;
	$sql = "SELECT * FROM usuarios WHERE login='$login'";
	$resultado = $conexion->query($sql);
	$usuario = $resultado->fetch(PDO::FETCH_ASSOC);
	// Devolvemos los datos del usuario
	return $usuario;
}

// Obtener los 10 ultimos movimientos de un usuario
function getMovimientos($soloRecibos = false)
{
	// Abrimos la conexion a la base de datos
	global $conexion;

	if ($soloRecibos) {
		// Preparamos la consulta y comprobamos que existen los mivimientos
		$login = $_SESSION['usuario'];
		$consulta = $conexion->prepare("SELECT * FROM movimientos WHERE loginUsu = '$login' ORDER BY fecha ASC LIMIT 10");
		$consulta->execute();
		$movimientos = $consulta->fetchAll(PDO::FETCH_ASSOC);
		return $movimientos;
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
		$consulta->execute(array($mov['codigoMov'], $mov['loginUsu'], $mov['fecha'], $mov['concepto'], $mov['cantidad']));

		// Si es un pago, convertimos la cantidad a negativo
		if ($pago) {
			$consulta = $conexion->prepare("UPDATE movimientos SET cantidad = -cantidad WHERE codigoMov = ?");
			$consulta->execute(array($mov['codigoMov']));
		}
		return false;
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
	// Preparamos la consulta
	try {
		$cantidad = returnAmount($codigoMov);
		modifyBudgetUser($cantidad, true);
		$borrado = "DELETE from movimientos WHERE codigoMov = '$codigoMov'";
		operacionesMySql($borrado);
		return false;
	} catch (PDOException $e) {
		return "#" . $e->getCode() . ": " . $e->getMessage();
	}
}


///////////////////////////////////////////
///     Funciones creadas por ARM       ///
///////////////////////////////////////////

/**
 * Return the password from a user using loggin
 *
 * @param [type] $login
 * @param [type] $con
 * @return
 */
function obtain_password($login)
{
	// Abrimos la conexion a la base de datos
	global $conexion;
	try {
		$sql = "Select password from usuarios where login='$login'";
		if ($result = $conexion->query($sql)) {
			$row = $result->fetch();
			if ($row != null) {
				unset($result);
				return $row['password'];
			}
		}
	} catch (PDOException $e) {
		$error_Code = $e->getCode();
		$message = $e->getMessage();
		die("Code: " . $error_Code . "\nMessage: " . $message);
	}
}


/**
 * Funcion que sirve para insertar datos, modificar, u eliminar de la base de datos
 *
 * @param [String] $query
 * @param [String] $base
 * @return void
 */
function operacionesMySql($query)
{
	try {
		global $conexion;
		// Ejecutamos la consulta
		$conexion->exec($query);
	} catch (PDOException $e) {
		$error_Code = $e->getCode();
		$message = $e->getMessage();
		die("Code: " . $error_Code . "\nMessage: " . $message);
	} finally {
		$conexion = null;
	}
}

/**
 * Funcion que sirve para comprobar si el login se encuentra dentro de la base de datos.
 *
 * @param [String] $query
 * @return boolean
 */
function checkData($query)
{
	global $conexion;
	$existe = false;
	$busqueda = $conexion->query($query);
	if ($busqueda->fetchColumn() == 0) {
		$existe = true;
	}
	return $existe;
}

/**
 * Create a randomNumber of 4 digits randomdly, in case the cod alredy existe, the funtions call imself to try to create new code
 *
 * @return $codigo
 */
function createRandomUserCodeMove()
{
	global $conexion;
	$codigo = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 4);

	$sql = "select codigoMov from movimientos where codigoMov = '$codigo'";
	$busqueda = $conexion->query($sql);
	if ($busqueda->fetchColumn() == 0) {
		return $codigo;
	} else {
		createRandomUserCodeMove();
	}
}

/**
 * Modify the budget from an specific user.
 *
 * @param [type] $amount
 * @param boolean $pago
 * @return void
 */
function modifyBudgetUser($amount, $pago = false)
{
	// Preparamos la consulta
	global $conexion;
	try {
		$login = $_SESSION['usuario'];
		// Si es un pago, convertimos la cantidad a negativo
		if ($pago) {
			$consulta = $conexion->prepare("UPDATE usuarios SET presupuesto = presupuesto - ? WHERE login = ?");
		} else {
			$consulta = $conexion->prepare("UPDATE usuarios SET presupuesto = presupuesto + ? WHERE login = ?");
		}
		$consulta->execute(array($amount, $login));
	} catch (PDOException $e) {
		$error_Code = $e->getCode();
		$message = $e->getMessage();
		die("Code: " . $error_Code . "\nMessage: " . $message);
	}
}

/**
 * Function that returns the budget of a specific user 
 *
 * @return int
 */
function returnBudget()
{
	global $conexion;
	$login = $_SESSION['usuario'];
	$consulta = $conexion->prepare("SELECT presupuesto FROM usuarios where login = ?");
	$consulta->execute(array($login));
	$budget = $consulta->fetch(PDO::FETCH_ASSOC)['presupuesto'];
	return $budget;
}

/**
 * Function that returns the amount of a specific movement
 *
 * @param [type] $movCode
 * @return int
 */
function returnAmount($movCode)
{
	global $conexion;
	$consulta = $conexion->prepare("SELECT cantidad FROM movimientos WHERE codigoMov = ?");
	$consulta->execute(array($movCode));
	$cantidad = $consulta->fetch(PDO::FETCH_ASSOC)['cantidad'];
	return $cantidad;
}


