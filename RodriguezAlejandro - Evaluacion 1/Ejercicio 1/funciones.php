<?php

//Funcion para agregar datos en el array
function agregar($array,$id,$nombre,$apellido,$direccion,$pos){
    $array[$pos]=$id;
    $array[$pos+1]=$nombre;
	$array[$pos+2]=$apellido;
    $array[$pos+3]=$direccion;
	return $array;
}

//funcion que nos mostrara el array en una tabla
function mostrarTabla($array)
{
    //si la array no esta vacio mostramos los datos en la tabla
    if (!empty($array)) {
        if (isset($_REQUEST['ingresar']) == "Insertar") {
            //recorremos el array
            for ($i = 0; $i < count($array); $i += 4) {
                //mostramos los elementos del array
                echo "<tr>
                <td class='datos'>".$array[$i]."</td>
                <td class='datos'>" . $array[$i + 1] ."</td>
                <td class='datos'>" . $array[$i + 2] ."</td>
                <td class='datos'>".$array[$i+3]."</td>
                </tr>";
            }
        }
    }
}
