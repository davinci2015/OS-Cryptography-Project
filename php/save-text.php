<?php 
include 'File.php';

$postdata = file_get_contents("php://input");
$request  = json_decode($postdata);

$fileName = $request->fileName;
$file = new File($fileName);

$file->WriteFile($request->newText);
?>
