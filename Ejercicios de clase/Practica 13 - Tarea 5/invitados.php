<?php
session_start();
include_once "php/clases/Anuncio.php";
include_once "php/clases/ClaseDb.php";
$_SESSION['login'] = "Invitado";
$_SESSION['hora'] = date("H:i:s");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/style/style.css">
  <link rel="stylesheet" href="./assets/style/voluntario.css" type="text/css">
  <title>Invitados</title>
</head>

<body>
  <header onclick="location.href='invitados.php';" style="cursor: pointer;">
    <h1>Empresa Okupa</h1>
  </header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="invitados.php" style="margin-left: 10px;">Lista de anuncios</a>
        <a class="nav-item nav-link active" href="logOut.php" style="margin-left: 30px;">Salir</a>

        <a class="nav-item nav-link active" style="margin-left: 1100px; color: black;"><?php echo "Bienvenido: ", $_SESSION['login'] ?></a>
        <a class="nav-item nav-link active" style="margin-left: 15px; color: black;"><?php echo "Hora de conexion:", $_SESSION['hora'] ?></a>
      </div>
    </div>
  </nav>

  <div id="anuncios">
    <?php
    $db = new ClaseDb();
    $anuncios = $db->obtenerAnuncios();
    $num_anuncios = $db->num_anuncios();
    if ($num_anuncios != 0) {
      foreach ($anuncios as $anuncios) {

        $autor = $anuncios['autor'];
        $moroso = $anuncios['moroso'];
        $fecha = $anuncios['fecha'];
        $descripcion = $anuncios['descripcion'];
        $localidad = $anuncios['localidad'];

        echo "<div class='anuncio_publico'>";
        echo "<div class='anuncio'>";
        echo "<div class='autoryfecha'><span style='color:#528FD5'>$autor</span>&nbsp;&nbsp;&nbsp;publicó el&nbsp;&nbsp;&nbsp;<span style='color:#528FD5'>$fecha</span></div>";
        echo "<br />";
        echo "<div class='contenido'>$descripcion</div>";
        echo "<br>Moroso:$moroso&nbsp;&nbsp;Localidad:$localidad";
        echo "</div>";
        if ($_SESSION['login'] == 'dwes') {
          echo "<div class='botones'>";
    ?>
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input class="btn btn-primary form-control" type="submit" id="editar" name="editar" value="Editar" style="width: 5%;background-color: rgb(209, 207, 207); border-radius: 0; border-color: black; color: black; margin-right: 2%;">
            <input class="btn btn-primary form-control" type="submit" id="borrar" name="borrar" value="Borrar" style="width: 5%;background-color: rgb(209, 207, 207); border-radius: 0; border-color: black; color: black;">
            <input type="hidden" name="autor" value="<?php echo $autor ?>">
            <input type="hidden" name="moroso" value="<?php echo $moroso ?>">
            <input type="hidden" name="localidad" value="<?php echo $localidad ?>">
            <input type="hidden" name="descripcion" value="<?php echo $descripcion ?>">
            <input type="hidden" name="fecha" value="<?php echo $fecha ?>">
          </form>

    <?php
          echo "</div>";
        }
        echo "</div>";
      }
    } else {
      echo "<div class='anuncio_publico'>";
      echo "<div class='anuncio'>";
      echo "<div class='autoryfecha'><span style='color:#528FD5'>No hay anuncios</span></div>";
      echo "</div>";
      echo "</div>";
    }
    ?>
  </div>
</body>

</html>