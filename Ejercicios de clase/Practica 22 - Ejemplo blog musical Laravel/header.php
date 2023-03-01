<!DOCTYPE html>
<?php
	include 'includes/config.php';
	$sql = sprintf("SELECT * FROM categorias ORDER BY id");
	$res = mysqli_query($conn,$sql);
	if (!$res) die('Invalid query: ' . mysql_error());
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Elsvis Presley</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">

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
			        <li class="active"><a href="index.php">Inicio <span class="sr-only">(actual)</span></a></li>
			        <li class="dropdown">	
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Categorías <span class="caret"></span></a>
			          <ul class="dropdown-menu" role="menu">
			          	<?php while ($post = mysqli_fetch_array($res)) {?>
			            <li><a href="categoria.php?id=<?php echo $post['id'] ?>"><?php echo addslashes($post['categoria']) ?></a></li>
			            <?php } ?>
			          </ul>
			        </li>
			      </ul>
			      <!-- Search -->
			      <form action="search.php" method="POST" class="navbar-form navbar-right" role="search">
			        <div class="form-group">
			          <input type="text" name="busca" class="form-control" placeholder="buscar">
			        </div>
			        <button type="submit" class="btn btn-primary">Buscar</button>
			        <span class"glyphicon glyphicon-search"></span>
			      </form><!-- End Search -->
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-->
			</nav>
  	</header>
  	<section class="jumbotron">
	    	<div class="container">
		    	<h1>Todo sobre Elvis Presley</h1>
				<p>
				La página con toda la información sobre el Rey del Rock & Roll.
				</p>
				
				<br>
			</div>
		</section>