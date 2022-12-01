<?php

//Visualizar tabla JSON
function visualizarTablaJSONAficiones()
{
	$datos_aficion = file_get_contents("aficiones.json");
	$json_aficion = json_decode($datos_aficion, true);
	foreach ($json_aficion as $datoAficion) {
		echo "<tr>";
		echo "<td>" . $datoAficion['id'] . "</td>";
		echo "<td>" . $datoAficion['nombre'] . "</td>";
		echo "</tr>";
	}
}

//Visualizar tabla JSON
function visualizarTablaJSONaficionesAmigos()
{
	$datos_aficionAmigo = file_get_contents("aficionesamigos.json");
	$json_aficionAmigo = json_decode($datos_aficionAmigo, true);
	foreach ($json_aficionAmigo as $aficionAmigo) {
		echo "<tr>";
		echo "<td>" . $aficionAmigo['nombre'] . "</td>";
		echo "<td>" . $aficionAmigo['aficion'] . "</td>";
		echo "</tr>";
	}
}

//Visualizar tabla JSON
function visualizarTablaJSONAmigos()
{
	$datos_amigos = file_get_contents("tb_amigos.json");
	$json_amigos = json_decode($datos_amigos, true);
	foreach ($json_amigos as $amigo) {
		echo "<tr>";
		echo "<td>" . $amigo['nombre'] . "</td>";
		echo "<td>" . $amigo['email'] . "</td>";
		echo "<td>" . $amigo['url'] . "</td>";
		echo "<td>" . $amigo['sexo'] . "</td>";
		echo "<td>" . $amigo['conviviente'] . "</td>";
		echo "<td>" . $amigo['favoritos'] . "</td>";
		echo "</tr>";
	}
}


//Escribir CSV en BD Controlador
function operacionesJSON_BDAficiones($id, $nombre)
{
    global $conexion;
    $sql = "select * from aficiones where idAficion = '$id'";

    $resultado = $conexion->query($sql);
    try {
        if ($resultado->fetch()) {
            $sql = "UPDATE aficiones SET nombreAficion='$nombre' WHERE idAficion = $id";
        } else {
            $sql = "INSERT INTO aficiones (idAficion, nombreAficion) VALUES ($id, '$nombre')";
        }
        $conexion->exec($sql);
        unset($con);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

//Escribir CSV en BD Controlador
function operacionesJSON_BDAficionesAmigos($nombreAmigo, $aficion)
{
    global $conexion;
    $sql = "select * from aficionesamigos where nombreAmigo = '$nombreAmigo'";

    $resultado = $conexion->query($sql);
    try {
        if ($resultado->fetch()) {
            $sql = "UPDATE aficionesamigos SET nombreAmigo='$nombreAmigo' WHERE nombreAmigo = '$nombreAmigo'";
        } else {
            $sql = "INSERT INTO aficionesamigos(nombreAmigo,aficion) VALUES ('$nombreAmigo',$aficion)";
        }
        $conexion->exec($sql);
        unset($con);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

//Escribir CSV en BD Controlador
function operacionesJSON_BDAmigos($nombreYapel, $email, $sexo, $url, $convivientes, $favorito)
{
    global $conexion;
    $sql = "SELECT * FROM tb_amigos where nombreYapel = '$nombreYapel'";
    $resultado = $conexion->query($sql);

    try {
        if ($resultado->fetch()) {
            //Actualizamos la fecha de modificación
            $sql = "UPDATE tb_amigos SET email='$email',sexo='$sexo',url='$url',convivientes='$convivientes',favorito='$favorito' WHERE nombreYapel='$nombreYapel'";
        } else {
            $sql = "INSERT INTO tb_amigos(nombreYapel,email,url,sexo,convivientes,favorito) VALUES ('$nombreYapel','$email','$url','$sexo',$convivientes,'$favorito')";
        }
        $conexion->exec($sql);
        unset($con);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


//Escribir JSON en BD
function escribirJSONBDAficion()
{
	$datos_aficion = file_get_contents("aficiones.json");
	$json_aficion = json_decode($datos_aficion, true);
	foreach ($json_aficion as $datoAficion) {
		$id = $datoAficion['id'];
		$nombre = $datoAficion['nombre'];
		operacionesJSON_BDAficiones($id, $nombre);
	}
}

//Escribir JSON en BD
function escribirJSONBDAficionAmigo()
{
	$datos_aficionAmigo = file_get_contents("aficionesamigos.json");
	$json_aficionAmigo = json_decode($datos_aficionAmigo, true);
	foreach ($json_aficionAmigo as $aficionAmigo) {
		$id = $aficionAmigo['nombre'];
		$nombre = $aficionAmigo['aficion'];
		operacionesJSON_BDAficionesAmigos($id, $nombre);
	}
}

//Escribir JSON en BD
function escribirJSONBDAmigo()
{
	$datos_amigos = file_get_contents("tb_amigos.json");
	$json_amigos = json_decode($datos_amigos, true);
	foreach ($json_amigos as $amigo) {
		$nombreyApel = $amigo['nombre'];
		$email = $amigo['email'];
		$url = $amigo['url'];
		$sexo = $amigo['sexo'];
		$convivientes = $amigo['conviviente'];
		$favorito = $amigo['favoritos'];
		operacionesJSON_BDAmigos($nombreyApel, $email, $url,$sexo, $convivientes, $favorito);
	}
}
