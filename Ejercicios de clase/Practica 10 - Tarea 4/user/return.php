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
    <title>Returns</title>
</head>
<?php
$tabla = getMovimientos(true);
if ($tabla) {
    $numMovimientos = count($tabla);
}
else{
    $mensaje = "No hay movimientos";
}

if (isset($_POST['return'])) {
    $codigoMov = $_POST['codMov'];

    if (!devolverRecibo($codigoMov)) {
        $mensaje = "Movement deleted successfully";
    } else {
        $mensaje = "Error deleting movement";
    }
}
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
            <div>
                <a href="movements.php?<?php  ?>">Latest movements</a>
                <a href="deposit.php?<?php  ?>">Make a deposit</a>
                <a href="pay.php?<?php  ?>">Record an Expense</a>
                <a href="return.php?<?php  ?>">Return a movement</a>
                <a href="../">Exit</a>
            </div>
        </span>
        &gt; Return a movement
    </nav>
    <main>
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
                foreach ($tabla as $fila) {
                ?>
                    <tr>
                        <td><?php echo $fila['fecha'] ?></td>
                        <td><?php echo $fila['concepto'] ?></td>
                        <td><?php echo $fila['cantidad'] ?></td>
                        <form method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <td><input type='submit' name='return' value='Return'></td>
                            <td><input type='hidden' name='codMov' value='<?php echo $fila['codigoMov'] ?>'></td>
                        </form>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th><?php if(!empty($error))echo "<b>$error</b>"  ?></th>
                    <th colspan="3"></th>
                </tr>
            </tfoot>
            
        </table>
        <?php if(!empty($mensaje))echo"<b>$mensaje</b>"  ?>
    </main>
</body>

</html>