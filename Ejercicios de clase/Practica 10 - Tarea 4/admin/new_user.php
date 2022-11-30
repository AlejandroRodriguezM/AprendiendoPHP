<?php
include "../inc/header.inc.php";
session_start();

if (isset($_COOKIE['admin'])) {
    checkSessionUser();
} else {
    die("Error - You have to <a href='../index.php'>Log in</a>");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <link rel="shortcut icon" href="../img/ico.png">
    <title>Create new user</title>
</head>
<?php
if (isset($_POST['create'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $rePassword = $_POST['repassword'];
    $name = $_POST['user_name'];
    $bornDate = $_POST['born_date'];
    $budget = $_POST['budget'];
    if (!empty($login) && !empty($password) && !empty($rePassword) && !empty($name) && !empty($bornDate)) {
        if (strcmp($password, $rePassword) === 0) {
            if (checkUserDB($login)) {
                $pass_encrypted = password_hash($password, PASSWORD_DEFAULT);

                if ($budget < 0) {
                    $budget = 0;
                }
                $datosUsuario = array(
                    'login' => $login,
                    'nombre' => $name,
                    'fNacimiento' => $bornDate,
                    'presupuesto' => $budget,
                    'password' => $pass_encrypted
                );
                if (newUser($datosUsuario)) {
                    $message = "<div class='mens_ok'><b>You have successfully created the user: $login</b></div>";
                } else {
                    $message = "<div class='mens_error'><b>There was an error creating the user: $login</b></div>";
                }
            } else {
                $message = "<div class='mens_error'><b>The user: $login Already exists</b></div>";
            }
        } else {
            $message = "<div class='mens_error'><b>Passwords don't match</b></div>";
        }
        setcookie("newUser", $message, time() + 3600, '/');
        header("Location: new_user.php");
    } else {
        $message = "<div class='mens_error'><b>Fill in all the fields</b></div>";
        setcookie("newUser", $message, time() + 3600, '/');
        header("Location: new_user.php");
    }
}

if (isset($_POST['return'])) {
    header("Location: index.php");
}
?>

<body>

    <header>
        <h1 id="inicio">Creating new Users</h1>
    </header>
    <nav>
        <span class="dropdown_menu">
            <a href="index.php?">Manage users</a>
            <div>
                <a href="new_user.php">New user</a>
                <a href="modify_user.php">Modify user</a>
                <a href="delete_user.php">Delete user</a>
                <a href="../logOut.php">Exit</a>
            </div>
        </span>
        &gt; New user
    </nav>
    <div id="name-user-header">
        <i>Welcome</i> <b><?php echo $_SESSION['user']; ?></b>
        <i><br>Login</i> <b><?php echo $_SESSION['hour']; ?></b>
    </div>
    <main>
        <fieldset class="mini-form">
            <legend>Data New User</legend>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="input-labeled">
                    <label>Login:</label>
                    <input type="text" name="login" maxlength="20" pattern="[a-zA-Z]+" required">
                </div>
                <div class="input-labeled">
                    <label>New password:</label>
                    <input type="password" name="password" maxlength="128" required">
                </div>
                <div class="input-labeled">
                    <label>Repite new password:</label>
                    <input type="password" name="repassword" maxlength="128" required">
                </div>
                <div class="input-labeled">
                    <label>Name:</label>
                    <input type="text" name="user_name" maxlength="30" pattern="[a-zA-Z]+" required">
                </div>
                <div class="input-labeled">
                    <label>Fecha Nacimiento:</label>
                    <input type="date" name="born_date" placeholder="aaaa-mm-dd" min="1932-01-01" max="2006-01-01" maxlength="10" required">
                </div>
                <div class="input-labeled">
                    <label>Budget:</label>
                    <input type="number" name="budget" maxlength="30" min="0" max="999999999" ">
                </div>
                <div class="submit">
                    <input type="submit" name="create" id='create' onclick="return confirm('Are you sure you want to add a new user?')" value="Create user">
                    <input type="submit" name="return" id='return' value="Return">
                </div>
                <?php
                if (isset($_COOKIE['newUser'])) {
                    echo $_COOKIE['newUser'];
                    setcookie("newUser", '', time() - 3600, '/');
                }
                ?>
            </form>
        </fieldset>
    </main>
</body>

</html>