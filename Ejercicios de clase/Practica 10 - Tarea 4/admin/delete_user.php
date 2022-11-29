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
    <title>Delete User</title>
</head>
<?php
if (isset($_POST['del'])) {
    $login = $_POST['select_login'];

    if (deleteUser($login)) {
        $message = "<div class='mens_ok'><b>You have successfully deleted the user: $login</b></div>";
    } else {
        $message = "<div class='mens_error'><b>You can't delete the admin user</b></div>";
    }
    setcookie("del_message", $message, time() + 3600, "/");
    header("Location: delete_user.php");
}

if (isset($_POST['cancel'])) {
    header("Location: index.php");
}
?>

<body>
    <header>
        <h1 id="inicio">Personal expenses</h1>
    </header>
    <nav>
        <span class="dropdown_menu">
            <a href="./?">Manage users</a>
            <div>
                <a href="new_user.php">New user</a>
                <a href="modify_user.php">Modify user</a>
                <a href="delete_user.php">Delete user</a>
                <a href="../logOut.php">Exit</a>
            </div>
        </span>
        &gt; Delete user
    </nav>
    <div id="name-user-header">
        <i>Welcome</i> <b><?php echo $_SESSION['user']
; ?></b>
    </div>
    <main>
        <fieldset class="mini-form
">
            <legend>Delete User</legend>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label>Select User</label>
                <select name='select_login' id='login_user'>

                    <?php
                    echo "<option name='select_login' value=''>User name</option>";
                    $$loginList
                        = getLoginsList();
                    foreach ($$loginList
                        as $login) {
                        echo "<option name='select_login' value='$login'>$login</option>";
                    }
                    ?>

                </select>

                <input type='submit' name='del' id='del' onclick="return confirm('Are you sure you want to delete the user ?')" value='Delete'>
                <input type="submit" name='cancel' id='cancel' value="Return to menu">
                <?php
                if (isset($_COOKIE['del_message'])) {
                    echo $_COOKIE['del_message'];
                    setcookie("del_message", '', time() - 3600, "/");
                }
                ?>
            </form>
        </fieldset>
    </main>
</body>

</html>