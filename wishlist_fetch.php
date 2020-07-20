	<?php
	include 'includes/session.php';
	$conn = $pdo->open();

	$output = array('list' => '', 'count' => 0);
	if (isset($_SESSION['user'])) {
		try {
			$stmt = $conn->prepare("SELECT *,  products.name AS prodname, products.photo As photo, category.name AS catname FROM products LEFT JOIN wishlist ON products.id=wishlist.product_id  LEFT JOIN category ON category.id=products.category_id WHERE user_id=:user_id");
			$stmt->execute(['user_id' => $user['id']]);
			foreach ($stmt as $row) {
				$output['count']++;
				$image = (!empty($row['photo'])) ? 'images/allproduct/' . $row['photo'] : 'images/noimage.jpg';
				$productname = (strlen($row['prodname']) > 3) ? substr_replace($row['prodname'], '...', 18) : $row['prodname'];
				$output['list'] .= "
							<div class='maindiv'>
								<a href='product?product=" . $row['slug'] . "' >
								<div>
								<img src='" . $image . "' alt='User Image'>
								</div>
			                    <p style='font-size: 12px;'>" . $productname. "</p>
			                    <h5>&#8377; " . $row['price'] . " <span><s>&#8377; " . $row['old_price'] . " </s></span></h5>
							</a>
							<div class='hoverdiv'>
                             <input type='hidden'  value='".$row['product_id']."' id='rem_favoriate' name='id'>							
							<button type='button' onclick='remove_fav()'  id='" . $row['product_id'] . "'> <i class='favme fa fa-times' style='font-size:17px'></i></button>
							</div>
							</div>

							<hr>
					";
			}
		} catch (PDOException $e) {
			$output['message'] = $e->getMessage();
		}
}
	$pdo->close();
	echo json_encode($output);
