<?php
    // Recuperamos la información de la sesión
    session_start();
    
    //Eliminamos la cookie de preferencias
    setcookie('colorFondo', null, -1);
    
    // Y la eliminamos
    session_unset();
    header("Location: index.php");
?>
