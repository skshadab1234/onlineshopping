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
		$stmt = $conn->prepare("SELECT *, cart.id AS cartid FROM cart  LEFT JOIN products ON products.id=cart.product_id LEFT JOIN brands on brands.id = products.brand_id WHERE user_id=:user");
		$stmt->execute(['user' => $user['id']]);
		foreach ($stmt as $row) {
			$image = (!empty($row['photo'])) ? 'images/allproduct/' . $row['photo'] : 'images/noimage.jpg';
			$subtotal = $row['price'] * $row['quantity'];
			$total += $subtotal;
			$old_p = $row['old_price'] * $row['quantity'];
			
			$output .= "
				<div class='container-fluid box' style='padding:10px;border:2px solid #f5f5f6' >
				<div class='row'>
					<div class='col-xs-4 col-md-2 col-lg-2'>
						<img src='" . $image . "' class=\"img-responsive\" width='150px'>
					</div>
						<div class='col-xs-8 col-lg-8'>
							<div>
								<p>
								<span style=\"font-weight:bold;\">
								<a style=\"font-size:12px;color:grey;\" href='product?product=" . $row['slug'] . "'>" . $row['brand_name'] . "</a>
								</span>
								<a style=\"font-size:12px;text-overflow: ellipsis;color:#000;white-space: nowrap;width: 100%;overflow: hidden;display: block;\" href='product?product=" . $row['slug'] . "'>" . $row['name'] . "</a>
								</p>
								<a href = '' data-toggle='modal' data-target='#quantity'>Qty : ".$row['quantity']."</a>
							</div>
							</div>
							<div class='col-xs-4 col-md-2 col-lg-2'>
							<span style=\"font-weight:bold;color:#000;\">₹ " . number_format($subtotal, 2) . "</span>
							<h5 style=\"font-size:12px;color:grey\"><s>₹ " . number_format($old_p, 2) . "</s></h5>
					</div>
				</div>		
					<div class='container-fluid' style='padding-top: 10px;text-align: center;margin-top: 10px'>
						<div class='col-xs-12 col-mg-6 col-lg-6'>
						<div class='col-xs-6'>
							<button type='button' data-id='" . $row['cartid'] . "' style='color: grey;font-size: 16px;font-family: calibri;text-transform:uppercase;font-weight:bold;letter-spacing:1px;background: none;border: none;outline: none;' class='btn-flat cart_delete'>Remove</a>
						</div>
						<div class='col-xs-6'>
						<button type='button' data-id='" . $row['cartid'] . "' style='color: grey	;font-size: 16px;font-family: calibri;text-transform:uppercase;font-weight:bold;letter-spacing:1px;background: none;border: none;outline: none;' class='btn-flat cart_delete'>WISHLIST</a>
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
				<div style='width:100%;margin: 20% auto;text-align:center;'>
				<a href='index'><button style='padding: 10px;border-radius: 2px;background: none;border: 1px solid deeppink;color: deeppink;letter-spacing: 1px;'><i class='fa fa-cart-plus'></i><span style='padding: 10px;font-size: 16px;line-height: 37px;font-weight: 700;'>Start Shopping</span></button></a>
			</div>";
		}


		$output .= "
			<h5 id = 'total_b' style='padding: 10px;color: #0f0f0f;font-size: 2vh;text-align: right;background: aliceblue;border: 1px solid snow;box-shadow: 5px -2px 23px -16px;'>Bag Total : ₹ " . number_format($total, 2) . "</h5>";
	} catch (PDOException $e) {
		$output .= $e->getMessage();
	}
} else {
	if (count($_SESSION['cart']) != 0) {
		$total = 0;
		foreach ($_SESSION['cart'] as $row) {
			$stmt = $conn->prepare("SELECT *, products.name AS prodname, products.photo As photo, category.name AS catname FROM products LEFT JOIN brands on brands.id = products.brand_id LEFT JOIN category ON category.id=products.category_id WHERE products.id=:id");
			$stmt->execute(['id' => $row['productid']]);
			$product = $stmt->fetch();
			$image = (!empty($product['photo'])) ? 'images/allproduct/' . $product['photo'] : 'images/noimage.jpg';
			$subtotal = $product['price'] * $row['quantity'];
			$total += $subtotal;
			$output .= "
			<div class='container-fluid box' style='padding:10px;border:none;margin:10px 0' >
				<div class='row'>
					<div class='col-xs-4 col-md-2 col-lg-2'>
						<img src='" . $image . "' class=\"img-responsive\" width='150px'>
					</div>
						<div class='col-xs-8 col-lg-8'>
						<div>
								<p>
								<span style=\"font-weight:bold;\">
								<a style=\"font-size:12px;color:grey;\" href='product?product=" . $product['slug'] . "'>" . $product['brand_name'] . "</a>
								</span>
								<a style=\"font-size:12px;text-overflow: ellipsis;color:#000;white-space: nowrap;width: 100%;overflow: hidden;display: block;\" href='product?product=" . $product['slug'] . "'>" . $product['prodname'] . "</a>
								</p>
								<a href = '' data-toggle='modal' data-target='#quantity'>Qty : " . $row['quantity'] . "</a>
							</div>
							</div>
							<div class='col-xs-4 col-md-2 col-lg-2'>
							<span style=\"font-weight:bold;color:#000;\">₹ " . number_format($subtotal, 2) . "</span>
					</div>
					</div>
				</div>		
					<div class='container-fluid' style='padding-top: 10px;text-align: center;margin-top: 10px'>
						<div class='col-xs-12 col-mg-6 col-lg-6'>
						<div class='col-xs-6'>
							<button type='button' data-id='" . $row['productid'] . "' style='color: grey;font-size: 16px;font-family: calibri;text-transform:uppercase;font-weight:bold;letter-spacing:1px;background: none;border: none;outline: none;' class='btn-flat cart_delete'>Remove</a>
						</div>
						<div class='col-xs-6'>
						<button type='button' data-id='" . $row['productid'] . "' style='color: grey;font-size: 16px;font-family: calibri;text-transform:uppercase;font-weight:bold;letter-spacing:1px;background: none;border: none;outline: none;' class='btn-flat cart_delete'>WISHLIST</a>
						</div>
						</div>
						</div>
				</div>
				</div>
	";
		}
		$output .= "
			<h5 style='padding: 10px;color: #0f0f0f;font-size: 2vh;text-align: right;background: aliceblue;border: 1px solid snow;box-shadow: 5px -2px 23px -16px;'>Bag Total : ₹ " . number_format($total, 2) . "</h5>";
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
