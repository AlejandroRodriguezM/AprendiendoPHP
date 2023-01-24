<?php
include_once "php/clases/funciones.inc.php";
//destroy cookies and session
session_start();
session_destroy();
destroyCookiesUser();
deleteCookieLoginError();
header('Location: index.php');
