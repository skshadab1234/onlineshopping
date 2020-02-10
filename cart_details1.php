	<?php
	include 'includes/session.php';
	$conn = $pdo->open();

	$output = '';

	if (isset($_SESSION['user'])) {
		if (isset($_SESSION['cart'])) {
			foreach ($_SESSION['cart'] as $row) {
				$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM cart WHERE user_id=:user_id AND product_id=:product_id");
				$stmt->execute(['user_id' => $user['id'], 'product_id' => $row['productid']]);
				$crow = $stmt->fetch();
				if ($crow['numrows'] < 1) {
					$stmt = $conn->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)");
					$stmt->execute(['user_id' => $user['id'], 'product_id' => $row['productid'], 'quantity' => $row['quantity']]);
				} else {
					$stmt = $conn->prepare("UPDATE cart SET quantity=:quantity WHERE user_id=:user_id AND product_id=:product_id");
					$stmt->execute(['quantity' => $row['quantity'], 'user_id' => $user['id'], 'product_id' => $row['productid']]);
				}
			}
			unset($_SESSION['cart']);
		}

		try {
			$total = 0;
			$stmt = $conn->prepare("SELECT *, cart.id AS cartid FROM cart LEFT JOIN products ON products.id=cart.product_id WHERE user_id=:user");
			$stmt->execute(['user' => $user['id']]);
			foreach ($stmt as $row) {
				$image = (!empty($row['photo'])) ? 'images/' . $row['photo'] : 'images/noimage.jpg';
				$subtotal = $row['price'] * $row['quantity'];
				$total += $subtotal;
				$order = $total * ($row['old_price'] - $row['price']) /  100;
				$order1 = $total - $order;
				$delivery = 15.00;
				$delivery1 = $order1 + $delivery;
				$output .= "
				<div class='row'>
					<div class='col-xs-4  col-lg-6'>
						<img src='" . $image . "' class=\"img-responsive\">
					</div>
						<div class='col-xs-8 col-lg-8'>
							<div>
								<p>
								<span style=\"font-weight:bold;\">
								<a style=\"font-size:12px;color:grey;\" href='product.php?product=" . $row['slug'] . "'>" . $row['brand'] . "</a>
								</span>
								<a style=\"font-size:12px;text-overflow: ellipsis;color:#000;white-space: nowrap;width: 229px;overflow: hidden;display: block;\" href='product.php?product=" . $row['slug'] . "'>" . $row['name'] . "</a>
								<h5>Quantity : " . $row['quantity'] . "</h5>
								<span style=\"font-weight:bold;color:grey\">Rs. " . number_format($row['price'] * 71.50, 2) . " /- Only</span>
								</p>
							</div>
					</div>
				</div>
	
	";
			}
			$output .= "
	<div class='container-fluid' style='position: relative;margin: 0;top: 0;padding: 20px;right: -10px;'>
	<h5 style='color: #000;font-weight: bold;font-family: calibri;font-size: 18px;text-align: right;width: 100%;'>Grand Total : RS " . number_format($delivery1 * 71.50, 2) . "</h5>
	</div>

	";
		} catch (PDOException $e) {
			$output .= $e->getMessage();
		}
	} else {

		$output = '';
		if (count($_SESSION['cart']) != 0) {
			$total = 0;
			foreach ($_SESSION['cart'] as $row) {
				$stmt = $conn->prepare("SELECT *, products.name AS prodname, category.name AS catname FROM products LEFT JOIN category ON category.id=products.category_id WHERE products.id=:id");
				$stmt->execute(['id' => $row['productid']]);
				$product = $stmt->fetch();
				$image = (!empty($product['photo'])) ? 'images/' . $product['photo'] : 'images/noimage.jpg';
				$subtotal = $product['price'] * $row['quantity'];
				$total += $subtotal;
				$output .= "<div class=\"container-fluid\" style='margin:10px;'>
				<div class='row'>
					<div class='col-xs-4  col-lg-6'>
						<img src='" . $image . "' class=\"img-responsive\">
					</div>
						<div class='col-xs-8 col-lg-8'>
							<div>
								<p>
								<span style=\"font-weight:bold;\">
								<a style=\"font-size:12px;color:grey;\" href='product.php?product=" . $product['slug'] . "'>" . $product['brand'] . "</a>
								</span>
								<a style=\"font-size:12px;text-overflow: ellipsis;color:#000;white-space: nowrap;width: 229px;overflow: hidden;display: block;\" href='product.php?product=" . $product['slug'] . "'>" . $product['prodname'] . "</a>
								<h5>Quantity : " . $row['quantity'] . "</h5>
								<span style=\"font-weight:bold;color:grey\">Rs. " . number_format($product['price'] * 71.50, 2) . " /- Only</span>
								</p>
							</div>
					</div>
				</div>
			</div>";
			}
		} else {
			$output .= "
	<div class=\"container-fluid\" align=\"center\"><img src=\"images/cartempty.png\" class=\"img-responsive\" width='550px' height='500px'>
	</div>
	";
		}
	}
	$pdo->close();
	echo json_encode($output);

	?>


