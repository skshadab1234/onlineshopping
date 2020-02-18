<body>
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
			$row = 0;
			$order = 0;
			$order1 = 0;
			$delivery1 = 0;
			$delivery = 0;
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
	
";
			}
			$output .= "
<div style=\"padding:20px;border:1px solid #ddd;margin-top:80px;width:100%;display:block;box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);\" class=\"pull-center\">
	<div class=\"row\">
	<div class=\"col-sm-12\">
<div class=\"container\" style=\"padding: 10px;width: 100%;\">
<span><h5 style=\"text-transform: uppercase;font-weight:600;font-family: 'Alata', sans-serif;letter-spacing: 1px;font-size: 16px;color:grey\">PRICE DETAIL
<div style=\"position:relative\"><input type=\"button\" class=\"button-base-button pull-right\" style=\"position:absolute;right:-10px;top:-40px\" value=\"UPDATE\" style=\"margin:-10px\" onClick=\"document.location.reload(true)\"></h5></span>
</div>
<table class=\"table table-bordered\" style=\"width:100%;color:black;padding:4px\">
<thead>
<tr>
<td>Bag total</td>
<td ><span class=\"pull-right\">₹ " . number_format($total, 2) . "</span><td>
</tr>
<tr>
<td>Bag Discount</td>
<td ><span class=\"pull-right\">₹ " . number_format($order, 2) . "</span><td>
</tr>
<tr>
<td>Order Total</td>
<td style=\"color:green\"><span class=\"pull-right\">₹ " . number_format($order1, 2) . "</span>
 <td>
</tr>
<tr>
<td>Delivery Charges</td>
<td  style=\"color:green\"><span class=\"pull-right\">₹ " . number_format($delivery, 2) . "</span>
 <td>
</tr>
<tr>
<td style=\"font-weight:600;font-size:16px\">Grand Total</td>
<td style=\"font-weight:600;font-size:16px\"><span class=\"pull-right\">₹ " . number_format($delivery1, 2) . "</span>
 <td>
</tr>
</thead>
</table>
</div>
</div>	
<div style=\"text-align:right\">
<h5 style=\"padding:20px\"><b> </b></h5>
</div>
</div>
	<a href=\"payment.php\">
	<button type=\"button\" class=\"form-control button-base-button\">Place Order</button>
	</a>
";
		} catch (PDOException $e) {
			$output .= $e->getMessage();
		}
	} else {
		$output .= "
<div class=\"container\" style=\"margin:100px 100px\">
<a href=\"login.php\"><button class=\"btn btn-flat btn-primary\">Sign up to checkout</button>
</a>
</div>
";
	}



	$pdo->close();
	echo ($output);

	?>

</body>