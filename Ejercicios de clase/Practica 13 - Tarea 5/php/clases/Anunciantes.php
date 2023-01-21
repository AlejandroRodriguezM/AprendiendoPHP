<?php

include "funciones.inc.php";
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

    /**
     * Devuelve el numero de anunciantes en la base de datos
     *
     * @return integer
     */
    public function num_anunciantes()
    {
        $db = new ClaseDb();
        $conexion = $db->establecerConexion();
        $sql = "SELECT COUNT(*) FROM anunciantes";
        $resultado = $conexion->query($sql);
        $num = $resultado->fetchColumn();
        return $num;
    }

    /**
     * Devuelve el numero de usuarios en la base de datos
     *
     * @return object
     */
    public function mostrar_usuarios()
    {
        $db = new ClaseDb();
        $conexion = $db->establecerConexion();
        // Selecciona todos los campos de la tabla anunciantes
        $sql = "SELECT * FROM anunciantes";
        // ejecuta la consulta y guarda el resultado en $resultado
        $resultado = $conexion->query($sql);
        // devuelve el resultado
        return $resultado;
    }

    /**
     * Funcion que permite desbloquear un usuario
     *
     * @param [type] $login
     * @return void
     */
    public function bloquear_usuario($login)
    {
        $db = new ClaseDb();
        $conexion = $db->establecerConexion();
        $sql = "UPDATE anunciantes SET bloqueado = 1 WHERE login = '$login'";
        try {
            $resultado = $conexion->query($sql);
            if ($resultado) {
                echo "<script>window.location.href='./desbloquear.php';</script>";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Funcion que permite bloquear un usuario
     *
     * @param [type] $login
     * @return void
     */
    public function desbloquear_usuario($login)
    {
        $db = new ClaseDb();
        $conexion = $db->establecerConexion();
        $sql = "UPDATE anunciantes SET bloqueado = 0 WHERE login = '$login'";
        try {
            $resultado = $conexion->query($sql);
            if ($resultado) {
                echo "<script>window.location.href='./desbloquear.php';</script>";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Comprueba si existe el usuario en la base de datos
     *
     * @param [type] $login
     * @return void
     */
    public function check_user($login)
    {
        $db = new ClaseDb();
        $conexion = $db->establecerConexion();
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

    /**
     * Comprueba si la contraseña de un usuario introducida coincide con la contraseña guardada en la base de datos
     *
     * @param [type] $email
     * @return void
     */
    public function check_pass($login, $password)
    {
        $exist = false;

        if ($this->check_user($login)) {
            $pass_encrypted = $this->obtain_password($login);
            $password = crypt($password, 'XC');
            if ($pass_encrypted == $password) {
                $exist = true;
            }
        } else {
            $this->errorSesion($login);
        }
        return $exist;
    }

    /**
     * Devuelve el estado de un usuario
     *
     * @param [type] $login
     * @return string
     */
    public function check_bloqueado($login)
    {
        $db = new ClaseDb();
        $conexion = $db->establecerConexion();
        $sql = "SELECT bloqueado FROM anunciantes WHERE login = ?";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $login);
        $consulta->execute();
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
        return $resultado['bloqueado'];
    }

    /**
     * Comprueba si el email introducido en la base de datos existe
     */
    public function checkEmail($email)
    {
        $db = new ClaseDb();
        $conexion = $db->establecerConexion();
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

    /**
     * Permite conectarse a la base de datos mediante un usuario y contraseña. Comprueba si el usuario es correcto y continua.
     */
    public function login_user($login, $password)
    {
        session_start();
        if ($this->check_pass($login, $password)) {
            $estado = $this->check_bloqueado($login);
            if ($estado == 1) {
                echo "<p class='error' style='font-weight:bold;color:red;font-size: 15px;'>Estas bloqueado, debe esperar a que un admin te desbloque</p>";
            } else {
                $_SESSION['login'] = $login;
                $_SESSION['hora'] = date("H:i:s");
                cookiesUser($login);
                if ($login == "dwes") {
                    if (!isset($_COOKIE['color'])) {
                        $color = "white";
                        setcookie('color', $color, time() + 3600, '/');
                    }
                    cookiesAdmin($login);
                    header('HTTP/1.1 302 Found');
                    header("Location: inicio.php");
                } else {
                    header('HTTP/1.1 302 Found');
                    header("Location: inicio.php");
                }
            }
        }
    }

    /**
     * Permite crear un usuario en la base de datos
     *
     * @param [type] $login
     * @param [type] $password
     * @param [type] $email
     * @return void
     */
    public function create_user($login, $password, $email)
    {
        if (!$this->check_user($login)) {
            if (!$this->checkEmail($email)) {
                try {
                    $db = new ClaseDb();
                    $conexion = $db->establecerConexion();
                    $sql = "INSERT INTO anunciantes (login, password, bloqueado, email) VALUES (?, ?, ?, ?)";
                    $consulta = $conexion->prepare($sql);
                    $password_hash = crypt($password, 'XC');
                    $resultado = $consulta->execute(array($login, $password_hash, 0, $email));
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

    /**
     * Devuelve los datos de todos los usuarios en la base de datos
     *
     * @return void
     */
    public function listar_usuarios()
    {
        $db = new ClaseDb();
        $conexion = $db->establecerConexion();
        $sql = "SELECT * FROM anunciantes";
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    /**
     * Función que devuelve mensajes de error al iniciar sesión
     *
     * @param [type] $user
     * @return string
     */
    function errorSesion($user)
    {
        if (!$this->check_user($user)) {
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

    /**
     * Return the password from a user using loggin
     *
     * @param [type] $login
     * @param [type] $con
     * @return string
     */
    function obtain_password($login)
    {
        $db = new ClaseDb();
        $conexion = $db->establecerConexion();
        $consulta = $conexion->prepare("SELECT password from anunciantes where login=?");
        $consulta->bindParam(1, $login);
        $consulta->execute();
        $data = $consulta->fetch(PDO::FETCH_ASSOC);
        return $data['password'];
    }
}
