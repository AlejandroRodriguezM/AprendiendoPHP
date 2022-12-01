<?php
//Visualizar tabla JSON
function visualizarTablaJSONAficiones()
{
	if (!file_exists("aficiones.json")) {
		echo "<tr><td colspan='5'>El fichero no existía y se ha creado</td></tr>";
		$fichero = fopen("aficiones.json", "w");
		$formato = "[]";
		fwrite($fichero, $formato);
		fclose($fichero);
	} else {
		$datos_aficion = file_get_contents("aficiones.json");
		$json_aficion = json_decode($datos_aficion, true);
		$indice = 0;
		foreach ($json_aficion as $datoAficion) {
			echo "<tr>";
			echo "<td>" . $datoAficion['id'] . "</td>";
			echo "<td>" . $datoAficion['nombre'] . "</td>";
			echo "<td>
			<a href='update/updateAficiones.php?edit_id=$indice' class='btn btn-success pull-right'>Actualizar</a>
			</td>
			<td>
			<a href='delete/delete.php?delete_id=$indice' class='btn btn-success pull-right'>Borrar</a>
			</td>";
			echo "</tr>";
			$indice++;
		}
	}
}

//Visualizar tabla JSON
function visualizarTablaJSONaficionesAmigos()
{
	if (!file_exists("aficionesamigos.json")) {
		echo "<tr><td colspan='5'>El fichero no existía y se ha creado</td></tr>";
		$fichero = fopen("aficionesamigos.json", "w");
		$formato = "[]";
		fwrite($fichero, $formato);
		fclose($fichero);
	} else {
		$datos_aficionAmigo = file_get_contents("aficionesamigos.json");
		$json_aficionAmigo = json_decode($datos_aficionAmigo, true);
		$indice = 0;
		foreach ($json_aficionAmigo as $aficionAmigo) {
			echo "<tr>";
			echo "<td>" . $aficionAmigo['nombre'] . "</td>";
			echo "<td>" . $aficionAmigo['aficion'] . "</td>";
			echo "<td>
			<a href='update/updateAficionesAmigos.php?edit_id=$indice' class='btn btn-success pull-right'>Actualizar</a>
			</td>
			<td>
			<a href='delete/delete.php?delete_id=$indice' class='btn btn-success pull-right'>Borrar</a>
			</td>";
			echo "</tr>";
			$indice++;
		}
	}
}

//Visualizar tabla JSON
function visualizarTablaJSONAmigos()
{
	if (!file_exists("tb_amigos.json")) {
		echo "<tr><td colspan='5'>El fichero no existía y se ha creado</td></tr>";
		$fichero = fopen("tb_amigos.json", "w");
		$formato = "[]";
		fwrite($fichero, $formato);
		fclose($fichero);
	} else {
		$datos_amigos = file_get_contents("tb_amigos.json");
		$json_amigos = json_decode($datos_amigos, true);
		$indice = 0;
		foreach ($json_amigos as $amigo) {
			echo "<tr>";
			echo "<td>" . $amigo['nombre'] . "</td>";
			echo "<td>" . $amigo['email'] . "</td>";
			echo "<td>" . $amigo['url'] . "</td>";
			echo "<td>" . $amigo['sexo'] . "</td>";
			echo "<td>" . $amigo['conviviente'] . "</td>";
			echo "<td>" . $amigo['favoritos'] . "</td>";
			echo "<td>
			<a href='update/updateAmigos.php?edit_id=$indice' class='btn btn-success pull-right'>Actualizar</a>
			</td>
			<td>
			<a href='delete/delete.php?delete_id=$indice' class='btn btn-success pull-right'>Borrar</a>
			</td>";
			echo "</tr>";
			$indice++;
		}
	}
}

function buscarId($data, $id)
{
	$encontrado = false;
	foreach ($data as $miembro) {
		if ($miembro['id'] == $id) {
			$encontrado = true;
		}
	}
	return $encontrado;
}
