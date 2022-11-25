<?php
session_start();
session_destroy();
//destroy cookies and session
if(isset($_COOKIE['admin'])){
    unset($_COOKIE['admin']);
    setcookie('admin', '', time() - 3600, '/');
}
if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])){
    unset($_COOKIE['user']);
    unset($_COOKIE['pass']);
    setcookie('user', '', time() - 3600, '/');
    setcookie('pass', '', time() - 3600, '/');
}

header('Location: ../index.php');

?>