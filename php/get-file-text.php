<?php 
include 'File.php';

$file = $_GET["file"];

$file = new File($file);

echo $file->ReadFile();
?>
