<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <link rel="shortcut icon" href="img/ico.png">
    <title>Create new user</title>
</head>

<body>
    <?php
    include "../inc/header.inc.php";

    if (isset($_POST['create'])) {
        $password = $_POST['password'];
        $rePassword = $_POST['repassword'];
        if (strcmp($password, $rePassword) === 0) {
            $login = $_POST['login'];
            $base = "conta2";
            $query = "select login from usuarios where login = '$login'";
            if (checkUser($query, $base)) {
                $pass_encrypted = password_hash($password, PASSWORD_DEFAULT);
                $name = $_POST['nombre'];
                $bornDate = $_POST['fNacimiento'];
                $budget = $_POST['presupuesto'];
                $con = connection_bd($base);
                $sql = "INSERT INTO usuarios (login, password, nombre, fNacimiento, presupuesto) VALUES ('$login', '$pass_encrypted', '$name', '$bornDate', '$budget')";
                operacionesMySql($sql, $base);
                $message = "<b>You have successfully created the user: $login</b>";
            }
            else{
                $message = "The user: $login Already exists";
            }
        } else {
            $message = "Passwords don't match";
        }
    }
    ?>
    <header>
        <h1 id="inicio">Creating new Users</h1>
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
        &gt; New user
    </nav>
    <main>
        <fieldset class="mini-formulario">
            <legend>Data New User</legend>
            <?php
            if (!empty($error)) {
                echo "<div class='error'><b>!</b>$error</div>";
            }
            if (!empty($correcto)) {
                echo "<div class='correcto'><b>!</b>$correcto</div>";
            }
            ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="input-labeled">
                    <label>Login:</label>
                    <input type="text" name="login" required maxlength="20" value="<?php ?>">
                </div>
                <div class="input-labeled">
                    <label>New password:</label>
                    <input type="password" name="password" required maxlength="128" value="<?php ?>">
                </div>
                <div class="input-labeled">
                    <label>Repite new password:</label>
                    <input type="password" name="repassword" required maxlength="128" value="<?php ?>">
                </div>
                <div class="input-labeled">
                    <label>Name:</label>
                    <input type="text" name="nombre" required maxlength="30" value="<?php  ?>">
                </div>
                <div class="input-labeled">
                    <label>Fecha Nacimiento:</label>
                    <input type="date" name="fNacimiento" placeholder="aaaa-mm-dd" required maxlength="10" value="<?php  ?>">
                </div>
                <div class="input-labeled">
                    <label>Budget:</label>
                    <input type="text" name="presupuesto" required maxlength="30" value="<?php  ?>">
                </div>
                <input type="submit" name="create" id='create' onclick="return confirm('Are you sure you want to add a new user?')" value="Create user">
                <?php
                if (isset($message)) {
                    echo "<div class='error'><b>$message</b></div>";
                }
                ?>
            </form>
        </fieldset>
    </main>
</body>

</html>