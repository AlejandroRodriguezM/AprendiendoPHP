<?php
require_once("./inc/header.inc.php");
session_start();

if (isset($_SESSION['nom_tabla'])) {
	$table_name = $_SESSION['nom_tabla'];
	if ($table_name == "aficiones") {
		escribirCSVBDAficiones('aficiones.csv');
	}
	if ($table_name == "aficionesamigos") {
		escribirCSVBDAficionesAmigos('aficionesamigos.csv');
	}
	if ($table_name == "tb_amigos") {
		escribirCSVBDAmigos('tb_amigos.csv');
	}
	header("Location: index.php");
}
