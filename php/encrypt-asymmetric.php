<?php 
include 'File.php';
include 'vendors/Crypt/RSA.php';
include 'vendors/Crypt/Random.php';
include 'vendors/Math/BigInteger.php';

$dat        = new File('/file2.txt');
$datEncrypt = new File('/file2-encrypted.txt');
$pubKeyFile = new File("/keys/public-key.txt");

$text   = $dat->ReadFile();
$pubKey = $pubKeyFile->ReadFile();

if(!empty($pubKey))
{
	$rsa = new Crypt_RSA();
	$rsa->loadKey($pubKey);
	$encryptedText = $rsa->encrypt($text);

	$datEncrypt->WriteFile($encryptedText);
}
else http_response_code(403);
?>
