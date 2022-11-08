<?php
    include "funciones.php";
    $base="test";
    $id=$_GET['id'];
    $query="delete from datos_usuarios where id='$id'";
    borrarUsuario($query,$base);
    header("Location:index.php");
?>