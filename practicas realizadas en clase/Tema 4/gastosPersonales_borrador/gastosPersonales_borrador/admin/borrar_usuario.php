<?php
include "../inc/header.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Borrar Usuarios</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body id="pagina-login">
	<header><h1>Borrar Usuarios</h1></header>
	<nav>
		<span class="desplegable">
			<a href="./?<?php  ?>">Administrar Usuarios</a>
			<div>
				<a href="nuevo_usuario.php?<?php  ?>">Nuevo Usuario</a>
				<a href="nuevo_usuario1.php?<?php  ?>">Nuevo Usuario Precargado 1</a>
				<a href="nuevo_usuario2.php?<?php  ?>">Nuevo Usuario Precargado 2</a>
				<a href="modificar_usuario.php?<?php  ?>">Modificar Usuario</a>
				<a href="borrar_usuario.php?<?php  ?>">Borrar Usuario</a>
				<a href="../">Salir</a>
			</div>
		</span>
		&gt; Borrar Usuario
	</nav>
	<main>
		<fieldset class="mini-formulario"><legend>Borrar Usuario</legend>
			<?php
			if (isset($correcto)) {echo "<div class='correcto'><b>!</b>$correcto</div>";}
			
			
			?>
			<form method="post" action="?<?php  ?>">
				<label>Selecciona Usuario</label>
				<select name="select_login" required>
					<option></option>
					<?php
					
					?>
				</select>
				<input type="submit" value="Borrar">
			</form>
			<?php
			
			?>
			<form method="post" action="?<?php  ?>">
				<p>¿Confirma borrar el siguiente usuario?</p>
				<div class="input-labeled">
					<label>Login:</label>
					<input type="text" readonly name="login" value="<?php  ?>">
				</div>
				<div class="input-labeled">
					<label>Nombre:</label>
					<input type="text" readonly value="<?php  ?>">
				</div>
				<div class="input-labeled">
					<label>Fecha Nacimiento:</label>
					<input type="text" readonly value="<?php   ?>">
				</div>
				<input type="submit" name="confirmaborrar" value="Borrar">
				<input type="submit" value="Cancelar">
			</form>
			<?php
			
			
			if (isset($error)) {echo "<div class='error'><b>!</b>$error</div>";}
			?>
		</fieldset>
	</main>
	<?php ?>
</body>
</html>