<?php

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Creación de Usuarios</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body id="pagina-login">
	<header><h1>Creación de Usuarios</h1></header>
	<nav>
		<span class="desplegable">
			<a href="./?<?php echo $fakeCookie; ?>">Administrar Usuarios</a>
			<div>
				<a href="nuevo_usuario.php?<?php  ?>">Nuevo Usuario</a>
				<a href="modificar_usuario.php?<?php  ?>">Modificar Usuario</a>
				<a href="borrar_usuario.php?<?php  ?>">Borrar Usuario</a>
				<a href="../">Salir</a>
			</div>
		</span>
		&gt; Nuevo Usuario
	</nav>
	<main>
		<fieldset class="mini-formulario"><legend>Datos Nuevo Usuario</legend>
			<?php
			if (!empty($error)) {echo "<div class='error'><b>!</b>$error</div>";}
			if (!empty($correcto)) {echo "<div class='correcto'><b>!</b>$correcto</div>";}
			?>
			<form method="post" action="?<?php echo $fakeCookie; ?>">
				<div class="input-labeled">
					<label>Login:</label>
					<input type="text" name="newUser[login]" required maxlength="10" value="<?php  ?>">
				</div>
				<div class="input-labeled">
					<label>Clave:</label>
					<input type="password" name="newUser[password]" required maxlength="20" value="<?php  ?>">
				</div>
				<div class="input-labeled">
					<label>Repite Clave:</label>
					<input type="password" name="newUser[repassword]" required maxlength="20" value="<?php  ?>">
				</div>
				<div class="input-labeled">
					<label>Nombre:</label>
					<input type="text" name="newUser[nombre]" required maxlength="30" value="<?php  ?>">
				</div>
				<div class="input-labeled">
					<label>Fecha Nacimiento:</label>
					<input type="date" name="newUser[fNacimiento]" placeholder="aaaa-mm-dd" required maxlength="10" value="<?php  ?>">
				</div>
				<div class="input-labeled">
					<label>Presupuesto:</label>
					<input type="text" name="newUser[presupuesto]" required maxlength="30" value="<?php  ?>">
				</div>
				<input type="submit" name="form_new_user" value="Crear Usuario">
			</form>
		</fieldset>
	</main>
</body>
</html>