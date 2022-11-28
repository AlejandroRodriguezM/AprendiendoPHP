<?php
include "../inc/header.inc.php";
//Recuperar la sesión
session_start();

//comprobamos que el usuario existe
if (!isset($_SESSION['usuario'])) {
    die("Error - You are not an administrator,<a href='../index.php'>Log in as a user</a> ");
}

if (isset($_COOKIE['user']) && isset($_COOKIE['pass']) && isset($_COOKIE['admin'])) {
    $user = $_COOKIE['user'];
    $pass = $_COOKIE['pass'];
    deleteCookieLoginError();
    protectAcces($user,$pass);
}
else{
    deleteCookieLoginError();
	die("Error - You have to <a href='../index.php'>Log in</a>");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <link rel="shortcut icon" href="../img/ico.png">
    <title>Index accounts</title>
</head>

<body>

    <header>
        <h1 id="inicio">Account manage</h1>
        <div id="nombre-usuario-cabecera">
            <i>Welcome</i> <b><?php echo $_SESSION['usuario']; ?></b>
        </div>
    </header>
    <nav>Contabilidad personal</nav>
    <main>
        <div id="menu">
            <a href="new_user.php?<?php  ?>">New user</a>
            <a href="modify_user.php?<?php  ?>">Modify user</a>
            <a href="delete_user.php?<?php  ?>">Delete user</a>
            <a href="../logOut.php/<?php  ?>">Exit</a>
        </div>
    </main>
</body>

</html>