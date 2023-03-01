<?php 
	include 'includes/config.php';
	$sql = sprintf("SELECT * FROM articulos ORDER BY fecha DESC");
		$res = mysqli_query($conn,$sql);
	if (!$res) die('Invalid query: ' . mysql_error());
?>

<aside class="col-md-3 hidden-xs hidden-sm">
				<!-- <h4>Categorías</h4>
				<div class="list-group">
					
					<a href="" class="list-group-item ">Biografía</a>
					<a href="" class="list-group-item ">Lyrics</a>
					<a href="" class="list-group-item ">Videos</a>
					<a href="" class="list-group-item ">Anécdotas</a>
				</div> -->
				<h4><span class="label label-primary">Artículos Recientes</span></h4>
				<?php for ($i = 1; $i <=3; $i++){ $post = mysqli_fetch_array($res)?>
				<a href="single.php?id=<?php echo $post['id'] ?>" class="list-group-item ">
					<h4 class="list-group-item-heading"><?php echo $post['titulo'] ?></h4>
					<p class="list-group-item-text"><?php echo substr($post['contenido'],0,50)."..." ?></p>
					<p> <span class="post-fecha"><?php echo $post['fecha'] ?></span></p>
				</a>
				<?php }?>
				<!-- <a href="" class="list-group-item">
					<h4 class="list-group-item-heading">Segundo Post Publicado</h4>
					<p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				</a>
				<a href="" class="list-group-item">
					<h4 class="list-group-item-heading">Tercer Post Publicado</h4>
					<p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				</a> -->
			</aside>