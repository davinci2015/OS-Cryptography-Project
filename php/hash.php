<?php 
include 'File.php';
$dat = new File('/file3.txt');
$hashFile = new File('/file3-hash.txt');

$fileName = $dat->getFileName();

$hash = hash_file('sha256', $fileName);

$hashFile->WriteFile($hash);
?>
