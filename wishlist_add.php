<?php
include 'includes/session.php';

$conn = $pdo->open();

$output = array('error' => false);

$id = $_POST['id'];
if (isset($_SESSION['user'])) {
	$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM wishlist WHERE user_id=:user_id AND product_id=:product_id");
	$stmt->execute(['user_id' => $user['id'], 'product_id' => $id]);
	$row = $stmt->fetch();
	if ($row['numrows'] < 1) {
		try {
			$stmt = $conn->prepare("INSERT INTO wishlist (user_id, product_id) VALUES (:user_id, :product_id)");
			$stmt->execute(['user_id' => $user['id'], 'product_id' => $id]);
			$output['message'] = 'Item added to wishlist <a href="cart_view.php">View Cart</a>';
		} catch (PDOException $e) {
			$output['message'] = $e->getMessage();
		}
	} else {
		$output['message'] = 'Product already in wishlist <a href="cart_view.php" style="color:steelblue">View Cart</a>';
	}
} else {
		$output['message'] = '<a href=/"login.php/">Login</p>';
}

$pdo->close();
echo json_encode($output);

