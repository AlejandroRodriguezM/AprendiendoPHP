<?php

function cookiesUser($login)
{
    setcookie('loginUser', $login, time() + 3600, '/');
}

function cookiesAdmin($login)
{
    setcookie('adminUser', $login, time() + 3600, '/');
}

function destroyCookiesUser()
{
    setcookie('loginUser', '', time() - 3600, '/');
    setcookie('adminUser', '', time() - 3600, '/');
    setcookie('color', '', time() - 3600, '/');
}

/**
 * Function that clears session error cookies
 *
 * @return void
 */
function deleteCookieLoginError()
{
    setcookie('errorLogin', '', time() - 3600, '/');
    setcookie('errorAdmin', '', time() - 3600, '/');
    setcookie('errorUser', '', time() - 3600, '/');
    setcookie('num_fallos', '', time() - 3600, '/');
    setcookie('login', '', time() - 3600, '/');
}

function check_cookies()
{
    if (!isset($_SESSION['login']) && !isset($_COOKIE['loginUser'])) {
        session_destroy();
        die("Error. You are not logged. Talk to the administrator if you have more problems <a href='logOut.php'>Log in</a>");
    }
}

function checkPassword($password, $repassword)
{
    $existe = false;
    if ($password == $repassword) {
        $existe = true;
    }
    return $existe;
}
