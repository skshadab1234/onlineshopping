<?php
include 'includes/session.php';
include 'includes/slugify.php';

if (isset($_POST['edit'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$slug = slugify($name);
	$category = $_POST['category'];
	$price = $_POST['price'];
	$oldprice = $_POST['old_price'];
	$discount = $_POST['discount'];
	$color = $_POST['color'];
	$brand = $_POST['brand'];
	$size = $_POST['size'];
	$description = $_POST['description'];

	$conn = $pdo->open();

	try {
		$stmt = $conn->prepare("UPDATE products SET name=:name, slug=:slug, category_id=:category, price=:price,  old_price=:old_price, discount=:discount, color=:color, brand=:brand, size=:size, description=:description WHERE id=:id");
		$stmt->execute(['name' => $name, 'slug' => $slug, 'category' => $category, 'price' => $price, 'old_price' => $oldprice, 'discount' => $discount, 'color' => $color, 'brand' => $brand, 'size' => $size, 'description' => $description, 'id' => $id]);
		$_SESSION['success'] = 'Product updated successfully';
	} catch (PDOException $e) {
		$_SESSION['error'] = $e->getMessage();
	}

	$pdo->close();
} else {
	$_SESSION['error'] = 'Fill up edit product form first';
}

header('location: products.php');
