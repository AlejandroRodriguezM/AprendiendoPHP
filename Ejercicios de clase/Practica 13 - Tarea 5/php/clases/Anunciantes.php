<?php
include 'ClaseDb.php';

class Anunciantes
{

    private $login;
    private $password;
    private $estado;
    private $email;

    public function __construct($login, $password, $estado, $email)
    {
        $this->login = $login;
        $this->password = $password;
        $this->estado = $estado;
        $this->email = $email;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function num_anunciantes()
    {
        $db = new ClaseDb();
        $conexion = $db->conexion();
        $sql = "SELECT COUNT(*) FROM anunciantes";
        $resultado = $conexion->query($sql);
        $num = $resultado->fetchColumn();
        return $num;
    }

    public function mostrar_usuarios()
    {
        $db = new ClaseDb();
        $conexion = $db->conexion();
        $sql = "SELECT * FROM anunciantes";
        $resultado = $conexion->query($sql);

        //make a table

        echo "<table class='table table-striped table-bordered table-hover' style='width: 100%; margin: 0 auto; !important'>
        <tr style='background-color: yellow'>
        <th>login</th>
        <th>email</th>
        <th>estado</th>
        <th></th>
        </tr>";
        while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
            //form
            $login = $row['login'];
            $email = $row['email'];
            $estado = $row['bloqueado'];
            echo "<tr style='background-color: white'>";
            echo "<td>" . $login . "</td>";
            echo "<td>" . $email . "</td>";
            echo "<td>" .  $estado . "</td>";
            if ($row['bloqueado'] == 1) {
?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <td><input class='btn btn-primary' name='bloquear' id='bloquear' type='submit' value='Desbloquear' style='margin-left:50% !important'></td>
                    <input name='login' id='login' type='hidden' value='<?php echo $login ?>'>
                </form>
            <?php
            } else {
            ?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <td><input class='btn btn-primary' name='desbloquear' id='bloquear' type='submit' value='Bloquear' style='margin-left:50% !important'></td>
                    <input name='login' id='login' type='hidden' value='<?php echo $login ?>'>
                </form>
<?php
            }
            echo "</tr>";
        }
        if (isset($_POST['desbloquear'])) {
            $login = $_POST['login'];
            $this->bloquear_usuario($login);
        }

        if (isset($_POST['bloquear'])) {
            $login = $_POST['login'];
            $this->desbloquear_usuario($login);
        }
        echo "<tr style='background-color: orange'>
        <td colspan='4' >";
        $numero_usuarios = $this->num_anunciantes();
        echo "<p>Total: $numero_usuarios</p>";
        echo "</td>";
        echo "</tr>";
        echo "</table>";
    }

    public function desbloquear_usuario($login)
    {
        $db = new ClaseDb();
        $conexion = $db->conexion();
        $sql = "UPDATE anunciantes SET bloqueado = 0 WHERE login = '$login'";
        try {
            $resultado = $conexion->query($sql);
            if ($resultado) {
                header("Location: usuarios.php");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function bloquear_usuario($login)
    {
        $db = new ClaseDb();
        $conexion = $db->conexion();
        $sql = "UPDATE anunciantes SET bloqueado = 1 WHERE login = '$login'";
        try {
            $resultado = $conexion->query($sql);
            if ($resultado) {
                header("Location: usuarios.php");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
