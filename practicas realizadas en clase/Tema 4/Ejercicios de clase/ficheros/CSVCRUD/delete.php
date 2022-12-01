<?php
include "funciones.php";
$delete_id = $_GET['delete_id'];
$data = csvtoarray("miembro.csv",$delimitador = ",");

unset($data[$delete_id]);
$data=array_values($data);
//Escribir en el fichero
	write_csv($data, "miembro.csv");
header('location: index.php');
?>