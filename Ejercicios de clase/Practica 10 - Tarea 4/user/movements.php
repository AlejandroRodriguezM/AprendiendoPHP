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
$tabla = getMovimientos(true);
if ($tabla) {
    $numMovimientos = count($tabla);
}
?>

<body>
    <header>
        <h1>Last movements</h1>
        <div id="nombre-usuario-cabecera">
        </div>
    </header>
    <nav>
	<span class="desplegable">
            <a href="./?<?php  ?>">My account</a>
            <div>
                <a href="movements.php?<?php  ?>">Latest movements</a>
                <a href="deposit.php?<?php  ?>">Make a deposit</a>
                <a href="pay.php?<?php  ?>">Record an Expense</a>
                <a href="return.php?<?php  ?>">Return a movement</a>
                <a href="../">Exit</a>
            </div>
        </span>
        &gt; Latest movements
    </nav>
    <i>Welcome</i> <b><?php echo $_SESSION['usuario']; ?></b>
    <main>
        <?php

        ?>
        <table class="tabla">
            <thead>
                <tr>
                    <th>CodMov</th>
                    <th>Date</th>
                    <th>Concept</th>
                    <th>Quantity</th>
                    <th>Countable balance</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($tabla as $fila) {
                    echo "<tr>";
                    echo "<td>" . $fila['codigoMov'] . "</td>";
                    echo "<td>" . $fila['fecha'] . "</td>";
                    echo "<td>" . $fila['concepto'] . "</td>";
                    echo "<td>" . $fila['cantidad'] . "</td>";
                    echo "<td>" . '?¿?¿?' . "</td>";
                    // echo "<td>" . $fila['saldo'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Nº Mov</th>
                    <th><?php echo $numMovimientos ?></th>
                    <th colspan="2">Current balance:</th>
                    <th><?php ?></th>
                </tr>
            </tfoot>
        </table>
        <?php  ?>
    </main>
</body>

</html>