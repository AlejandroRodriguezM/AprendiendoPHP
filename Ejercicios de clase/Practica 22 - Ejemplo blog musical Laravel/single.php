<?php 
	include 'header.php';
	include 'includes/config.php';
	$id = $_GET['id'];
	$sql = sprintf("SELECT * FROM articulos WHERE id = '$id' LIMIT 1");
	$res = mysqli_query($conn,$sql);
	if (!$res) die('Invalid query: ' . mysql_error());

	$sql2 = sprintf("SELECT articulo,nombre,comentario FROM comentarios WHERE articulo = '$id' order by id");
	$res2 = mysqli_query($conn,$sql2);
	if (!$res2) die('Invalid query: ' . mysql_error());

	$sql3 = sprintf("SELECT count(*) as numero FROM comentarios where articulo=$id");
	$res3 = mysqli_query($conn,$sql3);
	if (!$res3) die('Invalid query: ' . mysql_error());
	$post3=mysqli_fetch_array($res3);

?>

<section class="main container">
		<div class="row">
			<section class="posts col-md-9">
				<div>
					<ol class="breadcrumb">
					  <li><a href="index.php">Home</a></li>
					  <li class="active">Detalle</li>
					</ol>
				</div>
				<?php while ($post = mysqli_fetch_array($res)) {?>
				<article class="post clearfix">
					<a href="" class="thumb pull-left">
						<img class="thumbnail" src="<?php echo $post['imagen'] ?>" alt="Imagen 1">
					</a>
					<h2 class="post-title">
						<a href="#"><?php echo $post['titulo'] ?></a>
					</h2>
						<p> <span class="post-fecha"><?php echo $post['fecha'] ?></span> por <span class="post-autor">
							<a href="#"><?php echo $post['autor'] ?></a></span></p>
						<p class="contenido text-justify"><?php echo $post['contenido'] ?></p>
						
						<div clas="contenedor-botones">
							<a href="index.php" class="btn btn-primary">Volver</a>
							<a href="" class="btn btn-success">Comentarios <span class="badge"><?php echo $post3['numero'] ?></span></a>
						</div>
				</article>
				<?php }?>
				<h3>Comentarios</h3>
				<?php while ($post2 = mysqli_fetch_array($res2)) {?>
				<article class="post clearfix">
					<h4><?php echo $post2['nombre'] ?> ha dicho: </h4>
					<p class="text-justify">"<?php echo $post2['comentario'] ?>"</p>
				</article>
				<?php }?>
				<h2>Deja un comentario</h2> 
				<form action="add_comentario.php" method="POST" class="">
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input class="form-control" id="nombre" name="nombre" type="text" placeholder="Tu nombre:">
						<input type="hidden" name="articulo" value="<?php echo $id;?>"><br>
					</div>
					<label for="comentario">Comentario</label>
					<textarea rows="5" class="form-control" name="comentario" id="comentario" placeholder="Máx 250 caracteres:"></textarea><br>
					<input type="submit" name="ok" class="btn btn-success" value="Publicar Comentario">
				</form><br>	
				</section>
				<?php include 'aside.php' ?>
		</div>
	</section>

	<?php include 'footer.php' ?>