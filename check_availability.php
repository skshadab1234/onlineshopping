<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "ecomm";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

if (!empty($_POST["email"])) {
	$email = $_POST["email"];

	$result = mysqli_query($conn, "SELECT  email FROM  users WHERE  email='$email'");
	$count = mysqli_num_rows($result);
	if ($count > 0) {
		echo "<span style='color:red'> Email already exists .</span>";
		echo "<script>$('#submit').prop('disabled',true);</script>";
	} else {

		echo "<span style='color:green'> Email available for Registration .</span>";
		echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}
