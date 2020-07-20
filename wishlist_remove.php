<?php
	include 'includes/session.php';

	$conn = $pdo->open();

	$id = $_POST['id'];

	if(isset($_SESSION['user'])){
		try{
			$stmt = $conn->prepare("DELETE FROM wishlist WHERE product_id=:id");
			$stmt->execute(['id'=>$id]);
			$_SESSION['success'] = 'Deleted';
			
		}
		catch(PDOException $e){
			$_SESSION['error']= $e->getMessage();
		}
	}
	

	$pdo->close();
header("Location: index");