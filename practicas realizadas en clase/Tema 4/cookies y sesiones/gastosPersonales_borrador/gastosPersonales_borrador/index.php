<?php

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Contabilidad Personal</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>

<body id="pagina-login">
	<header>
		<h1>Gastos Personales</h1>
	</header>
	<nav>Contabilidad personal</nav>
	<main>
		<fieldset class="mini-form
">
			<legend>Iniciar Sesión</legend>
			<?php
			if (isset($error)) {
				echo "<div class='error'>$error</div>";
			}
			?>
			<form method="post">
				<div class="input-labeled">
					<label>Usuario:</label>
					<input type="text" name="usuario" required maxlength="10">
				</div>


				<div class="input-labeled">
					<label>Clave:</label>
					<input type="password" name="clave" required maxlength="20">
				</div>
				<input type="submit" name="form_login" value="Gestionar mi cuenta">
				<hr>
				<input type="submit" name="form_admin_login" value="Gestionar Usuarios">
			</form>
		</fieldset>
	</main>
</body>

</html>