<?php
include "../inc/header.inc.php";
//Recuperar la sesión
session_start();

if (isset($_COOKIE['admin'])) {
    checkSessionUser();
} else {
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
    </header>
    <nav>Admin Panel</nav>
    <div id="name-user-header">
        <i>Welcome</i> <b><?php echo $_SESSION['user']; ?></b>
    </div>
    <main>
        <div id="menu">
            <a href="new_user.php">New user</a>
            <a href="modify_user.php">Modify user</a>
            <a href="delete_user.php">Delete user</a>
            <a href="../logOut.php">Exit</a>
        </div>
    </main>
</body>

</html>