<?php

function protectAcces($user, $pass)
{
	global $conexion;
	if (isset($_COOKIE['user']) && isset($_COOKIE['pass'])) {
		$consulta = "SELECT * FROM usuarios WHERE login = '$user' AND password = '$pass'";
		$busqueda = $conexion->query($consulta);
		if ($busqueda->fetchColumn()) {
			unset($busqueda);
			if (isset($_COOKIE['admin'])) {
				$admin = $_COOKIE['admin'];
				if ($admin != 'daw') {
					deleteCookieUser();
					die("Error - You are not an administrator,<a href='../index.php'>Log in as a user</a> ");
				}
			}
		} else {
			errorSesion($user);
		}
	} else {
		deleteCookieUser();
		die("Error - You have to <a href='../index.php'>Log in</a>");
	}
}

/**
 * check a data inside a database and return a boolean if exist the data or not
 *
 * @param [String] $query
 * @return boolean
 */
function checkData($query)
{
	global $conexion;
	$existe = false;
	$busqueda = $conexion->query($query);
	if (!$busqueda->fetchColumn()) {
		unset($busqueda);
		$existe = true;
	}
	return $existe;
}

/**
 * Create a randomNumber of 4 digits randomdly, in case the cod alredy existe, the funtions call imself to try to create new code
 *
 * @return string
 */
function createRandomUserCodeMove()
{
	global $conexion;
	$code = createRandomCodMov();
	$sql = "select codigoMov from movimientos where codigoMov = '$code'";
	$busqueda = $conexion->query($sql);
	if (!$busqueda->fetchColumn()) {
		unset($busqueda);
		return $code;
	} else {
		createRandomCodMov();
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
	unset($consulta);
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
	unset($consulta);
	return $cantidad;
}



/**
 * Returns an array with the existing logins
 *
 * @return array
 */
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
 * Obtain the data of a user from his Login
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

/**
 *
 * Function that obtains the last 10 movements of a user
 *
 * @param boolean $soloRecibos
 * @return array
 */
function getMovimientos($login)
{
	global $conexion;
	$consulta = $conexion->prepare("SELECT * FROM movimientos WHERE loginUsu = '$login' ORDER BY fecha ASC LIMIT 10");
	$consulta->execute();
	$movimientos = $consulta->fetchAll(PDO::FETCH_ASSOC);
	return $movimientos;
}


/**
 * Insert a new movement in the DB
 * Receives an array with the movement data
 * The parameter $pago indicates if it is a payment,
 * which will convert the amount to a negative number.
 * Returns FALSE if everything went well, or the error message if it didn't go well.
 *
 * @param [type] $mov
 * @param boolean $pago
 * @return array
 */
function guardarNuevoMovimiento($mov, $pago = false)
{
	global $conexion;
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
		$error_Code = $e->getCode();
		$message = $e->getMessage();
		die("Code: " . $error_Code . "\nMessage: " . $message);
	}
}

/**
 * Return a receipt
 * Receive the receipt code.
 * Returns FALSE if everything went well or the error message if it didn't go well.
 *
 * @param [type] $codigoMov
 * @return boolean
 */
function devolverRecibo($codigoMov)
{
	try {
		$cantidad = returnAmount($codigoMov);
		modifyBudgetUser($cantidad, true);
		$borrado = "DELETE from movimientos WHERE codigoMov = '$codigoMov'";
		operacionesMySql($borrado);
		return false;
	} catch (PDOException $e) {
		$error_Code = $e->getCode();
		$message = $e->getMessage();
		die("Code: " . $error_Code . "\nMessage: " . $message);
	}
}


///////////////////////////////////////////
///     Funciones creadas por ARM       ///
///////////////////////////////////////////

function createReturnReceipt($mov)
{
	global $conexion;
	try {
		$consulta = $conexion->prepare("INSERT INTO movimientos (codigoMov, loginUsu, fecha, concepto, cantidad) VALUES (?, ?, ?, ?, ?)");
		// Ejecutamos la consulta
		$consulta->execute(array($mov['codigoMov'], $mov['loginUsu'], $mov['fecha'], "receipt return", $mov['cantidad']));
	} catch (PDOException $e) {
		$error_Code = $e->getCode();
		$message = $e->getMessage();
		die("Code: " . $error_Code . "\nMessage: " . $message);
	}
}

/**
 * Return the password from a user using loggin
 *
 * @param [type] $login
 * @param [type] $con
 * @return string
 */
function obtain_password($login)
{
	// Abrimos la conexion a la base de datos
	global $conexion;
	try {
		$sql = "SELECT password from usuarios where login='$login'";
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
 * Function used to insert data, modify, or delete from the database
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
	}
}

function updateUser($datosUsuario)
{
	$update = false;
	try {
		$login = $datosUsuario['login'];
		$name = $datosUsuario['nombre'];
		$pass_encrypted = $datosUsuario['password'];
		$bornDate = $datosUsuario['fNacimiento'];
		$sql = "UPDATE usuarios SET password = '$pass_encrypted', nombre = '$name', fNacimiento = '$bornDate' WHERE login = '$login'";
		operacionesMySql($sql);
		$update = true;
	} catch (PDOException $e) {
		$error_Code = $e->getCode();
		$message = $e->getMessage();
		die("Code: " . $error_Code . "\nMessage: " . $message);
	}
	return $update;
}

/**
 * Function that delete from database the user and the movements of the user
 *
 * @param [string] $movCode
 * @return boolean
 */
function deleteUser($login)
{
	$delete = false;
	try {
		$tabla = getMovimientos($login);
		$numMovimientos = count($tabla);
		if ($login != 'daw') {
			$sql1 = "DELETE FROM usuarios WHERE login = '$login'";

			if ($numMovimientos > 0) {
				$sql2 = "DELETE FROM movimientos WHERE loginUsu = '$login'";
				operacionesMySql($sql2);
			}
			operacionesMySql($sql1);
		}
		$delete = true;
	} catch (PDOException $e) {
		$error_Code = $e->getCode();
		$message = $e->getMessage();
		die("Code: " . $error_Code . "\nMessage: " . $message);
	}
	return $delete;
}

function newUser($datosUsuario)
{
	$insert = false;
	try {
		$login = $datosUsuario['login'];
		$pass_encrypted = $datosUsuario['password'];
		$name = $datosUsuario['nombre'];
		$bornDate = $datosUsuario['fNacimiento'];
		$budget = $datosUsuario['presupuesto'];
		$sql1 = "INSERT INTO usuarios (login, password, nombre, fNacimiento, presupuesto) VALUES ('$login', '$pass_encrypted', '$name', '$bornDate', '$budget')";
		operacionesMySql($sql1);
		$concepto = "Open account";
		$actualDate = date("Y-m-d");
		$codeMov = createRandomCodMov();
		$sql2 = "INSERT INTO movimientos (codigoMov, loginUsu, fecha, concepto, cantidad) VALUES ('$codeMov', '$login', '$actualDate', '$concepto', '$budget')";
		operacionesMySql($sql2);
		$insert = true;
	} catch (PDOException $e) {
		$error_Code = $e->getCode();
		$message = $e->getMessage();
		die("Code: " . $error_Code . "\nMessage: " . $message);
	}
	return $insert;
}

function checkUserAdmin($login, $pass)
{
	$admin = false;
	global $conexion;
	$sql = "SELECT * FROM usuarios WHERE login = '$login' AND password = '$pass'";
	$busqueda = $conexion->query($sql);
	if ($busqueda->fetchColumn()) {
		if ($login == 'daw') {
			$admin = true;
		} else {
			$errorAdmin = "Error. You are not the administrator.<br>";
			setcookie("errorAdmin", $errorAdmin, time() + 3600, "/");
		}
	}
	return $admin;
}
