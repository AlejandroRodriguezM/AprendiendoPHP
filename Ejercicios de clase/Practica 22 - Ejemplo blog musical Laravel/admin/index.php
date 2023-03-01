<?php 
	 
	

	include '../includes/config.php';
	if (isset($_GET['accion']) && $_GET['accion'] == "eliminar") {
		$id = $_GET['id'];
		$sql = sprintf("DELETE FROM articulos WHERE id = '$id'");
		$del = mysqli_query($conn,$sql);
		if (!$del) die('Invalid query: ' . mysql_error());
		echo  "<script type='text/javascript'>alert('Artículo eliminado correctamente');</script>";
	}
	$sql = sprintf("SELECT id, titulo FROM articulos ORDER BY id DESC");
	$res = mysqli_query($conn,$sql);
	if (!$res) die('Invalid query: ' . mysql_error());
	

?>

	<?php include 'header_admin.php' ?>

	<section> <!-- start div tabla-->
		<div class="container">
			<div class="container">
				<h3> Hola <b><?php echo $_SESSION['usuario'];?></b>, edita, crea o elimina los artículos publicados</h3>
				<a  class="btn btn-primary" href="entradas.php">Crear artículo nuevo</a>
			</div><br>
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover">
					<thead id="cabeza">
						<tr>
							<th>Título</th>
							<th>Modificar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($post = mysqli_fetch_array($res)) { ?>
						<tr>
							<td class="titulo"><a href="modificar.php?id=<?php echo $post['id'] ?>"><?php echo $post['titulo'] ?></a></td>
							<td><a href="modificar.php?id=<?php echo $post['id'] ?>"><img src="../img/editar.png"></a></td>
							<td><a href="index.php?accion=eliminar&id=<?php echo $post['id'] ?>"><img src="../img/eliminar.png"></a></td>
						</tr>
						<?php } ?> 
					</tbody>
				</table>
			</div><!-- end div tabla-->
		</div>
	</section>

	<?php include 'footer_admin.php' ?>
