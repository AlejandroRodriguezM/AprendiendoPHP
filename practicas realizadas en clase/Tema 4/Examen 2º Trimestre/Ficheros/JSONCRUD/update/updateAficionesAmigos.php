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
		if ($table_name == "aficionesamigos") {
			$filename = "../aficionesamigos.json";
			$data = file_get_contents($filename);
			$data = json_decode($data, true);
			$row = $data[$edit_id];

			if (isset($_POST['btnUpdate'])) {
				if (!empty($_POST['nombre']) && !empty($_POST['aficion'])) {
					$update_arr = array(
						'nombre' => $fila['nombre'],
						'email' => $fila['aficion'],
					);
					$data[$edit_id] = $update_arr;
					$data = json_encode($data, JSON_PRETTY_PRINT);
					file_put_contents($filename, $data);
				}
				header("Location:../index.php");
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
								<th>Nombre Amigo</th>
								<th>aficion</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><input type="text" name="nombre" value="<?php echo $row['nombre'] ?>" readonly> </td>
								<td><input type="text" name="aficion" value="<?php echo $row['aficion'] ?>"> </td>

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