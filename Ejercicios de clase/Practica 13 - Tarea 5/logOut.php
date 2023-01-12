<?php
require_once "php/clases/ClaseDb.php";
//destroy cookies and session
session_start();
session_destroy();
$db = new ClaseDb();
$db->destroyCookiesUser();
header('Location: index.php');
