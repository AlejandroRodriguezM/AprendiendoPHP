<!DOCTYPE html>
<?php 
	session_start();  
	if (!isset($_SESSION['entrado'])) {header('Location:acceso.php');};
	
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Elsvis Presley</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/estilo.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<header>
  		<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
		  <div class="container">
		    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-ag" aria-expanded="false">
			        <span class="sr-only">Desplegar / Ocultar</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="index.php">Elvis Presley</a>
			    </div>
			    <!-- Empieza Menú -->
			    <div class="collapse navbar-collapse" id="#navegacion-ag">
			      <ul class="nav navbar-nav">
			        <li class="active"><a href="index.php">Entradas </a></li>
			        <li class="active"><a href="entradas.php">Escribir </a></li>
			        <li class="active"><a href="comentarios.php">Comentarios </a></li>
			        <li class="active"><a href="categorias.php">Categorías </a></li>
			      </ul>
			    </div><!-- termina menú -->
			  </div><!-- /.container-->
			</nav>
  	</header>
	    <section class="jumbotron administracion">
	    	<div class="container">
		    	<h1 >ADMINISTRACIÓN</h1>
				<p>
				Página de Administración.
				</p>
				
				<br>
			</div>
		</section>