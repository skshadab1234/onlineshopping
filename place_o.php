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
			$old_p = 0;
			$discount = 0;
			$disc_t = 0;
			$stmt = $conn->prepare("SELECT *, cart.id AS cartid FROM cart LEFT JOIN products ON products.id=cart.product_id WHERE user_id=:user");
			$stmt->execute(['user' => $user['id']]);
			foreach ($stmt as $row) {
				$image = (!empty($row['photo'])) ? 'images/' . $row['photo'] : 'images/noimage.jpg';
				$subtotal = $row['price'] * $row['quantity'];
				$old_p = $row['old_price'] * $row['quantity'];
				$total += $subtotal;
				$discount += $old_p;
				$disc_t = $discount - $total;
				$order_t = $discount - $disc_t;
				$o_t = $order_t - $disc_t;
				$delivery = 50;
				$grand_t = $o_t + $delivery;
				$output = " 
				<div id='place_o1' style=\"\" class=\"pull-center\">
					<div class=\"row\">
					<div class=\"col-sm-12\">
				<div class=\"container-fluid\" style=\"padding: 10px;width: 100%;\">
				<span><h5 style=\"text-transform: uppercase;font-weight:600;font-family: 'Alata', sans-serif;letter-spacing: 1px;font-size: 14px;color:grey\">PRICE DETAIL</h5></span>
				</div>
				<table class=\"table table-bordered\" style=\"width:100%;color:black;padding:4px;font-size:12px;font-weight:lighter;font-family:calibri\">
				<tbody>
				<tr>
				<td>Bag total</td>
				<td><span class=\"pull-right\">₹ " . number_format($order_t, 2) . "</span><td>
				</tr>
				<tr>
				<td>Bag Discount</td>
				<td><span class=\"pull-right\" style='color:green'>₹ " . number_format($disc_t, 2) . "</span><td>
				</tr>
				<tr>
				<td>Order Total</td>
				<td ><span class=\"pull-right\">₹ " . number_format($o_t, 2) . "</span><td>
				</tr>
				<tr>
				<td>Delivery Charge</td>
				<td ><span class=\"pull-right\">₹ " . number_format($delivery, 2) . "</span><td>
				</tr>
				<tr>
				<td style='font-weight:700;font-size:16px'>Total</td>
				<td ><span class=\"pull-right\" style='font-size:16px;font-weight:700'>₹ " . number_format($grand_t) . "</span><td>
				</tr>
				</tbody>
				</table>
				</div>
				</div>
				<a href=\"payment.php\">
				<button type=\"button\" id='place_o' class=\"form-control button-base-button\">Place Order</button>
				</a>
				</div>
				";
			}
				$output .= "";
		} catch (PDOException $e) {
			$output .= $e->getMessage();
		}
	} else {
		$output .= "
<div class=\"container\" id='checkout' style=\"margin:100px 100px\">
<a href=\"login.php\"><button class=\"btn btn-flat btn-primary\">Sign up to checkout</button>
</a>
</div>
";
	}
	$pdo->close();
	echo json_encode($output);
	?>