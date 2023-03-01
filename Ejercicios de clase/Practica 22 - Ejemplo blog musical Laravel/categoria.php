<?php 
	include 'header.php';
	include 'includes/config.php';
		$id = $_GET['id'];
	 	$sql = sprintf("SELECT * FROM articulos where categoria=$id");
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
						
						<div class="contenedor-botones">
							<a href="single.php?id=<?php echo $post['id'] ?>" class="btn btn-primary">Leer Más</a>
							<a href="" class="btn btn-success">Comentarios <span class="badge">20</span></a>
						</div>
				</article>
				<?php } ?>


				 <!-- Start Paginación  -->
				<nav>
					<div class="center-block">
					  <ul class="pagination">
					    <li>
					      <a href="#" aria-label="Anterior">
					        <span aria-hidden="true">&laquo;</span>
					      </a>
					    </li>
					    <li><a href="#">1</a></li>
					    <li><a href="#">2</a></li>
					    <li><a href="#">3</a></li>
					    <li><a href="#">4</a></li>
					    <li><a href="#">5</a></li>
					    <li>
					      <a href="#" aria-label="Siguiente">
					        <span aria-hidden="true">&raquo;</span>
					      </a>
					    </li>
					  </ul>
				  	</div>
				</nav> <!-- End Paginación  -->
			</section>
			<?php include 'aside.php' ?>
		</div>
	</section>

	<?php include 'footer.php' ?>