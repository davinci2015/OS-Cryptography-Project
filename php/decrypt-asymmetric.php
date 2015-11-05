<?php 
include 'File.php';
include 'vendors/Crypt/RSA.php';
include 'vendors/Crypt/Random.php';
include 'vendors/Math/BigInteger.php';

$dat         = new File('/file2-encrypted.txt');
$datDecrypt  = new File('/file2-decrypted.txt');
$privKeyFile = new File("/keys/private-key.txt");

$text = $dat->ReadFile();
$privKey = $privKeyFile->ReadFile();

if(!empty($privKey))
{
	$rsa = new Crypt_RSA();
	$rsa->loadKey($privKey);
	$decryptedText = $rsa->decrypt($text);

	$datDecrypt->WriteFile($decryptedText);
}
else http_response_code(403);
?>
