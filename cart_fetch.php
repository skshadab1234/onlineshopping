<?php
include 'includes/session.php';
$conn = $pdo->open();

$output = array('list' => '', 'count' => 0);

if (isset($_SESSION['user'])) {
	try {
		$stmt = $conn->prepare("SELECT *, products.name AS prodname, products.photo As photo, category.name AS catname FROM cart LEFT JOIN products ON products.id=cart.product_id LEFT JOIN category ON category.id=products.category_id WHERE user_id=:user_id");
		$stmt->execute(['user_id' => $user['id']]);
		foreach ($stmt as $row) {
			$output['count']++;
			$image = (!empty($row['photo'])) ? 'images/allproduct/' . $row['photo'] : 'images/noimage.jpg';
			$productname = (strlen($row['prodname']) > 10) ? substr_replace($row['prodname'], '...', 28) : $row['prodname'];
			$output['list'] .= "
					<li>
						<a href='product.php?product=" . $row['slug'] . "'>
<div class='pull-left'>
	<img src='" . $image . "' class='img-circle' alt='User Image' style=\"width:50px;height:50px;box-shadow: 0px 2px 0px 0px red\">
							</div>
							<h4>
		                        <small>&times; " . $row['quantity'] . "</small>
		                    </h4>
		                    <p>" . $productname . "</p>
						</a>
					</li>
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
					<li>
						<a href='product.php?product=" . $product['slug'] . "'>
							<div class='pull-left'>
								<img src='" . $image . "' class='img-circle' alt='User Image'>
							</div>
							<h4>
		                        <b>" . $product['catname'] . "</b>
		                        <small>&times; " . $row['quantity'] . "</small>
		                    </h4>
		                    <p style='white-space: nowrap;
							overflow: hidden;width: 200px;text-overflow: ellipsis;'>" . $product['prodname'] . "</p>
						</a>
					</li>
				";
		}
	}
}

$pdo->close();
echo json_encode($output);
