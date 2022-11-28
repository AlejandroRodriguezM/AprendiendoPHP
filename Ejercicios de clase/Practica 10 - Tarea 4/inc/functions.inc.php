<?php

function createCookieUser($user, $pass)
{
	setcookie('user', $user, time() + 3600, '/');
	setcookie('pass', $pass, time() + 3600, '/');
}

function createCookieAdmin($user)
{
	setcookie('admin', $user, time() + 3600, '/');
}

function deleteCookieUser()
{
	session_start();
	session_destroy();
	setcookie('user', '', time() - 3600, '/');
	setcookie('pass', '', time() - 3600, '/');
	setcookie('admin', '', time() - 3500, '/');
}

function deleteCookieLoginError()
{

	setcookie('errorLogin', '', time() - 3600, '/');
	setcookie('errorAdmin', '', time() - 3600, '/');
	setcookie('num_fallos', '', time() - 3600, '/');
	setcookie('login', '', time() - 3600, '/');
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
		setcookie('login', $user, time() + 3600, '/');
		setcookie('num_fallos', $num_fallos, time() + 3600, '/');
		$error = "Contraseña incorrecta primer intento, al tercero se bloquea";
		setcookie('errorLogin', $error, time() + 3600, '/');
	} else if ($_COOKIE['num_fallos'] == 1 && $_COOKIE['login'] == $user) {
		$num_fallos = 2;
		setcookie('login', $user, time() + 3600, '/');
		setcookie('num_fallos', $num_fallos, time() + 3600, '/');
		$error = "Contraseña incorrecta segundo intento, al tercero se bloquea";
		setcookie('errorLogin', $error, time() + 3600, '/');
	} else if ($_COOKIE['num_fallos'] == 1 && $_COOKIE['login'] != $user) {
		$num_fallos = 1;
		setcookie('login', $user, time() + 3600, '/');
		setcookie('num_fallos', $num_fallos, time() + 3600, '/');
		$error = "Contraseña incorrecta primer intento, al tercero se bloquea";
		setcookie('errorLogin', $error, time() + 3600, '/');
	} else if ($_COOKIE['num_fallos'] == 2 && $_COOKIE['login'] == $user) {
		setcookie('login', '', time() - 3600, '/');
		setcookie('num_fallos', '', time() - 3600, '/');
		setcookie('errorLogin', '', time() - 3600, '/');
	} else if ($_COOKIE['num_fallos'] == 2 && $_COOKIE['login'] != $user) {
		$num_fallos = 1;
		setcookie('login', $user, time() + 3600, '/');
		setcookie('num_fallos', $num_fallos, time() + 3600, '/');
		$error = "Contraseña incorrecta primer intento, al tercero se bloquea";
		setcookie('errorLogin', $error, time() + 3600, '/');
	}
	deleteCookieUser();
	header("Location: index.php");
}

/**
 * 
 */
function createRandomCodMov()
{
	$codigo = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 4);
	return $codigo;
}

function reservedWords()
{
	$palabras = array(
		"select", "insert", "update", "delete", "drop", "alter", "create", "table", "from", "where",
		"and", "or", "not", "like", "in", "between", "is", "null", "asc", "desc", "into", "values", "set", "show",
		"database", "databases", "use", "grant", "revoke", "index", "primary", "key", "foreign", "references", "on",
		"order", "by", "group", "having", "limit", "union", "all", "distinct", "case", "when", "then", "else", "end",
		"count", "sum", "avg", "min", "max", "top", "union", "all", "distinct", "case", "when", "then", "else", "end",
		"count", "sum", "avg", "min", "max", "top", "truncate", "procedure", "function", "declare", "exec", "xp_cmdshell",
		"sp_", "sysobjects", "syscolumns", "sysusers", "sysindexes", "sysconstraints", "syscomments", "sysdepends",
		"sysfiles", "sysgroups", "sysprocesses", "sysprotects", "sysservers", "sysstatistics", "sysviews", "syssegments",
		"sysalternates", "sysconfigures", "sysdepends", "sysfilegroups", "sysfiles1", "sysfiles2", "sysforeignkeys",
		"sysfulltextcatalogs", "sysfulltextnotify", "sysindexes", "sysindexkeys", "sysmembers", "sysobjects", "syspermissions",
		"sysproperties", "sysreferences", "syssegments", "syssubsystems", "systypes", "sysusers", "sysxmlindexes", "sysxmlnodes",
		"sysxmlschemas", "sysxmltypes", "syscolumns", "syscomments", "sysdepends", "sysfiles", "sysfiles1", "sysfiles2",
		"sysfulltextcatalogs", "sysfulltextnotify", "sysindexes", "sysindexkeys", "sysmembers", "sysobjects", "syspermissions",
		"sysproperties", "sysreferences", "syssegments", "syssubsystems", "systypes", "sysxmlindexes", "sysxmlnodes", "sysxmlschemas",
		"sysxmltypes", "xp_cmdshell", "xp_regread", "xp_regwrite", "xp_fileexist", "xp_dirtree", "xp_filelist", "xp_cmdshell",
		"xp_regread", "xp_regwrite", "xp_fileexist", "xp_dirtree", "xp_filelist", "xp_cmdshell", "xp_regread", "xp_regwrite",
		"xp_fileexist", "xp_dirtree", "xp_filelist", "xp_cmdshell", "xp_regread", "xp_regwrite", "xp_fileexist", "xp_dirtree",
		"xp_filelist", "xp_cmdshell", "xp_regread", "xp_regwrite", "xp_fileexist", "xp_dirtree", "xp_filelist", "xp_cmdshell",
		"xp_regread", "xp_regwrite", "xp_fileexist", "xp_dirtree", "xp_filelist", "xp_cmdshell", "xp_regread", "xp_regwrite",
		"xp_fileexist", "xp_dirtree", "xp_filelist", "xp_cmdshell", "xp_regread", "xp_regwrite", "xp_fileexist", "xp_dirtree",
		"xp_filelist", "xp_cmdshell", "xp_regread", "xp_regwrite", "xp_fileexist", "xp_dirtree", "xp_filelist", "xp_cmdshell",
		"xp_regread", "xp_regwrite", "xp_fileexist", "xp_dirtree", "xp_filelist", "xp_cmdshell", "xp_regread", "xp_regwrite",
		"xp_fileexist", "xp_dirtree", "xp_filelist", "xp_cmdshell", "xp_regread", "xp_regwrite", "xp_fileexist", "xp_dirtree",
		"xp_filelist", "xp_cmdshell", "xp_regread", "xp_regwrite", "xp_fileexist", "xp_dirtree", "xp_filelist", "withdrawal","receipt return");
	return $palabras;
}
