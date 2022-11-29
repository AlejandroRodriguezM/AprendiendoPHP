
<?php
    include 'funciones.inc.php';
    //Recuperar la sesión
    session_start();

    //comprobamos que el usuario existe
    if(!isset($_SESSION['user']
)){
      die("Error - debe <a href='index.php'>Identificarse</a>");
    }
    
    //Si hemos hecho clic en cambiar
    if(isset($_POST['cambiar'])){
      $color=$_POST['color'];
      setcookie('colorFondo',$color,time()+3600);
      header("Location:preferencias.php");
    }
    //Si hemos hecho clic en restablecer
    if(isset($_POST['restablecer'])){
      setcookie('colorFondo',"white",time()+3600);
      header("Location:preferencias.php");
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 3 : Desarrollo de aplicaciones web con PHP -->
<!-- Tarea 3, Foro: preferencias.php -->
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Preferencias</title>
  <link href="css/voluntario.css" rel="stylesheet" type="text/css">
  <link href="css/preferencias.css" rel="stylesheet" type="text/css">
  <style>
    body{
      background-color:<?php if(isset($_COOKIE['colorFondo'])) echo $_COOKIE['colorFondo']; ?>;
    }
  </style>
</head>

<body>

<div id="contenedor">
  <div id="logotipo">
    <p><a href="anunciante.php">Empresa Okupa</a></p>
  </div>
  <div id="menu">
    <ul>
        <li><a href="anuncio.php">Publicar anuncio</a></li>
        <li><a href="usuario.php">Listado de anuncios</a></li>
        <li><a href="preferencias.php">Preferencias</a></li>
        <li><a href="logoff.php">Salir</a></li>
    </ul>
       <div class="sesion"><p>Hora de conexión: <?php echo $_SESSION['hora']; ?></p></div>
       <div class="sesion"><p>Bienvenido <?php echo $_SESSION['user']
; ?></p></div>        
  </div>
  <div id="preferencias">
  <form action='preferencias.php' method='post'>
    <fieldset>
        <legend>Cambiar preferencias</legend>
        <div>
            <?php 
            if(isset($error)) {
                echo "<span class='error'>" . $error . "</span>";
            }
            if (isset($anuncio)) {
                echo "<span class='anuncio'>" . $anuncio . "</span>";
            }
            ?>
        </div>
        <div class='campo'>
            <label for='color_fondo' >Elija el color del fondo deseado:</label><br/><br/>
            <input type="radio" id='color_fondo' name="color" value="white" checked><label>Blanco</label><br/>
            <input type="radio" id='color_fondo' name="color" value="green"><label>Verde</label><br/>
            <input type="radio" id='color_fondo' name="color" value="red"><label>Rojo</label><br/>
            <input type="radio" id='color_fondo' name="color" value="blue"><label>Azul</label><br/>
            <input type="radio" id='color_fondo' name="color" value="yellow"><label>Amarillo</label><br/>
        </div>
        <br/>
        <div class='campo'>
            <input type='submit' name='cambiar' value='Cambiar' />
            <input type='submit' name='restablecer' value='Restablecer' />
        </div> 
        
    </form> 
  <div id="footer">
  </div>  
</div>
</body>
</html>



