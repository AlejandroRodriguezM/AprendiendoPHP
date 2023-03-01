<?php 
session_start();
$usuario='';
$contrasena='';
$mensaje='';
if($_POST) {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
     
    include '../includes/config.php';
    $sql = sprintf("SELECT id FROM usuarios WHERE usuario = '%s' and contrasena =  '%s'",
    	mysqli_real_escape_string($conn,$usuario),
    	mysqli_real_escape_string($conn,md5($contrasena)));
    $res = mysqli_query($conn,$sql);
    if (!$res) die('Invalid query: ' . mysql_error());
    list($count) = mysqli_fetch_row($res);
    if (!$count) $mensaje = sprintf("Usuario o contraseña equivocados");
    else {
        $_SESSION['entrado'] = true;
        $_SESSION['id'] = $count;
        $_SESSION['usuario']= $_POST['usuario'];
        header('Location:index.php');
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
                <h1>Acceso a Editores</h1>
                <p>
                La página con toda la información sobre el Rey del Rock & Roll.
                </p>    
        </section>
    <section class="main container">
        <div class=" formulario row" >
            
                <?php if ($mensaje) { ?>
                    <div class="alert alert-warning" role="alert">
                        <?php echo $mensaje ?>
                    </div>
                <?php } ?>
                    <form method="post" action="acceso.php">
                    <div class="form-group">
                    <label>USUARIO</label>
                    <input type="text" class="form-control" name="usuario" aria-describedby="basic-addon1" value="<?php echo $usuario ?>"><br>
                    <label>CONTRASEÑA</label>
                    <input type="password" class="form-control" name="contrasena"><br>
                    <div class="submit">
                        <input type="submit" class="btn btn-primary" value="Entrar">
                    </div>
                </div>
                </form>
                <div>
                    <p><a href="registro.php">Nuevo Usuario</a></p>
                </div>
            
        </div>
     </section>
</body>
</html>