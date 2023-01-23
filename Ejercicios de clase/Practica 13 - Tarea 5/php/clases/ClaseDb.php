<?php

include "datosBD.php";
// include "Anunciantes.php";
include "funciones.inc.php";
class ClaseDb
{
    /**
     * Establece una conexión a la base de datos
     *
     * @return $conexion
     */
    public static function establecerConexion()
    {
        try {
            $conexion = new PDO(DNS, USER, PASSWORD); // crea una nueva conexión PDO utilizando DNS, usuario y contraseña
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // establece el modo de error en excepción
            $conexion->exec("SET CHARACTER SET UTF8"); // establece el conjunto de caracteres en UTF8
            return $conexion;
        } catch (PDOException $e) {
            die("Código: " . $e->getCode() . "<br>Error: " . $e->getMessage()); // si ocurre un error, muestra el código de error y el mensaje
        }
    }

    /**
     * Inserta un nuevo anuncio en la base de datos
     *
     * @param @param object $anuncio
     *
     */
    public function insertarAnuncio($anuncio)
    {
        $sql = "INSERT INTO anuncios (autor, moroso, localidad, descripcion, fecha) VALUES (?, ?, ?, ?, ?)"; // Consulta SQL para insertar en la tabla
        $autor = $anuncio->getAutor(); // obtiene el autor
        $moroso = $anuncio->getMoroso(); // obtiene el deudor
        $localidad = $anuncio->getDireccion(); // obtiene la localidad
        $descripcion = $anuncio->getDescripcion(); // obtiene la descripción
        $fecha = $anuncio->getFecha(); // obtiene la fecha

        try {
            $consulta = $this->establecerConexion()->prepare($sql); // prepara la consulta
            $consulta->bindParam(1, $autor); // enlaza el autor
            $consulta->bindParam(2, $moroso); // enlaza el deudor
            $consulta->bindParam(3, $localidad); // enlaza la localidad
            $consulta->bindParam(4, $descripcion); // enlaza la descripción
            $consulta->bindParam(5, $fecha); // enlaza la fecha
            $resultado = $consulta->execute(); // ejecuta la consulta
            if (!$resultado) {
                echo "<p class='error' style='font-weight:bold;color:red;font-size: 15px;'>Error al crear el anuncio</p>"; // muestra un mensaje de error si la consulta no es exitosa
            } else {
                header("Location: anuncio.php"); // redirige a la página de anuncios
            }
        } catch (PDOException $e) {
            die("Código: " . $e->getCode() . "<br>Error: " . $e->getMessage()); // si ocurre un error, muestra el código de error y el mensaje
        }
    }

    /**
     * Obtiene todos los anuncios de la base de datos
     *
     * @return array
     */
    public function obtenerAnuncios()
    {
        $sql = "SELECT * FROM anuncios"; // Consulta SQL para seleccionar todo de la tabla
        $consulta = $this->establecerConexion()->prepare($sql); // prepara la consulta
        $consulta->execute(); // ejecuta la consulta
        $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC); // obtiene el resultado como un array asociativo
        return $consulta; // devuelve el resultado
    }

    /**
     * Elimina un anuncio de la base de datos
     *
     * @param object $anuncio
     *
     */
    public function borrarAnuncio($anuncio)
    {
        $autor = $anuncio->getAutor(); // obtiene el autor del anuncio
        $moroso = $anuncio->getMoroso(); // obtiene el deudor del anuncio
        $localidad = $anuncio->getDireccion(); // obtiene la localidad del anuncio
        $descripcion = $anuncio->getDescripcion(); // obtiene la descripcion del anuncio
        $fecha = $anuncio->getFecha(); // obtiene la fecha del anuncio
        $sql = "DELETE FROM anuncios WHERE autor = ? AND moroso = ? AND localidad = ? AND descripcion = ? AND fecha = ?"; // Consulta SQL para eliminar un anuncio específico
        try {
            $consulta = $this->establecerConexion()->prepare($sql); // prepara la consulta
            $consulta->bindParam(1, $autor); // enlaza el autor
            $consulta->bindParam(2, $moroso); // enlaza el deudor
            $consulta->bindParam(3, $localidad); // enlaza la localidad
            $consulta->bindParam(4, $descripcion); // enlaza la descripcion
            $consulta->bindParam(5, $fecha); // enlaza la fecha
            $resultado = $consulta->execute(); // ejecuta la consulta
            if (!$resultado) {
                echo "<p class='error' style='font-weight:bold;color:red;font-size: 15px;'>Error al eliminar el anuncio</p>"; // muestra un mensaje de error si la consulta no es exitosa
            } else {
                header("Location: inicio.php"); // redirige a la página de inicio
            }
        } catch (PDOException $e) {
            die("Código: " . $e->getCode() . "<br>Error: " . $e->getMessage());
        }
    }

    /**
     * Modifica un anuncio de la base de datos
     *
     * @param object $anuncio
     *
     */
    public function modificarAnuncio($anuncio)
    {
        $autor = $anuncio->getAutor();
        $moroso = $anuncio->getMoroso();
        $localidad = $anuncio->getDireccion();
        $descripcion = $anuncio->getDescripcion();
        $fecha = $anuncio->getFecha();
        $sql = "UPDATE anuncios SET autor = ?, moroso = ?, localidad = ?, descripcion = ?, fecha = ? WHERE autor = ?";
        try {
            $consulta = $this->establecerConexion()->prepare($sql);
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

    /**
     * Devuelve el numero de anuncios que hay en la base de datos
     *
     * @return integer
     */
    public function num_anuncios()
    {
        $sql = "SELECT COUNT(*) FROM anuncios";
        $consulta = $this->establecerConexion()->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchColumn();
        return $resultado;
    }

    /**
     * Devuelve el numero de usuarios en la base de datos
     *
     * @return object
     */
    public function mostrar_usuarios()
    {
        $conexion = $this->establecerConexion();
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
        $conexion = $this->establecerConexion();
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
        $conexion = $this->establecerConexion();
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
     * Comprueba si el usuario y contraseña introducidos coincide en la base de datos
     * @param mixed $login
     * @param mixed $password
     * @return bool
     */
    public function check_user($login, $password)
    {
        $conexion = $this->establecerConexion();
        $exist = false;
        $consulta = $conexion->prepare("SELECT * from anunciantes WHERE login = ? and password = ?");
        $consulta->execute(array($login, $password));
        if ($consulta->fetchColumn()) {
            $exist = true;
        }
        return $exist;
    }

    /**
     * Comprueba si existe el nombre de usuario en la base de datos
     *
     * @param [type] $login
     * @return boolean
     */
    public function check_nombreUser($login)
    {
        $conexion = $this->establecerConexion();
        $existe = false;
        $sql = "SELECT login FROM anunciantes WHERE login = ?";
        $consulta = $conexion->prepare($sql);
        $consulta->execute(array($login));
        if ($consulta->fetchColumn()) {
            $exist = true;
        }
        return $exist;
    }

    /**
     * Comprueba si la contraseña de un usuario introducida coincide con la contraseña guardada en la base de datos
     *
     * @param [type] $email
     * @return boolean
     */
    public function check_login($login, $password)
    {
        $exist = false;
        $pass_encrypted = $this->obtain_password($login);
        if ($this->check_user($login, $pass_encrypted)) {
            $password = crypt($password, 'XC');
            if ($pass_encrypted == $password) {
                $exist = true;
            } else {
                errorSesion($login);
            }
        } else {
            errorSesion($login);
        }
        return $exist;
    }

    /**
     * Devuelve el estado de un usuario
     *
     * @param [type] $login
     * @return string
     */
    public function estado_user($login)
    {
        $conexion = $this->establecerConexion();
        $sql = "SELECT bloqueado FROM anunciantes WHERE login = ?";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $login);
        $consulta->execute();
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
        return $resultado['bloqueado'];
    }

    /**
     * Devuelve el email de un usuario
     *
     * @param [type] $login
     * @return string
     */
    public function email_user($login)
    {
        $conexion = $this->establecerConexion();
        $sql = "SELECT email FROM anunciantes WHERE login = ?";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $login);
        $consulta->execute();
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
        return $resultado['email'];
    }

    /**
     * Comprueba si el email introducido en la base de datos existe
     * @param mixed $email
     * @return bool
     */
    public function check_email($email)
    {
        $conexion = $this->establecerConexion();
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
     *
     * @param mixed $login
     * @param mixed $password
     * @return void
     */
    public function login_user($login, $password)
    {
        session_start();
        if ($this->check_login($login, $password)) {
            $estado = $this->estado_user($login);
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
    public function create_user($anunciante)
    {
        $login = $anunciante->getLogin();
        $bloqueado = $anunciante->getEstado();
        $password = $anunciante->getPassword();
        $email = $anunciante->getEmail();
        if (!$this->check_nombreUser($login)) {
            if (!$this->check_email($email)) {
                try {
                    $db = new ClaseDb();
                    $conexion = $db->establecerConexion();
                    $sql = "INSERT INTO anunciantes (login, password, bloqueado, email) VALUES (?, ?, ?, ?)";
                    $consulta = $conexion->prepare($sql);
                    $password_hash = crypt($password, 'XC');
                    $resultado = $consulta->execute(array($login, $password_hash, $bloqueado, $email));
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
     * @return array
     */
    public function listar_usuarios()
    {
        $conexion = $this->establecerConexion();
        $sql = "SELECT * FROM anunciantes";
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
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
        $conexion = $this->establecerConexion();
        $consulta = $conexion->prepare("SELECT password from anunciantes where login=?");
        $consulta->bindParam(1, $login);
        $consulta->execute();
        $data = $consulta->fetch(PDO::FETCH_ASSOC);
        return $data['password'];
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
}
