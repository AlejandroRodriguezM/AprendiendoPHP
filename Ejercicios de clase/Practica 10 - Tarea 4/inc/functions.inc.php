<?php

function createCookieUser($user,$pass){
	//set cookie in cookies folder
	setcookie('user', $user, time() + 3600, '/');
	setcookie('pass', $pass, time() + 3600, '/');
}

function createCookieAdmin($user){
	setcookie('admin', $user, time() + 3600, '/');
}

function deleteCookie(){
	setcookie('user', '', time() - 3600, '/');
	setcookie('pass', '', time() - 3600, '/');
	setcookie('admin', '', time() - 3500, '/');
}


/**
 * Function that returns error messages when logging in
 *
 * @param [type] $user
 * @return string
 */
function errorSesion($user)
{
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

/**
 * 
 */
function createRandomCodMov(){
	$codigo = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 4);
	return $codigo;
}

