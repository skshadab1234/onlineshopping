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
				<div class='container-fluid' style='margin-top:10px;background:#fff;padding:10px'>
				<div class='row'>
					<div class='col-xs-4'>
						<img src='" . $image . "' class=\"img-responsive\" width='150px'>
					</div>
						<div class='col-xs-8 col-lg-8'>
							<div>
								<p>
								<span style=\"font-weight:bold;\">
								<a style=\"font-size:12px;color:grey;\" href='product.php?product=" . $row['slug'] . "'>" . $row['brand'] . "</a>
								
								</span>
								<span>" . $row['old_price'] . "</span>
								<a style=\"font-size:12px;text-overflow: ellipsis;color:#000;white-space: nowrap;width: 229px;overflow: hidden;display: block;\" href='product.php?product=" . $row['slug'] . "'>" . $row['name'] . "</a>

								<span style=\"font-weight:bold;color:grey\">₹ " . number_format($subtotal , 2) . " /- Only</span>
								</p>
							</div>
					</div>
				</div>
				<div>
					<div class='row' style='padding: 10px;text-align: center;border-top: 1px solid grey;width: 100%;margin: 10px;'>
						<div class='col-xs-6'>
							<button type='button' data-id='" . $row['cartid'] . "' style='color: #010101;font-size: 16px;font-family: calibri;text-transform:uppercase;font-weight:bold;letter-spacing:1px;background: none;border: none;outline: none;' class='btn-flat cart_delete'>Remove</a>
						</div>
						<div class='col-xs-6'>
						<button type='button' data-id='" . $row['cartid'] . "' style='color: #010101;font-size: 16px;font-family: calibri;text-transform:uppercase;font-weight:bold;letter-spacing:1px;background: none;border: none;outline: none;' class='btn-flat cart_delete'>WISHLIST</a>
						</div>
					</div>
	</div>
				</div>
				</div>
	";
			}
			if ($total  >= 10000) {
				$output .= "
				<h5>Free Delivery</h5>				
				";
			}

			if ($total == 0) {
				$output .= "	
				<div style='margin: 50% auto;'>
				<a href='index.php'><button style='padding: 10px;border-radius: 2px;background: none;border: 1px solid deeppink;color: deeppink;letter-spacing: 1px;'><i class='fa fa-cart-plus'></i><span style='padding: 10px;font-size: 16px;line-height: 37px;font-weight: 700;'>Start Shopping</span></button></a>
			</div>";
			}


			$output .= "
			<h5 style='padding: 10px;color: #0f0f0f;font-size: 2vh;text-align: right;background: aliceblue;border: 1px solid snow;box-shadow: 5px -2px 23px -16px;'>Bag Total : ₹ " . number_format($delivery1 , 2) . "</h5>";
		} catch (PDOException $e) {
			$output .= $e->getMessage();
		}
	} else {
		if (count($_SESSION['cart']) != 0) {
			$total = 0;
			foreach ($_SESSION['cart'] as $row) {
				$stmt = $conn->prepare("SELECT *, products.name AS prodname, products.photo As photo, category.name AS catname FROM products LEFT JOIN category ON category.id=products.category_id WHERE products.id=:id");
				$stmt->execute(['id' => $row['productid']]);
				$product = $stmt->fetch();
				$image = (!empty($product['photo'])) ? 'images/' . $product['photo'] : 'images/noimage.jpg';
				$subtotal = $row['price'] * $row['quantity'];
				$total += $subtotal;
				$order = $total * ($row['old_price'] - $row['price']) /  100;
				$order1 = $total - $order;
				$delivery = 15.00;
				$delivery1 = $order1 + $delivery;
				$output .= "<div class=\"container-fluid\" style='margin:10px;background:#fff'>
				<div class='row'>
					<div class='col-xs-4'>
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
								<span style=\"font-weight:bold;color:grey\">₹ " . number_format($product['price'] , 2) . " /- Only</span>
								</p>
							</div>
					</div>
					<div>
					<div class='row' style='padding: 10px;text-align: center;border-top: 1px solid grey;'>
						<div class='col-xs-6'>
							<button type='button' data-id='" . $row['productid'] . "' style='color: #010101;font-size: 16px;font-family: calibri;text-transform:uppercase;font-weight:bold;letter-spacing:1px;background: none;border: none;outline: none;' class='btn-flat cart_delete'>Remove</a>
						</div>
						<div class='col-xs-6'>
						<button type='button' data-id='" . $row['productid'] . "' style='color: #010101;font-size: 16px;font-family: calibri;text-transform:uppercase;font-weight:bold;letter-spacing:1px;background: none;border: none;outline: none;' class='btn-flat cart_delete'>WISHLIST</a>
						</div>
					</div>
				</div>
			</div>
		</div>";
			}
			$output .= "
			<h5 style='padding: 10px;color: #0f0f0f;font-size: 2vh;text-align: right;background: aliceblue;border: 1px solid snow;box-shadow: 5px -2px 23px -16px;'>Bag Total : ₹ " . number_format($delivery1 , 2) . "</h5>";
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

	