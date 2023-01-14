<?php
include "./php/clases/ClaseDb.php";
if (isset($_COOKIE['loginUser'])) {
    header('Location: desbloquear.php');
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
    <title>Registro</title>
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
<div class="container">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <fieldset style="height: 450px;">
            <legend class="float-none w-auto px-3">Registro de nuevo usuario</legend>
            <div class="mb-3">
                <label for="nombre" style="font-weight:bold;">Login</label>
                <input type="text" name="nombre" id="nombre" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" style="font-weight:bold;">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="mb-3">
                <label for="repassword" style="font-weight:bold;">Repite la password</label>
                <input type="password" name="repassword" id="repassword" class="form-control">
            </div>
            <div class="mb-3">
                <label for="email" style="font-weight:bold;">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="mb-3">
                <input class="btn btn-primary form-control" type="submit" id="enviar" name="enviar" value="Enviar" style="width: 35%;background-color: rgb(209, 207, 207); border-radius: 0; border-color: black; color: black; margin-right: 28%;">
                <input class="btn btn-primary form-control" type="submit" id="volver" name="volver" value="Volver" style="width: 35%;background-color: rgb(209, 207, 207); border-radius: 0; border-color: black; color: black;">
            </div>
            <?php
            if (isset($_POST['enviar'])) {
                $login = $_POST['nombre'];
                $password = $_POST['password'];
                $repassword = $_POST['repassword'];
                $email = $_POST['email'];
                if (!empty($login) && !empty($password) && !empty($repassword) && !empty($email)) {
                    $db = new ClaseDb();
                    if ($db->checkPassword($password, $repassword)) {
                        $usuario = new Anunciantes("", "", "", "");
                        $usuario->create_user($login, $password, $email);
                    } else {
                        echo "<p class='error' style='font-weight:bold;color:red;font-size:15px;'>Las contraseñas no coinciden</p>";
                    }
                } else {
                    echo "<p class='error' style='font-weight:bold;color:red;font-size: 15px;'>No se ha podido crear al usuario</p>";
                }
            }
            ?>
        </fieldset>
    </form>
</div>
</body>

</html>