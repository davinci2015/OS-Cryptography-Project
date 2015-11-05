<?php 
include 'File.php';
include 'vendors/Crypt/TripleDES.php';
include 'vendors/Crypt/Random.php';
include 'vendors/Math/BigInteger.php';

$dat        = new File('/file1-encrypted.txt');
$datDecrypt = new File('/file1-decrypted.txt');
$key        = new File("/keys/secret-key.txt");

$text = $dat->ReadFile();
$key  = $key->ReadFile();

if(!empty($key))
{
	$tripleDES = new Crypt_TripleDES();
	$tripleDES->setKey($key);
	$decryptedText = $tripleDES->decrypt($text);

	$datDecrypt->WriteFile($decryptedText);
}
else http_response_code(403);
?>
