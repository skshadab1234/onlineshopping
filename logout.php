<?php
	session_start();
	session_destroy();

	header('location: cart_view.php');
?>