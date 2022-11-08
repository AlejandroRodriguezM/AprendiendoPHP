<?php
include 'config/misfunciones.php';
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Cursos</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>

<body>

	<fieldset class="scrollmenu">
		<!--Se utiliza para agrupar, es como un div para agrupar-->
		<a href="principal.php">Inicio</a>
		<a href="insertar.php">Insertar</a>
		<a href="listar.php">Listar</a>
		<a href="borrar.php">Borrar</a>
		<a href="modificar.php">Modificar</a>
	</fieldset>
	<br><br>
	<table class="tabla">
		<thead>
			<tr>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>CodigoCurso</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$base = "colegio";
			$query = "select * from alumnos";
			listarAlumnos($base, $query);

			?>
		</tbody>
	</table>
</body>

</html>