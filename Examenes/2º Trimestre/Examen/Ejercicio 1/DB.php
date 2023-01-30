<?php
//POR ALEJANDRO RODRIGUEZ MENA
include "database.php";
class DB
{
    //Conexión a la base de datos
    public function conectaDB()
    {
        try {
            $conexion = new PDO(DSN, USUARIO, PASSWORD);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $conexion;
    }

    //Borrar todo
    public function borraTodo()
    {
        $query = "DROP TABLE datos_usuarios";
        $conexion = $this->conectaDB();
        $conexion->exec($query);
        $query = "CREATE TABLE datos_usuarios(id int not null auto_increment primary key,nombre varchar(20) not null,";
        $query .= "apellidos varchar(25) not null,direccion varchar(50) not null)";
        $conexion->exec($query);
        unset($conexion);
    }
    //Insertar registro
    public function insertarRegistro($nombre, $apellido, $direccion)
    {
        $query = "INSERT INTO datos_usuarios(nombre,apellidos,direccion)VALUES('$nombre','$apellido','$direccion')";
        $conexion = $this->conectaDB();
        $conexion->exec($query);
        unset($conexion);
    }
    //Cuenta registros
    public function cuentaRegistros()
    {
        $query = "SELECT COUNT('id') as cantidad FROM datos_usuarios";
        $conexion = $this->conectaDB();
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sentencia = $conexion->prepare($query);
        $sentencia->setFetchMode(PDO::FETCH_ASSOC);
        $sentencia->execute();
        $datos = $sentencia->fetch();
        return $datos["cantidad"];
    }

    //Mostrar registros
    public function muestraRegitros()
    {
        try {
            $query = "SELECT * FROM datos_usuarios";
            $conexion = $this->conectaDB();
            $sentencia = $conexion->prepare($query);
            $sentencia->setFetchMode(PDO::FETCH_ASSOC);
            $sentencia->execute();
            $datos = $sentencia->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $datos;
    }

    //Modificar registro

    //Matriz de datos
    public static function matrizDatos($sql)
    {
        try {
            $conexion = new PDO(DSN, USUARIO, PASSWORD);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sentencia = $conexion->prepare($sql);
            $sentencia->setFetchMode(PDO::FETCH_ASSOC);
            $sentencia->execute();
            $datos = $sentencia->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $datos;
    }

    /**
     * Funcion que elimina el contenido de la tabla pero antes de ello crea un fichero JSON con la info de la base de datos
     * @return void
     */
    public function borrarConSeguridad()
    {
        // Make a copy of the data in a JSON file
        $data = json_encode($this->muestraRegitros());
        file_put_contents("backup.json", $data);

        // Delete all records from the table
        $this->borraTodo();
    }

    /**
     * Funcion que recupera todos los datos del fichero JSON a la base de datos
     * @return void
     */
    public function recuperarDatos()
    {
        // Check if the backup file exists
        if (!file_exists("backup.json")) {
            echo "No hay backup disponible.";
            return;
        }

        // Read the data from the backup file
        $data = file_get_contents("backup.json");
        $data = json_decode($data, true);

        // Insert the data into the table
        foreach ($data as $registro) {
            $this->insertarRegistro($registro["nombre"], $registro["apellidos"], $registro['direccion']);
        }
    }
}
