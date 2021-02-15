<?php
function cleanFileName($fileName){
    $fileNameParts = explode(".", $fileName);
    $cleanFileName = ucfirst(str_replace("-", " ", $fileNameParts[0]));
    return $cleanFileName;
}
?>