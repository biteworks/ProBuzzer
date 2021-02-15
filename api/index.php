<?php
require 'functions.php';

// Header
header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");

// Debugging
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

$basePath = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$filesDir = "sounds/";
$files = array();

$handle = opendir($filesDir);
if ($handle) {
    while (false !== ($file = readdir($handle))) {
        if ($file == '.' or $file == '..') continue;
        if(pathinfo($basePath . $file, PATHINFO_EXTENSION) == 'mp3'){
            $files[] = array( 
                "fileName" => cleanFileName($file),  
                "filePath" => $basePath . $file
            ); 
        }
    }
    closedir($handle);
}

echo json_encode($files, JSON_UNESCAPED_UNICODE);
?>