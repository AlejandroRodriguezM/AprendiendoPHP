<?php
include "../inc/header.inc.php";
session_start();

checkSessionUser();
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
$login = $_SESSION['user'];
$tabla = getMovimientos($login);
$reservedWords = reservedWords();
if ($tabla) {
    $numMovimientos = count($tabla);
} else {
    $message = "<div class='mens_error'>There are no movements</b></div>";
}

if (isset($_POST['return'])) {
    $codigoMov = $_POST['codMov'];
    $concepto = $_POST['concepto'];
    $budget = $_POST['cantidad'];
    $codigo = createRandomUserCodeMove();
    $mov = array(
        "codigoMov" => $codigoMov,
        "loginUsu" => $login,
        "fecha" => date("Y-m-d"),
        "concepto" => $concepto,
        "cantidad" => $budget

    );
    if (!devolverRecibo($codigoMov)) {
        createReturnReceipt($mov);
        $message = "<div class='mens_ok'><b>Receipt returned successfully</b></div>";
    } else {
        $message = "<div class='mens_error'><b>Error returning receipt</b></div>";
    }
    setcookie("return_mens", $message, time() + 3600, "/");
    header("Location: return.php");
}

if (isset($_POST['returnInvalid'])) {
    $message = "<div class='mens_error'><b>Invalid receipt. You can`t return this receipt</b></div>";
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
    </header>

    <nav>
        <span class="dropdown_menu">
            <a href="./">My account</a>
            <div>
                <a href="movements.php">Last movements</a>
                <a href="deposit.php">Make a deposit</a>
                <a href="expense.php">Record an Expense</a>
                <a href="return.php">Return a movement</a>
                <a href="../logOut.php">Exit</a>
            </div>
        </span>
        &gt; Return a movement
    </nav>
    <div id="name-user-header">
        <i>Welcome</i> <b><?php echo $_SESSION['user']; ?></b>
    </div>
    <main>
        <table class="tabla">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Concept</th>
                    <th>Total</th>
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
        <?php
        if (isset($_COOKIE['return_mens'])) {
            echo $_COOKIE['return_mens'];
            setcookie("return_mens", "", time() - 3600, "/");
            // setcookie('return_mens', '', time() - 3600, '/');
        }
        ?>


    </main>
    <form method="post" class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);  ?>">
        <input type="submit" name='cancel' id='cancel' value="Return to menu">
    </form>
    
</body>

</html>