<?php 
include 'File.php';
include 'vendors/Crypt/RSA.php';
include 'vendors/Crypt/Random.php';
include 'vendors/Math/BigInteger.php';

$dat           = new File('/file3.txt');
$signatureFile = new File('/file3-digital-signature.txt');
$publicKeyFile = new File("/keys/public-key.txt");

$signature = $signatureFile->ReadFile();
$publicKey = $publicKeyFile->ReadFile();

if(!empty($publicKey))
{
	$fileName = $dat->getFileName();
	$hash = hash_file('sha256', $fileName);
	
	$rsa = new Crypt_RSA();
	$rsa->loadKey($publicKey);
	$decryptedHash = $rsa->decrypt($signature);

	echo $hash == $decryptedHash ? 'valid' : 'alert';
}
else http_response_code(403);

?>
