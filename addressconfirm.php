<?php

$con = mysqli_connect('localhost', 'root', '', 'ecomm');

extract($_POST);

if (isset($_POST['submit'])) {

	$q = " insert into user_order (country,state,district,streetaddress,addresstype) values ('$country','$state','$state','$district','$streetaddress','$addresstype') ";

	$query = mysqli_query($con, $q);
	header('Location:pay');
}
