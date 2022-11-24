<?php
include "../inc/header.inc.php";
//Recuperar la sesión
session_start();

//comprobamos que el usuario existe
if (!isset($_SESSION['usuario'])) {
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
    <link rel="shortcut icon" href="img/ico.png">
    <title>Index accounts</title>
</head>

<body>
    <header>
        <h1>My account</h1>
        <div id="nombre-usuario-cabecera">
        </div>
    </header>
    <i>Welcome</i> <b><?php echo $_SESSION['usuario']; ?></b>
    <main>
        <div id="menu">
            <a href="movements.php?<?php  ?>">Last movements</a>
            <a href="deposit.php?<?php  ?>">Make a deposit</a>
            <a href="expense.php?<?php  ?>">Record an Expense</a>
            <a href="return.php?<?php  ?>">Return a movement</a>
            <a href="../<?php session_destroy() ?>">Exit</a>
        </div>
    </main>
</body>

</html>