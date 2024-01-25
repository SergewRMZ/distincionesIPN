<?php
    $folderPath = dirname($_SERVER['SCRIPT_NAME']);
    $urlPath = $_SERVER['REQUEST_URI'];
    $url = substr($urlPath, strlen($folderPath)); 

    // echo $folderPath . '<br>';
    // echo $urlPath . ' <br>';
    // echo $url . '<br>';

    define ('URL_BASE', $folderPath);
    define ('URL', $url);
?>