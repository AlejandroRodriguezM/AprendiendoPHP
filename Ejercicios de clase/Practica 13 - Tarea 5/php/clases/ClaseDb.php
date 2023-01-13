<?php

include "datosBD.php";

class ClaseDb
{
    public function conexion()
    {
        try {
            $conexion = new PDO(DNS, user, password);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->exec("SET CHARACTER SET UTF8");
            return $conexion;
        } catch (PDOException $e) {
            die("Codigo: " . $e->getCode() . "<br>Error: " . $e->getMessage());
        }
    }

    public function checkUser($login)
    {
        $conexion = $this->conexion();
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

    function check_login($login, $password)
    {
        $conexion = $this->conexion();
        $existe = false;
        $sql = "SELECT * FROM anunciantes WHERE login = ? AND password = ?";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $login);
        $pass_encrypted = $this->obtain_password($login);
        $consulta->bindParam(2, $pass_encrypted);
        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            $existe = true;
        }
        return $existe;
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
        $conexion = $this->conexion();
        $consulta = $conexion->prepare("SELECT password from anunciantes where login=?");
        $consulta->execute(array($login));
        $password = $consulta->fetch(PDO::FETCH_ASSOC)['password'];
        unset($consulta);
        return $password;
    }

    public function cookiesUser($login)
    {
        setcookie('loginUser', $login, time() + 3600, '/');
    }

    public function destroyCookiesUser()
    {
        setcookie('loginUser', '', time() - 3600, '/');
        setcookie('color', '', time() - 3600, '/');
    }

    public function check_cookies()
    {
        if (!isset($_SESSION['login']) && !isset($_COOKIE['loginUser'])) {
            die("Error. You are not logged. Talk to the administrator if you have more problems <a href='logOut.php'>Log in</a>");
        }
    }

    public function check_cookies_admin()
    {
        if (!isset($_SESSION['login']) && !isset($_COOKIE['loginUser']) && $_COOKIE['loginUser'] != "dwes") {
            die("Error. You are not the admin. Talk to the administrator if you have more problems <a href='logOut.php'>Log in</a>");
        }
    }

    public function checkPassword($password, $repassword)
    {
        $existe = false;
        if ($password == $repassword) {
            $existe = true;
        }
        return $existe;
    }

    public function login_user($login, $password)
    {
        if ($this->check_login($login, $password)) {
            session_start();
            $_SESSION['login'] = $login;
            $_SESSION['hora'] = date("H:i:s");
            $this->cookiesUser($login);

            if ($login == "dwes") {
                if (!isset($_COOKIE['color'])) {
                    $color = "white";
                    setcookie('color', $color, time() + 3600, '/');
                }
                header("Location: desbloquear.php");
            } else {
                // aqui pasa a la web inicio.php
                header("Location: desbloquear.php");
            }
        }
    }

    public function create_user($login, $password, $email)
    {
        if (!$this->checkUser($login)) {
            try {
                $conexion = $this->conexion();
                $sql = "INSERT INTO anunciantes (login, password, bloqueado, email) VALUES (?, ?, 1, ?)";
                $consulta = $conexion->prepare($sql);
                $consulta->bindParam(1, $login);
                $password = password_hash($password, PASSWORD_DEFAULT);
                $consulta->bindParam(2, $password);
                $consulta->bindParam(3, $email);
                $resultado = $consulta->execute();
                if (!$resultado) {
                    echo "<p class='error' style='font-weight:bold;color:red;font-size: 15px;'>Error al crear el usuario</p>";
                } else {
                    header("Location: index.php");
                }
            } catch (PDOException $e) {
                die("Codigo: " . $e->getCode() . "<br>Error: " . $e->getMessage());
            }
        } else {
            echo "<p class='error' style='font-weight:bold;color:red;font-size: 15px;'>El usuario ya existe</p>";
        }
    }

    public function listar_usuarios()
    {
        $conexion = new ClaseDb();
        $sql = "SELECT * FROM anunciantes";
        $consulta = $conexion->conexion()->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
}
