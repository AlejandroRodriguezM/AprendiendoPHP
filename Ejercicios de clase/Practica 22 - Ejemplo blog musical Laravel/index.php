	<?php 
	include 'header.php';
	include 'includes/config.php';
	 	$sql = sprintf("SELECT * FROM articulos ORDER BY id DESC");
		$res = mysqli_query($conn,$sql);
	if (!$res) die('Invalid query: ' . mysql_error());
	 ?>
	    
	<section class="main container">
		<div class="row">
			<section class="posts col-md-9">
				<div>
					<ol class="breadcrumb">
					  <li><a href="index.php">Home</a></li>
					  
					</ol>
				</div>
				<?php while ($post = mysqli_fetch_array($res)) {
					$id=$post['id'];
					$sql3 = sprintf("SELECT count(*) as numero FROM comentarios where articulo=$id");
					$res3 = mysqli_query($conn,$sql3);
					if (!$res3) die('Invalid query: ' . mysql_error());
					$post3=mysqli_fetch_array($res3);
					?>
				<article class="post clearfix">
					<a href="" class="thumb pull-left">
						<img class="thumbnail" src="<?php echo $post['imagen'] ?>" alt="Imagen 1">
					</a>
					<h2 class="post-title">
						<a href="single.php?id=<?php echo $post['id'] ?>"><?php echo $post['titulo'] ?></a>
					</h2>
						<p> <span class="post-fecha"><?php echo $post['fecha'] ?></span> por <span class="post-autor">
							<a href="searchnombre.php?id=<?php echo $post['autor'] ?>"><?php echo $post['autor'] ?></a></span></p>
						<p class="contenido text-justify"><?php echo substr($post['contenido'],0,100)."..." ?></p>
						
						<div class="contenedor-botones">
							<a href="single.php?id=<?php echo $post['id'] ?>" class="btn btn-primary">Leer Más</a>
							<a href="single.php?id=<?php echo $post['id'] ?>" class="btn btn-success">Comentarios <span class="badge"><?php echo $post3['numero'] ?></span></a>
						</div>
				</article>
				<?php } ?>
			</section>
			<?php include 'aside.php' ?>
		</div>
	</section>

	<?php include 'footer.php' ?>