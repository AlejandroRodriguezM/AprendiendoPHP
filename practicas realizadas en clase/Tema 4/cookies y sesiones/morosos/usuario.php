<?php
    include 'funciones.inc.php';
    //Recuperar la sesion
    session_start();

    //Comprobamos que el usuario se ha autentificado
    if(!isset($_SESSION['usuario'])){
      die("Error -debe <a href='index.php'>identificarse</a>");
    }

   
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 3 : Desarrollo de aplicaciones web con PHP -->
<!-- Tarea 3, Foro: anunciante.php -->
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Usuarios</title>
  <link href="css/voluntario.css" rel="stylesheet" type="text/css">
  <style>
    body{
      background-color:<?php if(isset($_COOKIE['colorFondo'])) echo $_COOKIE['colorFondo']; ?>;
    }
  </style>
</head>

<body>

<div id="contenedor">
  <div id="logotipo">
    <p><a href="usuario.php">Empresa Okupa</a></p>
  </div>
  <div id="menu">
    <ul>
        <li><a href="anuncio.php">Publicar anuncio</a></li>
        <li><a href="usuario.php">Listado de anuncios</a></li>
        <li><a href="preferencias.php">Preferencias</a></li>
		<?php
			//Si es el usuario dwes aparecerá en el menú Desbloquear
      $autor=$_SESSION['usuario'];
      if($autor=='dwes'){
        echo '<li><a href="desbloquear.php">Desbloquear</a></li>';
      }
		?>
        <li><a href="logoff.php">Salir</a></li>
    </ul>
       <div class="sesion"><p>Hora de conexión: <?php echo $_SESSION['hora'] ?></p></div>
       <div class="sesion"><p>Bienvenido <?php echo $_SESSION['usuario'] ?></p></div>        
  </div>
  <div id="anuncios">
      <?php
       
		    include('escaparate.php');
      ?>
  </div>
  <div id="footer">
  </div>  
</div>
</body>
</html>
