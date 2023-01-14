<?php
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
        return $resultado;
    }

    public function desbloquear_usuario($login)
    {
        $db = new ClaseDb();
        $conexion = $db->conexion();
        $sql = "UPDATE anunciantes SET bloqueado = 0 WHERE login = '$login'";
        try {
            $resultado = $conexion->query($sql);
            if ($resultado) {
                header("Location: desbloquear.php");
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
                header("Location: desbloquear.php");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function checkUser($login)
    {
        $db = new ClaseDb();
        $conexion = $db->conexion();
        $existe = false;
        $sql = "SELECT * FROM anunciantes WHERE login = ?";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $login);
        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            $existe = true;
        }
        return $existe;
    }

    public function check_login($login, $password)
    {
        $this->errorSesion($login);
        if ($this->checkUser($login)) {
            $db = new ClaseDb();
            $pass_encrypted = $db->obtain_password($login);
            if (password_verify($password, $pass_encrypted)) {
                $this->login_user($login);
            }
        }
    }

    public function checkBloq($login)
    {
        $db = new ClaseDb();
        $conexion = $db->conexion();
        $sql = "SELECT bloqueado FROM anunciantes WHERE login = ?";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $login);
        $consulta->execute();
        $data = $consulta->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function checkEmail($email)
    {
        $db = new ClaseDb();
        $conexion = $db->conexion();
        $existe = false;
        $sql = "SELECT * FROM anunciantes WHERE email = ?";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $email);
        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            $existe = true;
        }
        return $existe;
    }

    public function login_user($login)
    {
        $db = new ClaseDb();
        session_start();
        $_SESSION['login'] = $login;
        $_SESSION['hora'] = date("H:i:s");
        $db->cookiesUser($login);

        if ($login == "dwes") {
            if (!isset($_COOKIE['color'])) {
                $color = "white";
                setcookie('color', $color, time() + 3600, '/');
            }
            $db->cookiesAdmin($login);
            header("Location: inicio.php");
        } else {
            $estado = $this->checkBloq($login);
            if ($estado['bloqueado'] == 0) {
                echo "<p class='error' style='font-weight:bold;color:red;font-size: 15px;'>Estas bloqueado, debe esperar a que un admin te desbloque</p>";
            } else {
                header("Location: inicio.php");
            }
        }
    }

    public function create_user($login, $password, $email)
    {
        if (!$this->checkUser($login)) {
            if (!$this->checkEmail($email)) {
                try {
                    $db = new ClaseDb();
                    $conexion = $db->conexion();
                    $sql = "INSERT INTO anunciantes (login, password, bloqueado, email) VALUES (?, ?, ?, ?)";
                    $consulta = $conexion->prepare($sql);
                    $password_hash = password_hash($password, PASSWORD_DEFAULT);
                    $resultado = $consulta->execute(array($login, $password_hash, 1, $email));
                    if (!$resultado) {
                        echo "<p class='error' style='font-weight:bold;color:red;font-size: 15px;'>Error al crear el usuario</p>";
                    } else {
                        header("Location: index.php");
                    }
                } catch (PDOException $e) {
                    die("Codigo: " . $e->getCode() . "<br>Error: " . $e->getMessage());
                }
            } else {
                echo "<p class='error' style='font-weight:bold;color:red;font-size: 15px;'>El email ya existe</p>";
            }
        } else {
            echo "<p class='error' style='font-weight:bold;color:red;font-size: 15px;'>El usuario ya existe</p>";
        }
    }

    public function listar_usuarios()
    {
        $db = new ClaseDb();
        $conexion = $db->conexion();
        $sql = "SELECT * FROM anunciantes";
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    /**
     * Function that returns error messages when logging in
     *
     * @param [type] $user
     * @return string
     */
    function errorSesion($user)
    {
        if (!$this->checkUser($user)) {
            if (!isset($_COOKIE['login'])) {
                $error = "<p class='error' style='font-weight:bold;color:red;font-size: 15px;'>El usuario no existe 1º Intento</p>";
                $num_errors = 1;
                setcookie('login', $user, time() + 3600, '/');
                setcookie('errorLogin', $error, time() + 3600, '/');
                setcookie('num_fallos', $num_errors, time() + 3600, '/');
                header("Location: index.php");
            } elseif ($_COOKIE['num_fallos'] == 1) {
                $error = "<p class='error' style='font-weight:bold;color:red;font-size: 15px;'>El usuario no existe 2º Intento</p>";
                $num_errors = 2;
                setcookie('login', $user, time() + 3600, '/');
                setcookie('errorLogin', $error, time() + 3600, '/');
                setcookie('num_fallos', $num_errors, time() + 3600, '/');
                header("Location: index.php");
            } elseif ($_COOKIE['num_fallos'] == 2) {
                $error = "<p class='error' style='font-weight:bold;color:red;font-size: 15px;'>El usuario no existe 3º Intento.If you fail, you will have to wait 10 seconds</p>";
                $num_errors = 3;
                setcookie('login', $user, time() + 3600, '/');
                setcookie('errorLogin', $error, time() + 3600, '/');
                setcookie('num_fallos', $num_errors, time() + 3600, '/');
                header("Location: index.php");
            } elseif ($_COOKIE['num_fallos'] == 3) {
                header("Location: errorLog.php");
            }
        } else {
            if (!isset($_COOKIE['login'])) {
                $error = "<p class='error' style='font-weight:bold;color:red;font-size: 15px;'>Contraseña incorrecta 1º Intento.</p>";
                $num_errors = 1;
                setcookie('login', $user, time() + 3600, '/');
                setcookie('errorLogin', $error, time() + 3600, '/');
                setcookie('num_fallos', $num_errors, time() + 3600, '/');
                header("Location: index.php");
            } elseif ($_COOKIE['num_fallos'] == 1) {
                $error = "<p class='error' style='font-weight:bold;color:red;font-size: 15px;'>Contraseña incorrecta 2º Intento.</p>";
                $num_errors = 2;
                setcookie('login', $user, time() + 3600, '/');
                setcookie('errorLogin', $error, time() + 3600, '/');
                setcookie('num_fallos', $num_errors, time() + 3600, '/');
                header("Location: index.php");
            } elseif ($_COOKIE['num_fallos'] == 2) {
                $error = "<p class='error' style='font-weight:bold;color:red;font-size: 15px;'>Contraseña incorrecta 3º Intento .If you fail, you will have to wait 10 seconds</p>";
                $num_errors = 3;
                setcookie('login', $user, time() + 3600, '/');
                setcookie('errorLogin', $error, time() + 3600, '/');
                setcookie('num_fallos', $num_errors, time() + 3600, '/');
                header("Location: index.php");
            } elseif ($_COOKIE['num_fallos'] == 3) {
                header("Location: errorLog.php");
            }
        }
    }
}
