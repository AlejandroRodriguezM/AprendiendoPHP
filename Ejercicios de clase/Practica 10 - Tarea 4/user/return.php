<?php
include "../inc/header.inc.php";
//Recuperar la sesión
session_start();

//comprobamos que el usuario existe
if (!isset($_SESSION['usuario'])) {
    die("Error - You have to <a href='../index.php'>Log in</a>");
}
if (isset($_COOKIE['user']) and isset($_COOKIE['pass'])) {
    $user = $_COOKIE['user'];
    $pass = $_COOKIE['pass'];
    protectAcces($user, $pass);
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
    <title>Returns</title>
</head>
<?php
$login = $_SESSION['usuario'];
$tabla = getMovimientos($login);
$reservedWords = reservedWords();
if ($tabla) {
    $numMovimientos = count($tabla);
} else {
    $message = "There are no movements";
}

if (isset($_POST['return'])) {
    $codigoMov = $_POST['codMov'];
    $concepto = $_POST['concepto'];
    $cantidad = $_POST['cantidad'];
    $codigo = createRandomUserCodeMove();
    $mov = array(
        "codigoMov" => $codigoMov,
        "loginUsu" => $login,
        "fecha" => date("Y-m-d"),
        "concepto" => $concepto,
        "cantidad" => $cantidad
    );
    if (!devolverRecibo($codigoMov)) {
        createReturnReceipt($mov);
        $message = "Receipt returned successfully";
    } else {
        $message = "Error returning receipt";
    }

    setcookie("return_mens", $message, time() + 3600, "/");
    header("Location: return.php");
}

if (isset($_POST['returnInvalid'])) {
    $message = "Invalid receipt. You can`t return this receipt";
    setcookie("return_mens", $message, time() + 3600, "/");
    header("Location: return.php");
}


if (isset($_POST['cancel'])) {
    header("Location: index.php");
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
                <a href="expense.php?<?php  ?>">Record an Expense</a>
                <a href="return.php?<?php  ?>">Return a movement</a>
                <a href="../logOut.php/<?php  ?>">Exit</a>
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
                        <td><?php
                            if (in_array($fila['concepto'], $reservedWords)) {
                                echo "<b style='color:red';>" . $fila['concepto'] . "</b>";
                            } else {
                                echo $fila['concepto'];
                            }
                            ?></td>
                        <td><?php echo $fila['cantidad'] ?></td>
                        <form method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <?php
                            if (in_array($fila['concepto'], $reservedWords) || $fila['cantidad'] == 0) {
                                echo "<td><input type='submit' name='returnInvalid' value='Return'></td>";
                            } else {
                            ?>
                                <td><input type='submit' name='return' value='Return'></td>
                                <td style='border:0;'><input type='hidden' name='codMov' value='<?php echo $fila['codigoMov'] ?>'></td>
                                <td style='border:0;'><input type='hidden' name='concepto' value='<?php echo $fila['concepto'] ?>'></td>
                                <td style='border:0;'><input type='hidden' name='cantidad' value='<?php echo $fila['cantidad'] ?>'></td>
                            <?php
                            }
                            ?>
                        </form>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <tfoot>
            </tfoot>
        </table>
        <?php if (isset($_COOKIE['return_mens'])) {
            echo "<b>" . $_COOKIE['return_mens'] . "</b><br>";
            setcookie("return_mens", "", time() - 3600, "/");
        }
        ?>
    </main>
    <form method="post" class="formulario" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);  ?>">
        <input type="submit" name='cancel' id='cancel' value="Return to menu">
    </form>
</body>

</html>