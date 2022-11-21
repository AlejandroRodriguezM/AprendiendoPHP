<?php
include "../inc/header.inc.php";

if(isset($_POST['mod'])){
    $login = $_POST['select_login'];
    $array = getUserData($login);
    $name = $array['nombre'];
    $bornDate = $array['fNacimiento'];
    $budget = $array['presupuesto'];
    $password = $array['password'];


}
else{
    $login = "";
    $name = "";
    $bornDate = "";
    $budget = "";
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
            <input type="submit" name='mod' id='mod' value="Upload User Data">
        </form>
        <hr>
        <?php
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="input-labeled">
                <label>Login:</label>
                <input type="text" name="modUser[login]" required maxlength="10" readonly value="<?php echo $login  ?>">
            </div>
            <div class="input-labeled">
                <label>Clave:</label>
                <input type="password" name="modUser[password]" placeholder="**********" maxlength="20" value="<?php  ?>">
            </div>
            <div class="input-labeled">
                <label>Repite Clave:</label>
                <input type="password" name="modUser[repassword]" placeholder="**********" maxlength="20" value="<?php  ?>">
            </div>
            <div class="input-labeled">
                <label>Nombre:</label>
                <input type="text" name="modUser[nombre]" required maxlength="30" value="<?php echo $name  ?>">
            </div>
            <div class="input-labeled">
                <label>Fecha Nacimiento:</label>
                <input type="date" name="modUser[fNacimiento]" placeholder="aaaa-mm-dd" required maxlength="10" value="<?php echo $bornDate  ?>">
            </div>
            <input type="submit" name="form_mod_user" value="Guardar">
        </form>
        <?php  ?>
    </fieldset>
    </main>
</body>

</html>