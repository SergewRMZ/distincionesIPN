<?php
  spl_autoload_register (function ($class) {
    // $classFile = str_replace('\\', '/', $class) . '.php';
    $classFile = $class . '.php';
    $folderPath = __DIR__ . DIRECTORY_SEPARATOR . $classFile;
    if (file_exists($folderPath)) {
      require_once $folderPath;
      echo '<br>Archivo ' . $folderPath . ' cargado<br>';
    }

    else {
      echo 'El archivo no existe';
    }
  });