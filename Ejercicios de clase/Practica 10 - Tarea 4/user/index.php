<?php
include "../inc/header.inc.php";
session_start();

checkSessionUser();
deleteCookieLoginError();

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
        <h1>My account</h1>
    </header>
    <nav>
        <div id="name-user-header">
            <i>Welcome</i> <b><?php echo $_SESSION['user']; ?></b>
            <i><br>Login</i> <b><?php echo $_SESSION['hour']; ?></b>
        </div>
    </nav>
    <main>
        <div id="menu">
            <a href="movements.php">Last movements</a>
            <a href="deposit.php">Make a deposit</a>
            <a href="expense.php">Record an Expense</a>
            <a href="return.php">Return a movement</a>
            <a href="../logOut.php">Exit</a>
        </div>
    </main>
</body>

</html>