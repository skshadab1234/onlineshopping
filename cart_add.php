<?php
include 'includes/session.php';

$conn = $pdo->open();

$output = array('error' => false);

$id = $_POST['id'];
$quantity = $_POST['quantity'];
$size = $_POST['size'];
$color = $_POST['color'];
if (isset($_SESSION['user'])) {
	$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM cart WHERE user_id=:user_id AND product_id=:product_id");
	$stmt->execute(['user_id' => $user['id'], 'product_id' => $id]);
	$row = $stmt->fetch();
	if ($row['numrows'] < 1) {
		try {
			$stmt = $conn->prepare("INSERT INTO cart (user_id, product_id, quantity, size, color) VALUES (:user_id, :product_id, :quantity, :size, :color)");
			$stmt->execute(['user_id' => $user['id'], 'product_id' => $id, 'quantity' => $quantity, 'size' => $size, 'color' => $color]);
			$output['message'] = 'Item added to cart <a href="cart_view">View Cart</a>';
		} catch (PDOException $e) {
			$output['error'] = true;
			$output['message'] = $e->getMessage();
		}
	} else {
		$output['error'] = true;
		$output['message'] = 'Product already in cart <a href="cart_view" style="color:steelblue">View Cart</a>';
	}
} else {
	if (!isset($_SESSION['cart'])) {
		$_SESSION['cart'] = array();
	}

	$exist = array();

	foreach ($_SESSION['cart'] as $row) {
		array_push($exist, $row['productid']);
	}

	if (in_array($id, $exist)) {
		$output['error'] = true;
		$output['message'] = 'Product already in cart <a href="login" style="color:steelblue">Login</a>';
	} else {
		$data['productid'] = $id;
		$data['quantity'] = $quantity;

		if (array_push($_SESSION['cart'], $data)) {
			$output['message'] = 'Item added to cart <a href="login" style="color:steelblue">Login</a>';
		} else {
			$output['error'] = true;
			$output['message'] = 'Cannot add item to cart';
		}
	}
}

$pdo->close();
echo json_encode($output);
