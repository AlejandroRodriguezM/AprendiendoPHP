<?php
class DB
{
    private $pdo;

    public function conectaDb()
    {
        $opciones = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $dsn = "mysql:host=localhost;dbname=test;charset=utf8mb4";
        $this->pdo = new PDO($dsn, "root", "1234", $opciones);
    }

    public function borraTodo()
    {
        $this->pdo->query("DROP TABLE IF EXISTS datos_usuarios");
        $this->pdo->query("CREATE TABLE datos_usuarios (id INT PRIMARY KEY AUTO_INCREMENT, nombre VARCHAR(255), apellidos VARCHAR(255))");
    }

    public function insertaRegistro($id, $nombre, $apellidos)
    {
        $stmt = $this->pdo->prepare("INSERT INTO datos_usuarios (id,nombre, apellidos) VALUES (?,?, ?)");
        $stmt->execute([$id, $nombre, $apellidos]);
    }

    public function cuentaRegistros()
    {
        $stmt = $this->pdo->query("SELECT COUNT(*) FROM datos_usuarios");
        return $stmt->fetchColumn();
    }

    public function muestraRegistros()
    {
        $stmt = $this->pdo->query("SELECT * FROM datos_usuarios");
        return $stmt->fetchAll();
    }

    public function modificaRegistro($id, $nombre, $apellidos)
    {
        $stmt = $this->pdo->prepare("UPDATE datos_usuarios SET nombre = ?, apellidos = ? WHERE id = ?");
        $stmt->execute([$nombre, $apellidos, $id]);
    }

    public function borraRegistros($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM datos_usuarios WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function borrarConSeguridad()
    {
        // Make a copy of the data in a JSON file
        $data = json_encode($this->muestraRegistros());
        file_put_contents("backup.json", $data);

        // Delete all records from the table
        $this->borraTodo();
    }

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
            $this->insertaRegistro($registro["id"], $registro["nombre"], $registro["apellido"]);
        }
    }
}
