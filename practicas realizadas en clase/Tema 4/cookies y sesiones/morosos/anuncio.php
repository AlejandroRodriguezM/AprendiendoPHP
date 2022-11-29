<?php
    include 'funciones.inc.php';
   //Recuperar la sesion
   session_start();

   //Comprobamos que el usuario se ha autentificado
   if(!isset($_SESSION['user']
)){
     die("Error -debe <a href='index.php'>identificarse</a>");
   }
   //Si hacemos clic en publicar
   if(isset($_POST['publicar'])){
    //Comprobamos si el textArea tiene contenido
    if(empty($_POST['textarea'])){
      $error="Debes introducir un anuncio";
    }else{
      //controlar que no hemos escrito mas de 500 caracteres
      if(strlen($_POST['textarea'])>500){
        $error="El contenido debe ser menor de 500 caracteres";
      }else{
        $autor=$_SESSION['user']
;
        $contenido=$_POST['textarea'];
        $moroso=$_POST['moroso'];
        $fecha=date('Y-m-d',time());
        $localidad=$_POST['localidad'];

        //Conectamos a la bd
        $con=conexion_bd("morosos");

        if(inserta_anuncio($autor, $moroso,$localidad,$contenido, $fecha, $con)){
          $anuncio="Anuncio publicado correctamente";
        }else{
          $error="Error al crear el anuncio";
        }
        //Desconectar BD
        unset($con);
      }
    }
   }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 3 : Desarrollo de aplicaciones web con PHP -->
<!-- Tarea 3, Foro: anuncio.php -->
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Foro DWES</title>
  <link href="css/voluntario.css" rel="stylesheet" type="text/css">
  <link href="css/anuncio.css" rel="stylesheet" type="text/css">
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
        <li><a href="logoff.php">Salir</a></li>
    </ul>
       <div class="sesion"><p>Hora de conexión: <?php echo $_SESSION['hora']; ?></p></div>
       <div class="sesion"><p>Bienvenido <?php echo $_SESSION['user']
; ?></p></div>        
  </div>
  <div id="publicar_anuncio">
  <form action='anuncio.php' method='post'>
    <fieldset>
        <legend>Publicar anuncio</legend>
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
            <label for='anuncio' >Introduzca un anuncio:</label><br/>
            <textarea cols='50' rows='10' name='textarea'><?php if (isset($_POST['textarea'])) echo $_POST['textarea']; ?></textarea>
			<br>
			<label for='moroso' >Moroso:</label><input type='text' name='moroso'/><br/><br/>
			<label for='localidad' >Localidad:</label><input type='text' name='localidad'/><br/>
        </div>
        
        <br/>
        <div class='campo'>
            <input type='submit' name='publicar' value='Publicar' />
        </div> 
        
    </form> 
  <div id="footer">
  </div>  
</div>
</body>
</html>


