<?php
require_once("../inc/header.inc.php");
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Actualizar CRUD JSON</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
	<?php
	$edit_id = $_GET['edit_id'];
	if (isset($_SESSION['nom_tabla'])) {
		$table_name = $_SESSION['nom_tabla'];
		if ($table_name == "tb_amigos") {
			$filename = "../tb_amigos.json";
			$data = file_get_contents($filename);
			$data = json_decode($data, true);
			$row = $data[$edit_id];

			if (isset($_POST['btnUpdate'])) {
				if (!empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['url']) && !empty($_POST['sexo'])
				&& !empty($_POST['convivientes']) && !empty($_POST['favorito'])) {
					$update_arr = array(
						'nombre' => $fila['nombre'],
						'email' => $fila['email'],
						'url' => $fila['url'],
						'sexo' => $fila['sexo'],
						'conviviente' => $fila['convivientes'],
						'favoritos' => $fila['favorito']
					);
					$data[$edit_id] = $update_arr;
					$data = json_encode($data, JSON_PRETTY_PRINT);
					file_put_contents($filename, $data);
				}

				header("Location:index.php");
			}
		}
	}


	?>
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2>Modificar Miembros</h2>
			</div>
			<form method="post" name="frmAdd">
				<div class="panel-body">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Identificador</th>
								<th>Nombre</th>
								<th>Email</th>
								<th>Telefono</th>
								<th>Creado</th>
								<th>Estado</th>
							</tr>
						</thead>
						<tbody>
						<tr>
								<td><input type="text" name="nombreAmigo" value="<?php echo $row['nombre'] ?>" readonly> </td>
								<td><input type="text" name="email" value="<?php echo $row['email'] ?>"> </td>
								<td><input type="text" name="url" value="<?php echo $row['url'] ?>" readonly> </td>
								<td><input type="text" name="sexo" value="<?php echo $row['sexo'] ?>"> </td>
								<td><input type="text" name="convivientes" value="<?php echo $row['conviviente'] ?>" readonly> </td>
								<td><input type="text" name="favorito" value="<?php echo $row['favoritos'] ?>"> </td>

							</tr>
							<tr>
								<td colspan="5"></td>
								<td><input type="submit" value="Actualizar" name="btnUpdate"> </td>
							</tr>
						</tbody>
					</table>
				</div>



			</form>
		</div>
	</div>


</body>

</html>