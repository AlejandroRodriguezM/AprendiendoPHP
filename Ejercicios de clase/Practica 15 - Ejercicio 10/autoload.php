<?php

function autoload($class) {
    $paths = array(
        './Controlador/',
        './Modelo/',
        './Vista/'
    );
    foreach ($paths as $path) {
        $file = $path . $class . '.php';
        if (is_file($file)) {
            include $file;
            break;
        }
    }
}

spl_autoload_register('autoload');