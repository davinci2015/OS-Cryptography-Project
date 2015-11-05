<?php 
include 'File.php';

$files = array('/keys/secret-key.txt', '/keys/public-key.txt', '/keys/private-key.txt', '/file1-encrypted.txt', '/file1-decrypted.txt', '/file2-encrypted.txt', '/file2-decrypted.txt', '/file3-hash.txt', '/file3-digital-signature.txt');
File::CleanFiles($files);
?>
