<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecomm";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

$product_name = $_POST['product_name'];
$price = $_POST['price'];
$city = $_POST['city'];
$state = $_POST['state'];
$pincode = $_POST['pincode'];
$country = $_POST['country'];
$streetaddress = $_POST['streetaddress'];
$addresstype = $_POST['addresstype'];
try {

	$sql = ("INSERT INTO details (address) VALUES (" . $price . ")");
} catch (Exception $e) {
	echo "There is some problem in connection: " . $e->getMessage();
}

header("location:payment");
