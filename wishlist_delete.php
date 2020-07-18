<?php
	include 'includes/session.php';

	$conn = $pdo->open();

	$id = $_POST['id'];
	if(isset($_SESSION['user'])){
		try{
			$stmt = $conn->prepare("DELETE FROM wishlist WHERE product_id=:id");
			$stmt->execute(['id'=>$id]);
			$output['message'] = 'Deleted';
			
		}
		catch(PDOException $e){
			$output['message'] = $e->getMessage();
		}
	}
	else{
		foreach($_SESSION['cart'] as $key => $row){
			if($row['productid'] == $id){
				unset($_SESSION['cart'][$key]);
				$output['message'] = 'Deleted';
			}
		}
	}

	$pdo->close();
