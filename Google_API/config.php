<?php
	session_start();
	require_once "API/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("");
	$gClient->setClientSecret("");
	$gClient->setApplicationName("Technical Suneja");
	$gClient->setRedirectUri("http://localhost:81/Google_API/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");	
	$con = new mysqli('localhost', 'root','' ,'test');
    if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}	
?>