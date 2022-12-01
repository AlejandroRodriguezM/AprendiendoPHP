<?php
require_once("./inc/header.inc.php");
session_start();

if (isset($_SESSION['nom_tabla'])) {
	$table_name = $_SESSION['nom_tabla'];
	if ($table_name == "aficiones") {
		escribirJSONBDAficion();
	}
	if ($table_name == "aficionesamigos") {
		escribirJSONBDAficionAmigo();
	}
	if ($table_name == "tb_amigos") {
		escribirJSONBDAmigo();
	}
	header("Location: index.php");
}
