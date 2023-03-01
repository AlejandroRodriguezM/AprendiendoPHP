<?php 
  $nombre  = '';
  $usuario = '';
  $email = '';
  $mensaje='';
  if($_POST) {
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $email = $_POST['email'];
    if ($nombre == "" or $usuario == "" or $contrasena == "" or $email == "") { 
        $mensaje= sprintf("Hay alg&uacute;n campo vac&iacute;o");
    }
    else {
        include '../includes/config.php';
        $sql = sprintf("INSERT INTO usuarios VALUES (NULL,'$nombre','$usuario', md5('$contrasena'), '$email')");
        $res = mysqli_query($conn,$sql);
        if (!$res) die('Invalid query: ' . mysql_error());
        $mensaje = sprintf("Usuario registrado correctamente");
    }
} ?>
 
 
<html>
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
    <section class="jumbotron acceso">
            <div class="container">
                <h1>Registro Nuevo Editor</h1>
                    
        </section>
<div class="main container">
    <?php if ($mensaje) { ?>
        <div class="alert alert-warning">
            <?php echo $mensaje ?>
        </div>
    <?php } ?>
    
    <form method="post" action="registro.php">
        <div class="form-group">
        <label>Nombre: </label><input type="text" class="form-control" name="nombre" value="<?php echo $nombre ?>"><br>
        <label>Nombre de usuario: </label><input type="text" class="form-control" name="usuario" value="<?php echo $usuario ?>"><br>
        <label>Contrase&ntilde;a </label><input type="password" class="form-control" name="contrasena"><br>
        <label>Email: </label><input type="text" class="form-control" name="email" value="<?php echo $email ?>"><br>
        <div class="submit">
            <input type="submit" class="btn btn-primary" value="Registrar">
        </div>
    </div>
    </form>
    <div>
        <p><a href="acceso.php">Acceso</a></p>
    </div>
</div>
 
</body>
</html>