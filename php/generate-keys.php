<?php 
include 'File.php';
include 'vendors/Crypt/RSA.php';
include 'vendors/Crypt/Random.php';
include 'vendors/Math/BigInteger.php';

$rsa = new Crypt_RSA();

$secretKey      = md5(uniqid(rand(), true));
$asymmetricKeys = $rsa->createKey(2048);


$secretKeyFile  = new File('/keys/secret-key.txt');
$publicKeyFile  = new File('/keys/public-key.txt');
$privateKeyFile = new File('/keys/private-key.txt');


$secretKeyFile->WriteFile( $secretKey );
$publicKeyFile->WriteFile( $asymmetricKeys['publickey'] );
$privateKeyFile->WriteFile( $asymmetricKeys['privatekey'] );


?>
