<?php
include 'includes/session.php';

if (isset($_POST['id'])) {
	$id = $_POST['id'];

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT *, products.id AS prodid, products.name AS prodname, products.discount AS proddiscount, products.color AS prodcolor, products.brand_id AS prodbrand, subcategory.name AS catname, brands.brand_name AS brandname FROM products LEFT JOIN subcategory ON subcategory.id=products.subcategory_id LEFT JOIN brands ON brands.id=products.brand_id WHERE products.id=:id");
	$stmt->execute(['id' => $id]);
	$row = $stmt->fetch();

	$pdo->close();

	echo json_encode($row);
}
