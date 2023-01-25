<?php

include "datosBD.php";
class Productos {
    private $id;
    private $name;
    private $quantity;
    private $price;
    // constructor and other methods
    public function __construct($id, $name, $quantity, $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->quantity = $quantity;
        $this->price = $price;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getQuantity()
    {
        return $this->quantity;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }

        /**
     * Establece una conexión a la base de datos
     *
     * @return $conexion
     */
    public function establecerConexion()
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

    function runQuery($query) {
        try {
            //prepare and execute the query
            $stmt = $this->establecerConexion()->prepare($query);
            $stmt->execute();
            //fetch the result
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //display the result in a table
            echo "<table>";
            echo "<tr>";
            foreach ($result[0] as $key => $val) {
                echo "<th>".$key."</th>";
            }
            echo "</tr>";
            foreach ($result as $row) {
                echo "<tr>";
                foreach ($row as $val) {
                    echo "<td>".$val."</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function guardarBusqueda($query){
        $file = fopen("saved_queries.txt", "a");
        fwrite($file, $query . PHP_EOL);
        fclose($file);
        echo "Busqueda guardada en saved_queries.txt";
    }

    function crearTablaAuxiliar($query,$table_name) {
        try {
            $stmt = $this->establecerConexion()->prepare($query);
            $stmt->execute();
            //create a new table
            $this->establecerConexion()->query("CREATE TABLE $table_name AS $query");
            echo "Table $table_name creada correctamente";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


}