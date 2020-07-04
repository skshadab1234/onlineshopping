	<?php
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
			$stmt = $conn->prepare("SELECT *, cart.id AS cartid FROM cart LEFT JOIN products ON products.id=cart.product_id LEFT Join brands ON brands.id = products.brand_id WHERE user_id=:user");
			$stmt->execute(['user' => $user['id']]);
			foreach ($stmt as $row) {
				$image = (!empty($row['photo'])) ? 'images/allproduct/' . $row['photo'] : 'images/noimage.jpg';
				$subtotal = $row['price'] * $row['quantity'];
				$old_p = $row['old_price'] * $row['quantity'];
				$total += $subtotal;
				$discount += $old_p;
				$disc_t = $discount - $total;
				$order_t = $discount - $disc_t;
				$o_t = $order_t - $disc_t;
				$delivery = 50;
				$grand_t = $o_t + $delivery;
				echo  "
				<div class='container-fluid box' style='padding:10px;border:2px solid #f5f5f6' >
				<div class='row'>
					<div class='col-xs-4 col-md-2 col-lg-3'>
						<img src='" . $image . "' class=\"img-responsive\" width='100px'>
					</div>
						<div class='col-xs-8 col-lg-9' style='text-align:left'>
							<div>
								<p>
								<span style=\"font-weight:bold;\">
								<a style=\"font-size:12px;color:grey;\" href='product.php?product=" . $row['slug'] . "'>" . $row['brand_name'] . "</a>
								</span>
								<a style=\"font-size:12px;text-overflow: ellipsis;color:#000;white-space: nowrap;width: 100%;overflow: hidden;display: block;\" href='product.php?product=" . $row['slug'] . "'>" . $row['name'] . "</a>
								</p>
							<span style=\"font-weight:bold;color:#000;\">₹ " . number_format($subtotal, 2) . "</span>
							<span style=\"font-size:12px;color:grey\"><s>₹ " . number_format($old_p, 2) . "</s></span>
							Qty : ".$row['quantity']."
							</div>
							</div>
					</div>
					</div>
	";
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
				</div>
				";
			}
				$output .= "";
		} catch (PDOException $e) {
			$output .= $e->getMessage();
		}
	}
	$pdo->close();
	echo($output);
	?>



