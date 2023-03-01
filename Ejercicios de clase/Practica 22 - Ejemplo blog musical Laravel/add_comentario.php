<?php
include 'includes/config.php';
	$nombre=$_POST['nombre'];
	
	$articulo=$_POST['articulo'];
	
	$comentario=$_POST['comentario'];
	
	      $sql = sprintf("INSERT INTO comentarios (articulo, nombre, comentario) 
	              VALUES ('$articulo','$nombre', '$comentario')");
	      $res = mysqli_query($conn,$sql);
	        if (!$res) die('Consulta errónea: ' .mysql_error());
	        $new_id = mysqli_insert_id($conn);
	        if ($new_id) echo "<script type='text/javascript'>alert('Comentario publicado correctamente');</script>"; 
	        header('location:index.php');

?>