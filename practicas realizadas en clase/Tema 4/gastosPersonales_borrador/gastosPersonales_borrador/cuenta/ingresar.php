<?php

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Ingreso</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>
	<header>
		<h1>Gestion Personal: Ingreso</h1>
		<div id="nombre-usuario-cabecera">
			<i>Bienvenid@</i> <b><?php  ?></b>
		</div>
	</header>
	<nav>
		<span class="desplegable">
			<a href="./?<?php  ?>">Mi Cuenta</a>
			<div>
				<a href="movimientos.php?<?php  ?>">Ultimos Movimientos</a>
				<a href="ingresar.php?<?php  ?>">Contabilizar un ingreso</a>
				<a href="pagar.php?<?php  ?>">Contabilizar un Gasto</a>
				<a href="devolver.php?<?php  ?>">Eliminar un movimiento</a>
				<a href="../">Salir</a>
			</div>
		</span>
		&gt; Contabilizar un ingreso
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
							<input type="submit" name="ingresar" value="Ingresar">
						</td>
					</tr>
				</tbody>
			</table>
		</form>
	</main>
</body>
</html>