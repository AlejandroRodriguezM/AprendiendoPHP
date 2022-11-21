<?php
include "../inc/header.inc.php";
//comprobamos que el usuario existe
if(!isset($_SESSION['usuario'])){
  die("Error - debe <a href='../index.php'>Identificarse</a>");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <link rel="shortcut icon" href="img/ico.png">
    <title>Pagina principal</title>
</head>
<?php
include "../inc/header.inc.php";

if (isset($_POST['select'])) {

    $login = $_POST['select_login'];
    $array = getUserData($login);
    $name = $array['nombre'];
    $bornDate = $array['fNacimiento'];
    $budget = $array['presupuesto'];
    $password = $array['password'];
} else {
    $login = "";
    $name = "";
    $bornDate = "";
    $budget = "";
}

if(isset($_POST['mod'])){
    $login = $_POST['login'];
    $name = $_POST['nombre'];
    $bornDate = $_POST['fNacimiento'];
    $password = $_POST['password'];
    $rePassword = $_POST['repassword'];
    if (strcmp($password, $rePassword) === 0) {
        $pass_encrypted = password_hash($password, PASSWORD_DEFAULT);
        $base = "conta2";
        $con = connection_bd($base);
        $sql = "UPDATE usuarios SET password = '$pass_encrypted', nombre = '$name', fNacimiento = '$bornDate' WHERE login = '$login'";
        operacionesMySql($sql, $base);
        $message = "<b>You have successfully modified the user: $login</b>";
    } else {
        $message = "Passwords don't match";
    }
}
?>
<body>

    <header>
        <h1 id="inicio">Gastos personales</h1>
    </header>
    <nav>
        <span class="desplegable">
            <a href="./?<?php echo $fakeCookie; ?>">Manage users</a>
            <div>
                <a href="new_user.php?<?php  ?>">New user</a>
                <a href="modify_user.php?<?php  ?>">Modify user</a>
                <a href="delete_user.php?<?php  ?>">Delete user</a>
                <a href="../">Exit</a>
            </div>
        </span>
        &gt; Modify user
    </nav>
    <fieldset class="mini-formulario">
        <legend>Modify User Data</legend>
        <?php
        if (!empty($error)) {
            echo "<div class='error'><b>!</b>$error</div>";
        }
        if (!empty($correcto)) {
            echo "<div class='correcto'><b>!</b>$correcto</div>";
        }
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label>Select User</label>
            <select name='select_login' id='user_login'>
                <?php
                echo "<option name='select_login' value=''>User Name</option>";
                $conexion = connection_bd("conta2");
                $query = "select * from usuarios";
                $registros = $conexion->query($query) or die($conexion->error);
                $row = $registros->fetch();
                while ($row != null) {
                ?>
                    <option value="<?php echo $row['login']; ?>"><?php echo $row['login']; ?></option>
                <?php

                    $row = $registros->fetch();
                }
                $conexion = null;
                ?>
            </select>
            <input type="submit" name='select' id='select' value="Upload User Data">
        </form>
        <hr>
        <?php
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="input-labeled">
                <label>Login:</label>
                <input type="text" name="login" required maxlength="10" readonly value="<?php echo $login  ?>">
            </div>
            <div class="input-labeled">
                <label>Clave:</label>
                <input type="password" name="password" placeholder="**********" maxlength="20" value="<?php  ?>">
            </div>
            <div class="input-labeled">
                <label>Repite Clave:</label>
                <input type="password" name="repassword" placeholder="**********" maxlength="20" value="<?php  ?>">
            </div>
            <div class="input-labeled">
                <label>Nombre:</label>
                <input type="text" name="nombre" required maxlength="30" value="<?php echo $name  ?>">
            </div>
            <div class="input-labeled">
                <label>Fecha Nacimiento:</label>
                <input type="date" name="fNacimiento" placeholder="aaaa-mm-dd" required maxlength="10" value="<?php echo $bornDate  ?>">
            </div>
            <input type="submit" name="mod" id="mod" value="Guardar">
        </form>
        <?php  ?>
    </fieldset>
    </main>
</body>

</html>