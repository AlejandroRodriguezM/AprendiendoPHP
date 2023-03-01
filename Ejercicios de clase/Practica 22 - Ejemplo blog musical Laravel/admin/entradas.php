<?php include 'header_admin.php' ?>

<?php 
@$post = $_GET['id'];
include '../includes/config.php';
$res['categoria']="";
$cat = sprintf("SELECT * FROM categorias WHERE 1");
$c = mysqli_query($conn,$cat);
if ($post > 0) {
	$sql = sprintf("SELECT * FROM articulos WHERE id = '$post'");
	$res = mysqli_query($conn,$sql);
	if (!$res) die('Invalid query: ' . mysql_error());
	$res = mysqli_fetch_array($res);
	
} 
?>

<section class="container">
	<div class="container">
		<h2>Escribir un artículo</h2> 
		<form action="insertar.php" method="POST" class="">
			<div class="form-group">
				<label for="titulo">Título</label>
				<input class="form-control" id="titulo" name="titulo" type="text" placeholder="Título:">
			</div>
			<div class="form-group">
				<label for"categoria">Elige una categoría</label>
				<select class="form-control" name="categoria" id="categoria">
					<?php while ($r = mysqli_fetch_array($c)) { ?>
					<option <?php if($res['categoria'] == $r['id']) echo 'selected = "selected"' ?>name="categoria" value="<?php echo $r['id'] ?>">
					<?php echo addslashes($r['categoria'])?>
					</option>			
					<?php } ?>
				</select>
			</div>
			
			<label for="contenido">Contenido:</label>
			<textarea rows="25" class="form-control" name="contenido" id="contenido" placeholder="Escribe tu entrada:"></textarea>

			<label for="imagen">Introduce una URL de imagen:</label>
			<input type="text" class="form-control" name="imagen" id="imagen" placeholder="URL de la imagen"><br>
			<input type="submit" name="ok" class="btn btn-success" value="Publicar / Actualizar">
		</form><br>
			<a class="btn btn-danger" href="index.php">Volver a entradas</a>
	</div>
</section>


<?php include 'footer_admin.php' ?>