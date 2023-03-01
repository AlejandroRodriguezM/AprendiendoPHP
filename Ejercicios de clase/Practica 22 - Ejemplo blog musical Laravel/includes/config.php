<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '1234';
$dbname = 'elvisdb';
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)
    or die('Error connecting to mysql');
?>
