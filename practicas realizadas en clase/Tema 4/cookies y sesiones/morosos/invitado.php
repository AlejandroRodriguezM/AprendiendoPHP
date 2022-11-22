<?php
    include 'funciones.inc.php';
    session_start();
    $_SESSION['hora']=date("H:i",time());
    
       
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 3 : Desarrollo de aplicaciones web con PHP -->
<!-- Tarea 3, Foro: invitado.php -->
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Invitado</title>
  <link href="css/voluntario.css" rel="stylesheet" type="text/css">
</head>

<body>

<div id="contenedor">
  <div id="logotipo">
    <p><a href="invitado.php">Empresa Okupa</a></p>
  </div>
  <div id="menu">
    <ul>
        <li><a href="invitado.php">Listado de anuncios</a></li>
        <li><a href="logoff.php">Salir</a></li>
    </ul>
       <div class="sesion"><p>Hora de conexión: <?php echo $_SESSION['hora'];?></p></div>
       <div class="sesion"><p>Bienvenido <?php echo "Invitado"; ?></p></div>        
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


