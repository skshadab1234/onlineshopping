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
				 <h2>Summary</h2>
                <ul class=\"summary-table\">
                    <li><span>Bag total:</span> <span>₹ " . number_format($order_t, 2) . "</span></li>
                    <li><span>Bag Discount:</span> <span>₹ " . number_format($disc_t, 2) . "</span></li>
                    <li><span>Order Total:</span> <span>₹ " . number_format($o_t, 2) . "</span></li>
                    <li><span>Delivery Charge:</span> <span>₹ " . number_format($delivery, 2) . "</span></li>
                    <li><span>Total:</span> <span>₹ " . number_format($grand_t) . "</span></li>
                </ul>
                <div class=\"checkout-btn mt-100\">
                    <a href=\"payment\" class=\"buttons\" style='padding: 10px;text-transform: uppercase;font-size: 15px;background: orange;color: #fff;font-weight: 700;letter-spacing: 1px;box-shadow: 6px 6px 41px -8px #313131;'>check out</a>
                    <a href=\"cart_view\" class=\"buttons\" style='padding: 10px;text-transform: uppercase;font-size: 15px;background: green;color: #fff;font-weight: 700;letter-spacing: 1px;box-shadow: 6px 6px 41px -8px #313131;border-radius: 10px;margin-left:24px'>Edit Cart</a>
                </div>
				";
			}
				$output .= "";
		} catch (PDOException $e) {
			$output .= $e->getMessage();
		}
	} else {
		$path = "payment";
		if ($path=="payment") {
			 $output .= ' saa';
		}else{
		$output .= '

		<div class="checkout-btn mt-100">
           <a href="login" class="btn essence-btn">Sign up to checkout</a>
         </div>';
     }
	}
	$pdo->close();
	echo json_encode($output);
	?>