<?php
include "../inc/header.inc.php";
//Recuperar la sesión
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
    <title>Movements</title>
</head>
<?php
$login = $_SESSION['user'];
$table = getMovimientos($login);
$reservedWords = reservedWords();

if ($table) {
    $numMovimientos = count($table);
} else {
    $message = "<div class='mens_error'>There are no movements</b></div>";
    setcookie("movement_mens", $message, time() + 3600, "/");
    $numMovimientos = 0;
}

$actualBudget = returnBudget();
$tempBudget = 0;

if (isset($_POST['cancel'])) {
    header("Location: index.php");
}
?>

<body>
    <header>
        <h1>Last movements</h1>
    </header>
    <nav>
        <span class="dropdown_menu">
            <a href="./?">My account</a>
            <div>
                <a href="movements.php">Last movements</a>
                <a href="deposit.php">Make a deposit</a>
                <a href="expense.php">Record an Expense</a>
                <a href="return.php">Return a movement</a>
                <a href="../logOut.php">Exit</a>
            </div>
        </span>
        &gt; Latest movements
    </nav>
    <div id="name-user-header">
        <i>Welcome</i> <b><?php echo $_SESSION['user']; ?></b>
        <i><br>Login</i> <b><?php echo $_SESSION['hour']; ?></b>
    </div>
    <main>
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
                foreach ($table as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['codigoMov'] . "</td>";
                    echo "<td>" . $row['fecha'] . "</td>";
                    echo "<td>" . $row['concepto'] . "</td>";
                    if (in_array($row['concepto'], $reservedWords)) {
                        $tempBudget = $actualBudget;
                    }
                     else {
                        $tempBudget += $row['cantidad'];
                    }
                    echo "<td>" . $row['cantidad'] . "</td>";
                    if($row['concepto'] == "Open account" && $row['cantidad'] == 0){
                        echo "<td>" . 0 . "</td>";
                    }
                    else{
                        echo "<td>" . $tempBudget . "</td>";
                    }
                    
                    echo "</tr>";
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Nº Mov</th>
                    <th><?php echo $numMovimientos ?></th>
                    <th colspan="2">Current balance:</th>
                    <th><?php echo $actualBudget ?></th>
                </tr>
            </tfoot>
        </table>
        <?php if (isset($_COOKIE['movement_mens'])) {
            echo $_COOKIE['movement_mens'];
            setcookie("movement_mens", "", time() - 3600, "/");
        }
        ?>
        <form method="post" class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="submit" name='cancel' id='cancel' value="Return to menu">
        </form>
    </main>
</body>

</html>