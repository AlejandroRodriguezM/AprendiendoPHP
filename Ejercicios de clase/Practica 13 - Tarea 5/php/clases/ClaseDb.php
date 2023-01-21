<?php

include "datosBD.php";
class ClaseDb
{
    /**
     * Establece una conexión a la base de datos
     *
     * @return $conexion
     */
    public function establecerConexion()
    {
        try {
            $conexion = new PDO(DNS, user, password); // crea una nueva conexión PDO utilizando DNS, usuario y contraseña
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
}
