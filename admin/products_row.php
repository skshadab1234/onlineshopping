<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, products.id AS prodid, products.name AS prodname, products.discount AS proddiscount, products.color AS prodcolor, products.brand AS prodbrand, category.name AS catname FROM products LEFT JOIN category ON category.id=products.category_id WHERE products.id=:id");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();
		
		$pdo->close();

		echo json_encode($row);
	}
?>