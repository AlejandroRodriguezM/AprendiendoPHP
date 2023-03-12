<?php

function copiarArchivos($rutaOrigen, $rutaDestino) {
  // Crear la carpeta de destino si no existe
  if (!file_exists($rutaDestino)) {
    mkdir($rutaDestino, 0777, true);
  }
  
  // Leer todos los archivos y carpetas dentro de la carpeta especificada
  $archivos = scandir($rutaOrigen);
  
  // Recorrer todos los archivos y carpetas encontrados
  foreach ($archivos as $archivo) {
    if ($archivo == '.' || $archivo == '..') {
      continue;
    }
    
    // Si es una carpeta, crear una nueva carpeta con el mismo nombre y copiar los archivos dentro de ella
    if (is_dir($rutaOrigen . '/' . $archivo)) {
      copiarArchivos($rutaOrigen . '/' . $archivo, $rutaDestino . '/' . $archivo);
    } else {
      // Si es un archivo, copiarlo en la carpeta correspondiente con el mismo nombre
      $rutaCarpetaDestino = $rutaDestino . '/' . dirname($archivo);
      if (!file_exists($rutaCarpetaDestino)) {
        mkdir($rutaCarpetaDestino, 0777, true);
      }
      
      copy($rutaOrigen . '/' . $archivo, $rutaCarpetaDestino . '/' . basename($archivo));
    }
  }
}


// Llamar a la función para copiar los archivos de la carpeta especificada
copiarArchivos('./Tema7', '../copia');

?>
