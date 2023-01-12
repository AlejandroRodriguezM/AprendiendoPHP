<?php
session_start();
include_once "php/clases/Anuncio.php";
include_once "php/clases/ClaseDb.php";

$db = new ClaseDb();
$db->check_cookies();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/style/style.css">
  <title>Inicio</title>
</head>

<body>
  <h1>Empresa Okupa</h1>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">

        <a class="nav-item nav-link active" href="#">Publicar anuncio</a>

        <a class="nav-item nav-link active" href="#">Listado de anuncios</a>

        <a class="nav-item nav-link active" href="#">Preferencias</a>
        <?php
        if ($_SESSION['login'] == 'dwes') {
          echo "<a class='nav-item nav-link active' href='#'>Desbloquear</a>";
        }
        ?>
        <a class="nav-item nav-link active" href="logOut.php" style="margin-left: 15px;">Salir</a>
        <a class="nav-item nav-link active" href="#" style="margin-left: 1350px; color: black; position: absolute"><?php echo "Bienvenido: ", $_SESSION['login'] ?></a>
        <a class="nav-item nav-link active" href="#" style="margin-left: 1500px; color: black; position: absolute"><?php echo "Hora de conexion:", $_SESSION['hora'] ?></a>
      </div>
    </div>
  </nav>
</body>

</html>