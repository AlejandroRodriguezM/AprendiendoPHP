<?php 
	include 'header.php';
	include 'includes/config.php';
		$busca= $_POST['busca'];
	 	$sql = "SELECT * FROM articulos WHERE contenido like '%".$busca."%'";
		$res = mysqli_query($conn,$sql);
	if (!$res) die('Invalid query: ');
	 ?>
	    
	<section class="main container">
		<div class="row">
			<section class="posts col-md-9">
				<div>
					<ol class="breadcrumb">
					  <li><a href="index.php">Home</a></li>
					  <li class="active">Resultados búsqueda</li>
					</ol>
				</div>
				<?php while ($post = mysqli_fetch_array($res)) {?>
				<article class="post clearfix">
					<a href="" class="thumb pull-left">
						<img class="thumbnail" src="<?php echo $post['imagen'] ?>" alt="Imagen 1">
					</a>
					<h2 class="post-title">
						<a href="single.php?id=<?php echo $post['id'] ?>"><?php echo $post['titulo'] ?></a>
					</h2>
						<p> <span class="post-fecha"><?php echo $post['fecha'] ?></span> por <span class="post-autor">
							<a href="#"><?php echo $post['autor'] ?></a></span></p>
						<p class="contenido text-justify"><?php echo substr($post['contenido'],0,100)."..." ?></p>
						
				</article>
				<?php } //if (is_null($post)) echo '<div class="alert alert-danger" role="alert"> <a href="index.php" 
				//class="alert-link">Oh oh! No se ha encontrado ningún artículo con esa palabra</a></div>'?>

			</section>
			<?php include 'aside.php' ?>
		</div>
	</section>

	<?php include 'footer.php' ?>