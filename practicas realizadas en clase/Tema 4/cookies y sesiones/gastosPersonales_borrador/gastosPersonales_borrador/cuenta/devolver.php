<?php

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Gestión Personal</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>
	<header>
		<h1>Gestión Personal: Eliminar</h1>
		<div id="name-user-header">
			<i>Bienvenid@</i> <b><?php  ?></b>
		</div>
	</header>
	<nav>
		<span class="dropdown_menu
">
			<a href="./?<?php  ?>">Mi Cuenta</a>
			<div>
				<a href="movimientos.php?<?php  ?>">Ultimos Movimientos</a>
				<a href="ingresar.php?<?php  ?>">Contabilizar un Ingreso</a>
				<a href="pagar.php?<?php  ?>">Contabilizar un Gasto</a>
				<a href="devolver.php?<?php  ?>">Eliminar un movimiento</a>
				<a href="../">Salir</a>
			</div>
		</span>
		&gt; Eliminar un movimiento
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