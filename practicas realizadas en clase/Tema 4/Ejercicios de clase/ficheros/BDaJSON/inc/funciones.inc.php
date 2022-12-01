<?php

function seeTable()
{
    global $conexion;
    $query = "SELECT * FROM miembros";
    $resultado = $conexion->query($query);
    if ($resultado) {
        $resultado->setFetchMode(PDO::FETCH_ASSOC);
        $tabla = $resultado->fetchAll();
    } else {
        $tabla = [];
        $tabla = "<tr><td colspan = '5'>No members in databse</td></tr>";
    }
    return $tabla;
}

function create_Json()
{
    global $conexion;
    $query = "SELECT * FROM miembros";
    $resultado = $conexion->query($query);
    if ($resultado) {
        $data = "[]";
        $data = json_decode($data, true);
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
            $data_new = array('id' => $id, 'nombre' => $nombre, 'email' => $email, 'telefono' => $telefono, 'cread' => $creado, 'modificado' => $modificado, 'estado' => $estado);
            $data[] = $data_new;
        }
        $data = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents("miembrosTest.json", $data);
    }
}
