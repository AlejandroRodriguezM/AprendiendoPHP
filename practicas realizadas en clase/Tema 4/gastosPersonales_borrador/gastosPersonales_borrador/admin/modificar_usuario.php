<?php

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Modificar Usuarios</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body id="pagina-login">
	<header><h1>Modificar usuarios</h1></header>
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
		&gt; Modificar Usuario
	</nav>
	<main>
		<fieldset class="mini-formulario"><legend>Modificar Datos Usuario</legend>
			<?php
			if (!empty($error)) {echo "<div class='error'><b>!</b>$error</div>";}
			if (!empty($correcto)) {echo "<div class='correcto'><b>!</b>$correcto</div>";}
			?>
			<form method="post" action="?<?php  ?>">
				<label>Selecciona Usuario</label>
				<select name="select_login" required>
					<option></option>
					<?php
					
					?>
				</select>
				<input type="submit" value="Cargar Datos del Usuario">
			</form>
			<hr>
			<?php
			 ?>
			<form method="post" action="?<?php  ?>">
				<div class="input-labeled">
					<label>Login:</label>
					<input type="text" name="modUser[login]" required maxlength="10" readonly value="<?php  ?>">
				</div>
				<div class="input-labeled">
					<label>Clave:</label>
					<input type="password" name="modUser[password]" placeholder="**********" maxlength="20" value="<?php  ?>">
				</div>
				<div class="input-labeled">
					<label>Repite Clave:</label>
					<input type="password" name="modUser[repassword]" placeholder="**********" maxlength="20" value="<?php  ?>">
				</div>
				<div class="input-labeled">
					<label>Nombre:</label>
					<input type="text" name="modUser[nombre]" required maxlength="30" value="<?php  ?>">
				</div>
				<div class="input-labeled">
					<label>Fecha Nacimiento:</label>
					<input type="date" name="modUser[fNacimiento]" placeholder="aaaa-mm-dd" required maxlength="10" value="<?php  ?>">
				</div>
				<input type="submit" name="form_mod_user" value="Guardar">
			</form>
			<?php  ?>
		</fieldset>
	</main>
</body>
</html>