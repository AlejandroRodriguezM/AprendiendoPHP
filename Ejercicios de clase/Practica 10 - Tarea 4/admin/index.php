<?php
include "../inc/header.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <link rel="shortcut icon" href="img/ico.png">
    <title>Pagina principal</title>
</head>

<body>

    <header>
        <h1 id="inicio">Gastos personales</h1>
    </header>
    <nav>Contabilidad personal</nav>
    <main>
        <div id="menu">
            <a href="new_user.php?<?php  ?>">New user</a>
            <a href="modify_user.php?<?php  ?>">Modify user</a>
            <a href="delete_user.php?<?php  ?>">Delete user</a>
            <a href="../">Salir</a>
        </div>
    </main>
</body>

</html>