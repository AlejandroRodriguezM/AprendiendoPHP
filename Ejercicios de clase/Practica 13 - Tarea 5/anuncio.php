<?php
session_start();
include_once "php/clases/Anuncio.php";
include_once "php/clases/ClaseDb.php";
include_once "php/clases/funciones.inc.php";

$db = new ClaseDb();
check_cookies(); //Comprueba si existen cookies en el inicio de sesion

//En caso de no existir session, lo lleva borrar las cookies y volver a index
if (!isset($_SESSION['login'])) {
  header("Location: logOut.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/style/style.css">
  <title>Crear anuncio</title>
</head>

<?php


if (isset($_COOKIE['color'])) {
  echo '<body style="background-color:' . $_COOKIE['color'] . '">';
} else {
  echo '<body>';
}

?>
<header onclick="location.href='inicio.php';" style="cursor: pointer;">
  <h1>Empresa Okupa</h1>
</header>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">

      <a class="nav-item nav-link active" href="anuncio.php">Publicar anuncio</a>

      <a class="nav-item nav-link active" href="inicio.php">Listado de anuncios</a>

      <a class="nav-item nav-link active" href="preferencia.php">Preferencias</a>
      <?php
      if ($_SESSION['login'] == 'dwes') {
        echo "<a class='nav-item nav-link active' href='desbloquear.php'>Desbloquear</a>";
      }
      ?>
      <a class="nav-item nav-link active" href="logOut.php" style="margin-left: 15px;">Salir</a>
      <a class="nav-item nav-link active" href="#" style="margin-left: 1150px; color: black; position: absolute;"><?php echo "Bienvenido: ", $_SESSION['login'] ?></a>
      <a class="nav-item nav-link active" href="#" style="margin-left: 1300px; color: black; position: absolute"><?php echo "Hora de conexion:", $_SESSION['hora'] ?></a>
    </div>
  </div>
</nav>

<div style="margin-right: 78%;">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <fieldset style="width: 1200px !important; margin-left: 5%; height: 450px">
      <legend class="float-none w-auto px-3">Publicar anuncio</legend>
      <div class="mb-3">
        <label for="titulo">Introduzca un anuncio:</label>
        <textarea class="form-control" id="anuncio" name="anuncio" rows="3" placeholder="Introduzca un anuncio" style="resize:none;width: 450px !important;height: 150px "></textarea>
      </div>
      <div class="mb-3">
        <label for="titulo">Moroso:</label>
        <input type="text" class="form-control" id="moroso" name="moroso" placeholder="Nombre moroso" style="width: 450px !important;">
      </div>
      <div class="mb-3">
        <label for="titulo">Localidad:</label>
        <input type="text" class="form-control" id="localidad" name="localidad" placeholder="Nombre de la localidad" style="width: 450px !important;">
      </div>
      <div class="mb-3">
        <input class="btn btn-primary form-control" type="submit" id="enviar" name="enviar" value="Publicar" style="width: 10%;background-color: rgb(209, 207, 207); border-radius: 0; border-color: black; color: black; margin-right: 28%;">
      </div>
    </fieldset>
  </form>
</div>
<?php

if (isset($_POST['enviar'])) {
  $fecha = date("Y-m-d");
  $anuncio = new Anuncio("", $_SESSION['login'], $_POST['moroso'], $_POST['localidad'], $_POST['anuncio'], $fecha);
  $db->insertarAnuncio($anuncio);
}

?>

</body>


</html>