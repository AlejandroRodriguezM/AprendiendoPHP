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
    <title>Deposits</title>
</head>
<?php
if(isset($_POST['deposit'])){
    $cantidad = $_POST['amount'];
    $concepto = $_POST['concept'];
    $fecha = $_POST['date'];
    $usuario = $_SESSION['usuario'];
    $codigo = createRandomUserCodeMove();
    $mov = array(
        "codigoMov" => $codigo,
        "loginUsu" => $usuario,
        "fecha" => $fecha,
        "concepto" => $concepto,
        "cantidad" => $cantidad
    );
    if(!guardarNuevoMovimiento($mov, false)){
        modifyBudgetUser($cantidad,false);
    }
    $mensaje = "Movement saved successfully";
}
?>

<body>
    <header>
        <h1>Deposits</h1>
        <div id="nombre-usuario-cabecera">
            <i>Welcome</i> <b><?php echo $_SESSION['usuario']; ?></b>
        </div>
    </header>
    <nav>
        <span class="desplegable">
            <a href="./?<?php  ?>">My account</a>
            <div>
                <a href="movements.php?<?php  ?>">Last movements</a>
                <a href="deposit.php?<?php  ?>">Make a deposit</a>
                <a href="pay.php?<?php  ?>">Record an Expense</a>
                <a href="return.php?<?php  ?>">Return a movement</a>
                <a href="../">Exit</a>
            </div>
        </span>
        &gt; Make a deposit
    </nav>
    <main>
        <form method="post" class="formulario" action="?<?php  ?>">
            <table>
                <tfoot>
                    <?php
                    if (!empty($mensaje)) {
                        echo "<tr>";
                        echo "<td colspan='2'>";
                        echo '<div><b>!</b>' . $mensaje . '</div>';
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tfoot>
                <tbody>
                    <tr>
                        <td><label>Date:</label></td>
                        <td>
                            <input type="date" name="date" value="<?php  ?>" size="10" placeholder="aaaa-mm-dd" maxlength="10" required>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Concept:</label></td>
                        <td>
                            <input type="text" name="concept" value="<?php  ?>" size="20" placeholder="Description Movement" maxlength="20" required>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Amount:</label></td>
                        <td>
                            <input type="number" name="amount" value="<?php  ?>" min="0" step="0.01" required>
                            <input type="submit" name="deposit" value="Deposit">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </main>
</body>

</html>