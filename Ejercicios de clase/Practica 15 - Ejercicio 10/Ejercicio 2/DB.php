<?php
class DB {
    private $pdo;

    public function conectaDb() {
        $opciones = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $dsn = "mysql:host=localhost;dbname=nombre_de_la_base_de_datos;charset=utf8mb4";
        $this->pdo = new PDO($dsn, "usuario", "contraseña", $opciones);
    }

    public function borraTodo() {
        $this->pdo->query("DROP TABLE IF EXISTS datos_usuarios");
        $this->pdo->query("CREATE TABLE datos_usuarios (id INT PRIMARY KEY AUTO_INCREMENT, nombre VARCHAR(255), apellidos VARCHAR(255))");
    }

    public function insertaRegistro($nombre, $apellidos) {
        $stmt = $this->pdo->prepare("INSERT INTO datos_usuarios (nombre, apellidos) VALUES (?, ?)");
        $stmt->execute([$nombre, $apellidos]);
    }

    public function cuentaRegistros() {
        $stmt = $this->pdo->query("SELECT COUNT(*) FROM datos_usuarios");
        return $stmt->fetchColumn();
    }

    public function muestraRegistros() {
        $stmt = $this->pdo->query("SELECT * FROM datos_usuarios");
        return $stmt->fetchAll();
    }

    public function modificaRegistro($id, $nombre, $apellidos) {
        $stmt = $this->pdo->prepare("UPDATE datos_usuarios SET nombre = ?, apellidos = ? WHERE id = ?");
        $stmt->execute([$nombre, $apellidos, $id]);
    }

    public function borraRegistros($id) {
        $stmt = $this->pdo->prepare("DELETE FROM datos_usuarios WHERE id = ?");
        $stmt->execute([$id]);
    }
}

