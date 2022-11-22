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

<body>

    <header>
        <h1 id="inicio">Account manage</h1>
    </header>
    <nav>Personal contability</nav>
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
		<form method="post" class="formulario" action="?<?php  ?>">
			<table>
				<tfoot>
					<tr><td colspan="2">
						<?php
						if ( !empty($error) ) {echo '<div class="error"><b>!</b>'.$error.'</div>';}
						?>
					</td></tr>
				</tfoot>
				<tbody>
					<tr>
						<td><label>Fecha:</label></td>
						<td>
							<input type="date" name="movimiento[fecha]" value="<?php  ?>"
								   size="10" placeholder="aaaa-mm-dd" maxlength="10" required>
						</td>
					</tr>
					<tr>
						<td><label>Concepto:</label></td>
						<td>
							<input type="text" name="movimiento[concepto]" value="<?php  ?>"
								   size="20" placeholder="Descripción Movimiento" maxlength="20" required>
						</td>
					</tr>
					<tr>
						<td><label>Cantidad:</label></td>
						<td>
							<input type="number" name="movimiento[cantidad]" value="<?php  ?>" min="0" step="0.01" required>
							<input type="submit" name="pagar" value="Pagar">
						</td>
					</tr>
				</tbody>
			</table>
		</form>
	</main>
</body>

</html>