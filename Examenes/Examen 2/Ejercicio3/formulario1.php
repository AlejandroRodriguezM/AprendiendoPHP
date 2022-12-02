<?php
include "./inc/header.inc.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Formulario1</title>
</head>
<?php
if (!isset($_SESSION['autentificacion'])) {
    die("Error. No estas registrado <a href='autentificacion.php'>Log in</a>");
}

if (isset($_POST['enviar'])) {
    $nombreYapel = $_POST['nombreYapel'];
    $email = $_POST['email'];
    $url = $_POST['url'];
    $sexo = $_POST['sexo'];
    $_SESSION['formulario1'] = 'formulario1';
    header("Location: formulario2.php?nombreYapel=$nombreYapel&email=$email&url=$url&sexo=$sexo");
}

?>
<body>
    <form method="post" class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);  ?>">
        <div>
            <label for="nombreYapel">Nombre y apellidos</label>
            <input type="text" name="nombreYapel" id="nombreYapel" placeholder="Escribe tu nombre y apellidos" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="Escribe tu email" required>
        </div>
        <div>
            <label for="url">URL pagina personal</label>
            <input type="text" name="url" id="url" placeholder="Escribe tu URL personal" required>
        </div>
        <div>
            <label for="sexo">Sexo</label>
            <input type='radio' name='sexo' value='Hombre'> Hombre
            <input type='radio' name='sexo' value='Mujer'> Mujer
        </div>
        <div>
            <input type="submit" name="enviar" value="Enviar datos">
        </div>
</body>


</html>