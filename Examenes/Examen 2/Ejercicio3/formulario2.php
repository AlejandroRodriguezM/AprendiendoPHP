<?php
include "./inc/header.inc.php";
//Recuperar la sesión
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Formulario2</title>
</head>
<?php
//No me funciona correctamente
// if (isset($_SESSION['formulario1'])) {
//     $nombreYapel = $_GET['nombreYapel'];
//     $email = $_GET['email'];
//     $url = $_GET['url'];
//     $sexo = $_GET['sexo'];
//     $_SESSION['nombreYapel'] = $nombreYapel;
//     $_SESSION['email'] = $email;
//     $_SESSION['url'] = $url;
//     $_SESSION['sexo'] = $sexo;
// } else {
//     die("Error. No estas registrado <a href='autentificacion.php'>Log in</a>");
// }


$nombreYapel = $_GET['nombreYapel'];
$email = $_GET['email'];
$url = $_GET['url'];
$sexo = $_GET['sexo'];
$_SESSION['nombreYapel'] = $nombreYapel;
$_SESSION['email'] = $email;
$_SESSION['url'] = $url;
$_SESSION['sexo'] = $sexo;


if (isset($_POST['enviar'])) {
    $convivientes = $_POST['convivientes'];
    $menu = $_POST['menu'];
    $aficiones = $_POST['Aficiones'];
    $_SESSION['formulario2'] = 'formulario2';
    header("Location: formulario3.php?convivientes=$convivientes&menu=$menu&aficiones=$aficiones");
} else {
    die("Error. No estas registrado <a href='autentificacion.php'>Log in</a>");
}

?>

<body>
    <form method="post" class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);  ?>">
        <div>
            <label for="convivientes">Numero de convivientes</label>
            <input type="numer" name="convivientes" id="convivientes" placeholder="Numero de convivientes" required>
        </div>
        <div>
            <label for="Aficiones">Aficiones</label>
            <input type="checkbox" name="Aficiones[]" value="tenis" <?php if (isset($_POST['Aficiones'])) echo 'checked="checked"'; ?>>tenis
            <input type="checkbox" name="Aficiones[]" value="futbol" <?php if (isset($_POST['Aficiones'])) echo 'checked="checked"'; ?>>futbol
            <input type="checkbox" name="Aficiones[]" value="baloncesto" <?php if (isset($_POST['Aficiones'])) echo 'checked="checked"'; ?>>baloncesto
            <input type="checkbox" name="Aficiones[]" value="natacion" <?php if (isset($_POST['Aficiones'])) echo 'checked="checked"'; ?>>pesca



        </div>
        <div>
            <label for="url">Favoritos</label>
            <select name="menu" id="menu">
                <option value="Cine">Cine</option>
                <option value="Canto">Canto</option>
                <option value="Musica">Musica</option>
                <option value="Arte">Arte</option>
            </select>
        </div>
        <div>
            <input type="submit" name="enviar" value="Enviar datos">
        </div>
    </form>

</body>

</html>