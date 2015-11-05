<?php 
include 'File.php';
include 'vendors/Crypt/RSA.php';
include 'vendors/Crypt/Random.php';
include 'vendors/Math/BigInteger.php';

$dat                  = new File('/file3.txt');
$privKeyFile          = new File('/keys/private-key.txt');
$digitalSignatureFile = new File('/file3-digital-signature.txt');

$fileName = $dat->getFileName();
$privKey  = $privKeyFile->ReadFile();
$hash     = hash_file('sha256', $fileName);

if(!empty($privKey))
{
	$rsa = new Crypt_RSA();
	$rsa->loadKey($privKey);
	$encrypted = $rsa->encrypt($hash);

	$digitalSignatureFile->WriteFile($encrypted);
}
else http_response_code(403);
?>
