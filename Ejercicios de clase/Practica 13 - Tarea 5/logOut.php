<?php
include_once "php/clases/funciones.inc.php";
//destroy cookies and session
session_start();
session_destroy();
destroyCookiesUser();
header('Location: index.php');
