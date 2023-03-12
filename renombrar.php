<?php

// Función que busca y reemplaza una cadena en un archivo
function replaceInFile($filename, $search, $replace) {
    $content = file_get_contents($filename);
    $content = str_replace($search, $replace, $content);
    file_put_contents($filename, $content);
}

// Función recursiva que lee todos los archivos dentro de un directorio y sus subdirectorios
function readDirectory($dir, $search, $replaceArray) {
    $files = scandir($dir);
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            $path = $dir . '/' . $file;
            if (is_dir($path)) {
                readDirectory($path, $search, $replaceArray);
            } else {
                $content = file_get_contents($path);
                foreach ($search as $key => $word) {
                    if (strpos($content, $word) !== false) {
                        replaceInFile($path, $word, $replaceArray[$key]);
                    }
                }
            }
        }
    }
}

// Directorio donde se encuentran los archivos a modificar
$dir = 'tema6/';

// Palabras a buscar y reemplazar
$search = array('Inma', 'Balbuena', 'Antonia');
$replaceArray = array('Alejandro', 'Rodriguez', 'Alejandro');

// Llamada a la función para leer el directorio y modificar los archivos
readDirectory($dir, $search, $replaceArray);

?>
