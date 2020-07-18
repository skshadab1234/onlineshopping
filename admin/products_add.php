<?php
include 'includes/session.php';
include 'includes/slugify.php';

if (isset($_POST['add'])) {
	$name = $_POST['name'];
	$slug = slugify($name);
	$category = $_POST['category'];
	$price = $_POST['price'];
	$oldprice = $_POST['oldprice'];
	$discount = $_POST['discount'];
	$color = $_POST['color'];
	$brand = $_POST['brand'];
	$size = $_POST['size'];
	$description = $_POST['description'];
	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM products WHERE slug=:slug");
	$stmt->execute(['slug' => $slug]);
	$row = $stmt->fetch();

	if ($row['numrows'] > 0) {
		$_SESSION['error'] = 'Product already exist';
	} else {
								$date = date('Y-m-d');
		try {
			$stmt = $conn->prepare("INSERT INTO products (subcategory_id, name, description, slug, price, old_price, color, brand_id,size,discount,date_view) VALUES (:category, :name, :description, :slug, :price, :old_price, :color, :brand, :size, :discount, :date_view)");
			$stmt->execute(['category' => $category, 'name' => $name, 'description' => $description, 'slug' => $slug, 'price' => $price,  'old_price' => $oldprice, 'color' => $color, 'brand' => $brand, 'size' => $size, 'discount' => $discount, 'date_view'=>$date]);
			$_SESSION['success'] = 'Product added successfully';
		} catch (PDOException $e) {
			$_SESSION['error'] = $e->getMessage();
		}
	}

	$pdo->close();
} else {
	$_SESSION['error'] = 'Fill up product form first';
}

header('location: products.php');
