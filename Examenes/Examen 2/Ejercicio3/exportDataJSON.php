<?php
require_once("./inc/header.inc.php");
session_start();
global $conexion;

if (isset($_SESSION['nom_tabla'])) {
    $table_name = $_SESSION['nom_tabla'];
    $query = "SELECT * FROM $table_name";
    $resultado = $conexion->query($query);

    if ($table_name == "aficiones") {
        if ($resultado) {
            $data = "[]";
            $data = json_decode($data, true);
            $resultado->setFetchMode(PDO::FETCH_ASSOC);
            $tabla = $resultado->fetchAll();
            foreach ($tabla as $fila) {
                $add_arr = array(
                    'id' => $fila['idAficion'],
                    'nombre' => $fila['nombreAficion']
                );
                $data[] = $add_arr;
                $row = $resultado->fetch();
            }
            $data = json_encode($data, JSON_PRETTY_PRINT);
            file_put_contents($table_name . ".json", $data);
        }
    } if ($table_name == "aficionesamigos") {
        if ($resultado) {
            $data = "[]";
            $data = json_decode($data, true);
            $resultado->setFetchMode(PDO::FETCH_ASSOC);
            $tabla = $resultado->fetchAll();
            foreach ($tabla as $fila) {
                $add_arr = array(
                    'nombre' => $fila['nombreAmigo'],
                    'aficion' => $fila['aficion']
                );
                $data[] = $add_arr;
                $row = $resultado->fetch();
            }
            $data = json_encode($data, JSON_PRETTY_PRINT);
            file_put_contents($table_name . ".json", $data);
        }
    } if ($table_name == "tb_amigos") {
        if ($resultado) {
            $data = "[]";
            $data = json_decode($data, true);
            $resultado->setFetchMode(PDO::FETCH_ASSOC);
            $tabla = $resultado->fetchAll();
            foreach ($tabla as $fila) {
                $add_arr = array(
                    'nombre' => $fila['nombreYapel'],
                    'email' => $fila['email'],
                    'url' => $fila['url'],
                    'sexo' => $fila['sexo'],
                    'conviviente' => $fila['convivientes'],
                    'favoritos' => $fila['favorito']
                );
                $data[] = $add_arr;
                $row = $resultado->fetch();
            }
            $data = json_encode($data, JSON_PRETTY_PRINT);
            file_put_contents($table_name . ".json", $data);
        }
    }
}

header("Location: formulario3.php");

