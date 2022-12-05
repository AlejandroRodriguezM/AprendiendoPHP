<?php
require_once("./inc/header.inc.php");
session_start();

global $conexion;

if (isset($_SESSION['nom_tabla'])) {
    $table_name = $_SESSION['nom_tabla'];
    $query = "SELECT * FROM $table_name";
    $resultado = $conexion->query($query);

    if($table_name == "aficiones"){
        if ($resultado) {
            $delimitador = ",";
            $csv_file = $table_name.".csv";
            $csv = fopen("php://memory", "w");
            $header = array("idAficion", "nombreAficion");
            fputcsv($csv, $header, $delimitador);
            $resultado->setFetchMode(PDO::FETCH_ASSOC);
            $tabla = $resultado->fetchAll();
            foreach ($tabla as $fila) {
                $id = $fila['idAficion'];
                $nombre = $fila['nombreAficion'];
                $data = array($id, $nombre);
                fputcsv($csv, $data, $delimitador);
                $tabla = $resultado->fetch();
            }
            fseek($csv, 0);
            header("Content-type: text/csv");
            header('Content-Disposition: attachment; filename="' . $csv_file . '";');
            fpassthru($csv);
        }
    }
    elseif($table_name == "aficionesamigos"){
        if ($resultado) {
            $delimitador = ",";
            $csv_file = $table_name.".csv";
            $csv = fopen("php://memory", "w");
            $header = array("nombreAmigo", "aficion");
            fputcsv($csv, $header, $delimitador);
            $resultado->setFetchMode(PDO::FETCH_ASSOC);
            $tabla = $resultado->fetchAll();
            foreach ($tabla as $fila) {
                $nombre = $fila['nombreAmigo'];
                $aficion = $fila['aficion'];
                $data = array($nombre, $aficion);
                fputcsv($csv, $data, $delimitador);
                $tabla = $resultado->fetch();
            }
            fseek($csv, 0);
            header("Content-type: text/csv");
            header('Content-Disposition: attachment; filename="' . $csv_file . '";');
            fpassthru($csv);
        }
    }
    elseif($table_name == "tb_amigos"){
        if ($resultado) {
            $delimitador = ",";
            $csv_file = $table_name.".csv";
            $csv = fopen("php://memory", "w");
            $header = array("nombreYapel", "email", "url", "sexo", "conviviente", "favorito");
            fputcsv($csv, $header, $delimitador);
            $resultado->setFetchMode(PDO::FETCH_ASSOC);
            $tabla = $resultado->fetchAll();
            foreach ($tabla as $fila) {
                $nombre = $fila['nombreYapel'];
                $mail = $fila['email'];
                $url = $fila['url'];
                $sexo = $fila['sexo'];
                $conviviente = $fila['convivientes'];
                $favoritos = $fila['favorito'];
                $data = array($nombre, $mail, $url, $sexo, $conviviente, $favoritos);
                fputcsv($csv, $data, $delimitador);
                $tabla = $resultado->fetch();
            }
            fseek($csv, 0);
            header("Content-type: text/csv");
            header('Content-Disposition: attachment; filename="' . $csv_file . '";');
            fpassthru($csv);
        }
    }
}
