<?php

// cart total page
include 'includes/session.php';

if (isset($_SESSION['user'])) {
	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT * FROM cart LEFT JOIN products on products.id=cart.product_id WHERE user_id=:user_id");
	$stmt->execute(['user_id' => $user['id']]);

	$total = 0;
	foreach ($stmt as $row) {
		$subtotal = $row['price'] * $row['quantity'];
		$total += $subtotal;
		$order = $total * ($row['old_price'] - $row['price']) /  100;
		$order1 = $total - $order;
		$delivery = 15.00;
		$delivery1 = $order1 + $delivery;
	}

	$pdo->close();

	echo json_encode($delivery1);
}
