<?php
include 'includes/session.php';
$conn = $pdo->open();

$output = array('list' => '', 'count' => 0);

if (isset($_SESSION['user'])) {
	try {
		$stmt = $conn->prepare("SELECT *,  products.name AS prodname, products.photo As photo, category.name AS catname FROM cart LEFT JOIN products ON products.id=cart.product_id LEFT JOIN category ON category.id=products.category_id WHERE user_id=:user_id");
		$stmt->execute(['user_id' => $user['id']]);
		foreach ($stmt as $row) {
			$output['count']++;
			$image = (!empty($row['photo'])) ? 'images/allproduct/' . $row['photo'] : 'images/noimage.jpg';
			$productname = (strlen($row['prodname']) > 3) ? substr_replace($row['prodname'], '...', 15) : $row['prodname'];
			$output['list'] .= "


						<a href='product.php?product=" . $row['slug'] . "' >
							<div class='pull-left container-fluid' style='padding:0'>
							<img src='" . $image . "' alt='User Image'>
							</div>
							<h4>
		                        <small style='position: relative;right: -137px;top: -215px;background: lightcoral;padding: 5px;color: #fff;border-radius: 10px;'>&times; " . $row['quantity'] . "</small>
		                    </h4>
							<div class='container-fluid' >
		                    <p style='margin-top: -10px;'>" . $productname. "</p>
		                    <h5>&#8377; " . $row['price'] . " <span><s>&#8377; " . $row['old_price'] . " </s></span></h5>
							</div>
						</a>
						<hr>
				";
		}
	} catch (PDOException $e) {
		$output['message'] = $e->getMessage();
	}
} else {
	if (!isset($_SESSION['cart'])) {
		$_SESSION['cart'] = array();
	}

	if (empty($_SESSION['cart'])) {
		$output['count'] = 0;
	} else {
		foreach ($_SESSION['cart'] as $row) {
			$output['count']++;
			$stmt = $conn->prepare("SELECT *, products.name AS prodname, products.photo As photo, category.name AS catname FROM products LEFT JOIN category ON category.id=products.category_id WHERE products.id=:id");
			$stmt->execute(['id' => $row['productid']]);
			$product = $stmt->fetch();
			$image = (!empty($product['photo'])) ? 'images/allproduct/' . $product['photo'] : 'images/noimage.jpg';
			$output['list'] .= "
						<a href='product.php?product=" . $product['slug'] . "' style='width: 116px;'>
							<div class='pull-left container'>
								<img src='" . $image . "' class='img-circle' alt='User Image'>
							</div>
							<h4>
		                        <small style='position: relative;right: -137px;top: -215px;background: lightcoral;padding: 5px;color: #fff;border-radius: 10px;'>&times; " . $row['quantity'] . "</small>
		                    </h4>
		                    <p style='white-space: nowrap;overflow: hidden;font-size: 12px;text-overflow: ellipsis;margin-top: -10px;'>" . $product['prodname'] . "</p>
		                    <h5>&#8377; " . $product['price'] . " <span><s>&#8377; " . $product['old_price'] . " </s></span></h5>
						</a>
						<hr>
				";
		}
	}
}

$pdo->close();
echo json_encode($output);
