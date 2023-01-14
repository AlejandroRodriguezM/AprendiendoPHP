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

    public function cookiesUser($login)
    {
        setcookie('loginUser', $login, time() + 3600, '/');
    }

    public function cookiesAdmin($login)
    {
        setcookie('adminUser', $login, time() + 3600, '/');
    }

    public function destroyCookiesUser()
    {
        setcookie('loginUser', '', time() - 3600, '/');
        setcookie('adminUser', '', time() - 3600, '/');
        setcookie('color', '', time() - 3600, '/');
    }

    /**
     * Function that clears session error cookies
     *
     * @return void
     */
    public function deleteCookieLoginError()
    {
        setcookie('errorLogin', '', time() - 3600, '/');
        setcookie('errorAdmin', '', time() - 3600, '/');
        setcookie('errorUser', '', time() - 3600, '/');
        setcookie('num_fallos', '', time() - 3600, '/');
        setcookie('login', '', time() - 3600, '/');
    }


    /**
     * Return the password from a user using loggin
     *
     * @param [type] $login
     * @param [type] $con
     * @return string
     */
    public function obtain_password($login)
    {
        $conexion = $this->conexion();
        $consulta = $conexion->prepare("SELECT password from anunciantes where login=?");
        $consulta->bindParam(1, $login);
        $consulta->execute();
        $data = $consulta->fetch(PDO::FETCH_ASSOC);
        return $data['password'];
    }

    public function check_cookies()
    {
        if (!isset($_SESSION['login']) && !isset($_COOKIE['loginUser'])) {
            session_destroy();
            die("Error. You are not logged. Talk to the administrator if you have more problems <a href='logOut.php'>Log in</a>");
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

    public function insertarAnuncio($anuncio)
    {
        $sql = "INSERT INTO anuncios (autor, moroso, localidad, descripcion, fecha) VALUES (?, ?, ?, ?, ?)";
        $autor = $anuncio->getAutor();
        $moroso = $anuncio->getMoroso();
        $localidad = $anuncio->getDireccion();
        $descripcion = $anuncio->getDescripcion();
        $fecha = $anuncio->getFecha();

        try {
            $consulta = $this->conexion()->prepare($sql);
            $consulta->bindParam(1, $autor);
            $consulta->bindParam(2, $moroso);
            $consulta->bindParam(3, $localidad);
            $consulta->bindParam(4, $descripcion);
            $consulta->bindParam(5, $fecha);
            $resultado = $consulta->execute();
            if (!$resultado) {
                echo "<p class='error' style='font-weight:bold;color:red;font-size: 15px;'>Error al crear el usuario</p>";
            } else {
                header("Location: anuncio.php");
            }
        } catch (PDOException $e) {
            die("Codigo: " . $e->getCode() . "<br>Error: " . $e->getMessage());
        }
    }

    public function obtenerAnuncios()
    {
        $conexion = new ClaseDb();
        $sql = "SELECT * FROM anuncios";
        $consulta = $conexion->conexion()->prepare($sql);
        $consulta->execute();
        $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $consulta;
    }

    public function borrarAnuncio($anuncio)
    {
        $conexion = new ClaseDb();
        $autor = $anuncio->getAutor();
        $moroso = $anuncio->getMoroso();
        $localidad = $anuncio->getDireccion();
        $descripcion = $anuncio->getDescripcion();
        $fecha = $anuncio->getFecha();
        $sql = "DELETE FROM anuncios WHERE autor = ? AND moroso = ? AND localidad = ? AND descripcion = ? AND fecha = ?";
        try {
            $consulta = $conexion->conexion()->prepare($sql);
            $consulta->bindParam(1, $autor);
            $consulta->bindParam(2, $moroso);
            $consulta->bindParam(3, $localidad);
            $consulta->bindParam(4, $descripcion);
            $consulta->bindParam(5, $fecha);
            $resultado = $consulta->execute();
            if (!$resultado) {
                echo "<p class='error' style='font-weight:bold;color:red;font-size: 15px;'>Error al borrar el anuncio</p>";
            } else {
                header("Location: inicio.php");
            }
        } catch (PDOException $e) {
            die("Codigo: " . $e->getCode() . "<br>Error: " . $e->getMessage());
        }
    }

    public function modificarAnuncio($anuncio)
    {
        $conexion = new ClaseDb();
        $autor = $anuncio->getAutor();
        $moroso = $anuncio->getMoroso();
        $localidad = $anuncio->getDireccion();
        $descripcion = $anuncio->getDescripcion();
        $fecha = $anuncio->getFecha();
        $sql = "UPDATE anuncios SET autor = ?, moroso = ?, localidad = ?, descripcion = ?, fecha = ? WHERE autor = ?";
        try {
            $consulta = $conexion->conexion()->prepare($sql);
            $consulta->bindParam(1, $autor);
            $consulta->bindParam(2, $moroso);
            $consulta->bindParam(3, $localidad);
            $consulta->bindParam(4, $descripcion);
            $consulta->bindParam(5, $fecha);
            $consulta->bindParam(6, $autor);
            $consulta->execute();
            header("Location: inicio.php");
        } catch (PDOException $e) {
            die("Codigo: " . $e->getCode() . "<br>Error: " . $e->getMessage());
        }
    }

    public function num_anuncios()
    {
        $conexion = new ClaseDb();
        $sql = "SELECT COUNT(*) FROM anuncios";
        $consulta = $conexion->conexion()->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchColumn();
        return $resultado;
    }
}
