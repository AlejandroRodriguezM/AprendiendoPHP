<?php
require_once("./inc/header.inc.php");


global $conexion;
$query = "SELECT * FROM miembros";
$resultado = $conexion->query($query);
if ($resultado) {
    $delimitador = ",";
    $csv_file = "data.csv";
    $csv = fopen("php://memory", "w");
    $header = array("ID", "Nombre", "Email", "Telefono", "Creado", "Modificado", "Estado");
    fputcsv($csv, $header, $delimitador);
    $resultado->setFetchMode(PDO::FETCH_ASSOC);
    $tabla = $resultado->fetchAll();
    foreach ($tabla as $fila) {
        $id = $fila['id'];
        $nombre = $fila['nombre'];
        $email = $fila['email'];
        $telefono = $fila['telefono'];
        $creado = $fila['creado'];
        $modificado = $fila['modificado'];
        $estado = $fila['estado'];
        $data = array($id, $nombre, $email, $telefono, $creado, $modificado, $estado);
        fputcsv($csv, $data, $delimitador);
        $tabla = $resultado->fetch();
    }
    fseek($csv, 0);
    header("Content-type: text/csv");
    header('Content-Disposition: attachment; filename="' . $csv_file . '";');
    fpassthru($csv);
}
