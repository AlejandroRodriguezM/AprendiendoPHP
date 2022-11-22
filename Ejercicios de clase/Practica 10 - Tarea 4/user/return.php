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
    <title>Movements</title>
</head>
<?php 


?>
<body>
    <header>
        <h1>Returns</h1>
        <div id="nombre-usuario-cabecera">
        </div>
    </header>

    <nav>
        <span class="desplegable">
            <a href="./?<?php  ?>">My account</a>
            <div id="menu">
                <a href="movements.php?<?php  ?>">Last movements</a>
                <a href="deposit.php?<?php  ?>">Post a Revenue</a>
                <a href="pay.php?<?php  ?>">Record an Expense</a>
                <a href="return.php?<?php  ?>">Return a movement</a>
                <a href="../">Exit</a>
            </div>
        </span>
        &gt; Last movements
    </nav>
    <main>
        <?php

        ?>
        <table class="tabla">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Concepto</th>
                    <th>Cantidad</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php

                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th><?php  ?></th>
                    <th colspan="3"></th>
                </tr>
            </tfoot>
        </table>
        <?php  ?>
    </main>
</body>

</html>