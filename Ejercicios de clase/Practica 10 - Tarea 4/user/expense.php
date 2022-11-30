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
	<title>Expense</title>
</head>
<?php
if (isset($_POST['payment'])) {
	$reservedWords = reservedWords();
	$concepto = $_POST['concept'];
	if (in_array($concepto, $reservedWords) || $concepto == "Open account") {
		$message = "<div class='mens_error'><b>Error - You can't use reserved words</b></div>";
	} else {
		$budgetUser = returnBudget();
		$budget = $_POST['amount'];
		$date = $_POST['date'];
		$user = $_SESSION['user'];
		$moveCode = createRandomUserCodeMove();
		$mov = array(
			"codigoMov" => $moveCode,
			"loginUsu" => $user,
			"fecha" => $date,
			"concepto" => $concepto,
			"cantidad" => $budget
		);
		if (($budgetUser - $budget) <= 0) {
			$message = "<div class='mens_error'><b>You don't have enough money to make this payment</b></div>";
		} elseif ($budget <= 0) {
			$message = "<div class='mens_error'><b>You can't expense a negative amount</b></div>";
		} else {
			if (!saveNewMovement($mov, true)) {
				modifyBudgetUser($budget, true);
				$message = "<div class='mens_ok'><b>Expense saved successfully</b></div>";
			}
		}
		setcookie("expense_mess", $message, time() + 3600, "/");
		header("Location: expense.php");
	}
}

if (isset($_POST['cancel'])) {
	header("Location: index.php");
}
?>

<body>
	<header>
		<h1>Pay</h1>
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
		&gt; Record an Expense
	</nav>
	<div id="name-user-header">
		<i>Welcome </i><b><?php echo $_SESSION['user']; ?></b>
		<i><br>Login</i> <b><?php echo $_SESSION['hour']; ?></b>
	</div>
	<main>
		<form method="post" class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);  ?>">
			<table>
				<tfoot>
					<?php
					if (isset($_COOKIE['expense_mess'])) {
						echo "<tr>";
						echo "<td colspan='2'>";
						echo $_COOKIE['expense_mess'];
						echo "</td>";
						echo "</tr>";
						setcookie("expense_mess", "", time() - 3600, "/");
					}
					?>
				</tfoot>
				<tbody>
					<tr>
						<td><label>Date:</label></td>
						<td>
							<input type="date" name="date" style="float: left;" size="10" placeholder="aaaa-mm-dd" value="" min="<?php echo date("Y-m-d");  ?>" max="" required>

						</td>
					</tr>
					<tr>
						<td><label>Concept:</label></td>
						<td>
							<input type="text" name="concept" style="float: left;" size="20" placeholder="Description Movement" maxlength="20" required>
						</td>
					</tr>
					<tr>
						<td><label>Amount:</label></td>
						<td>
							<input type="number" name="amount" value="" min="0" step="0.01" required>
							<input type="submit" name="payment" value="Payment">
						</td>
					</tr>
				</tbody>
			</table>
		</form>
		<form method="post" class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);  ?>">
			<input type="submit" name='cancel' id='cancel' value="Return to menu">
		</form>
	</main>
</body>
</html>