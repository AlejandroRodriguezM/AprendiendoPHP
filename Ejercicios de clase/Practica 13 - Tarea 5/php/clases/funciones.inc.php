<?php

/**
 * Función que establece una cookie para el usuario que ha iniciado sesión
 *
 * @param string $login  nombre de usuario
 *
 */
function cookiesUser($login)
{
    setcookie('loginUser', $login, time() + 3600, '/'); // establece una cookie llamada 'loginUser' con el valor de $login y un tiempo de expiración de 1 hora y ruta '/'
}

/**
 * Función que establece una cookie para el usuario administrador
 *
 * @param string $login  nombre de usuario
 *
 */
function cookiesAdmin($login)
{
    setcookie('adminUser', $login, time() + 3600, '/'); // establece una cookie llamada 'adminUser' con el valor de $login y un tiempo de expiración de 1 hora y ruta '/'
}

/**
 * Función que destruye todas las cookies para el usuario
 *
 */
function destroyCookiesUser()
{
    setcookie('loginUser', '', time() - 3600, '/'); // destruye la cookie 'loginUser'
    setcookie('adminUser', '', time() - 3600, '/'); // destruye la cookie 'adminUser'
    setcookie('color', '', time() - 3600, '/'); // destruye la cookie 'color'
}

/**
 * Función que elimina las cookies de error de inicio de sesión
 *
 */
function deleteCookieLoginError()
{
    setcookie('errorLogin', '', time() - 3600, '/'); // destruye la cookie 'errorLogin'
    setcookie('errorAdmin', '', time() - 3600, '/'); // destruye la cookie 'errorAdmin'
    setcookie('errorUser', '', time() - 3600, '/'); // destruye la cookie 'errorUser'
    setcookie('num_fallos', '', time() - 3600, '/'); // destruye la cookie 'num_fallos'
    setcookie('login', '', time() - 3600, '/'); // destruye la cookie 'login'
}

/**
 * Función que verifica si el usuario ha iniciado sesión
 *
 */
function check_cookies()
{
    if (!isset($_SESSION['login']) && !isset($_COOKIE['loginUser'])) {
        session_destroy(); // destruye la sesión
        die("Error. No ha iniciado sesión. Contacte al administrador si tiene más problemas <a href='logOut.php'>Inicie sesión</a>"); // muestra un mensaje de error y un enlace para iniciar sesión
    }
}

/**
 * Función que verifica si la contraseña y la confirmación de contraseña coinciden
 *
 * @param string $password
 * @param string $repassword
 * @return bool
 */
function checkPassword($password, $repassword)
{
    $existe = false;
    if ($password == $repassword) {
        $existe = true;
    }
    return $existe;
}

/**
 * Función que devuelve mensajes de error al iniciar sesión
 *
 * @param [type] $user
 * @return void
 */
function errorSesion($user)
{
    $db = new ClaseDb();
    if (!$db->check_nombreUser($user)) {
        if (!isset($_COOKIE['login'])) {
            $error = "<p class='error' style='font-weight:bold;color:red;font-size: 15px;'>El usuario no existe 1º Intento</p>";
            $num_errors = 1;
            setcookie('login', $user, time() + 3600, '/');
            setcookie('errorLogin', $error, time() + 3600, '/');
            setcookie('num_fallos', $num_errors, time() + 3600, '/');
            header("Location: index.php");
        } elseif ($_COOKIE['num_fallos'] == 1) {
            $error = "<p class='error' style='font-weight:bold;color:red;font-size: 15px;'>El usuario no existe 2º Intento</p>";
            $num_errors = 2;
            setcookie('login', $user, time() + 3600, '/');
            setcookie('errorLogin', $error, time() + 3600, '/');
            setcookie('num_fallos', $num_errors, time() + 3600, '/');
            header("Location: index.php");
        } elseif ($_COOKIE['num_fallos'] == 2) {
            $error = "<p class='error' style='font-weight:bold;color:red;font-size: 15px;'>El usuario no existe 3º Intento.If you fail, you will have to wait 10 seconds</p>";
            $num_errors = 3;
            setcookie('login', $user, time() + 3600, '/');
            setcookie('errorLogin', $error, time() + 3600, '/');
            setcookie('num_fallos', $num_errors, time() + 3600, '/');
            header("Location: index.php");
        } elseif ($_COOKIE['num_fallos'] == 3) {
            header("Location: errorLog.php");
        }
    } else {
        if (!isset($_COOKIE['login'])) {
            $error = "<p class='error' style='font-weight:bold;color:red;font-size: 15px;'>Contraseña incorrecta 1º Intento.</p>";
            $num_errors = 1;
            setcookie('login', $user, time() + 3600, '/');
            setcookie('errorLogin', $error, time() + 3600, '/');
            setcookie('num_fallos', $num_errors, time() + 3600, '/');
            header("Location: index.php");
        } elseif ($_COOKIE['num_fallos'] == 1) {
            $error = "<p class='error' style='font-weight:bold;color:red;font-size: 15px;'>Contraseña incorrecta 2º Intento.</p>";
            $num_errors = 2;
            setcookie('login', $user, time() + 3600, '/');
            setcookie('errorLogin', $error, time() + 3600, '/');
            setcookie('num_fallos', $num_errors, time() + 3600, '/');
            header("Location: index.php");
        } elseif ($_COOKIE['num_fallos'] == 2) {
            $error = "<p class='error' style='font-weight:bold;color:red;font-size: 15px;'>Contraseña incorrecta 3º Intento .If you fail, you will have to wait 10 seconds</p>";
            $num_errors = 3;
            setcookie('login', $user, time() + 3600, '/');
            setcookie('errorLogin', $error, time() + 3600, '/');
            setcookie('num_fallos', $num_errors, time() + 3600, '/');
            header("Location: index.php");
        } elseif ($_COOKIE['num_fallos'] == 3) {
            header("Location: errorLog.php");
        }
    }
}
