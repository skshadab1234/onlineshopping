
<?php
include 'includes/session.php';

if (isset($_POST['add'])) {
	$name = $_POST['name'];
	$category = $_POST['category'];
	$filename = $_FILES['photo']['name'];

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM brands WHERE brand_name=:brand_name");
	$stmt->execute(['brand_name' => $name]);
	$row = $stmt->fetch();

	if ($row['numrows'] > 0) {
		$_SESSION['error'] = $name . ' already exist';
	} else {
		if (!empty($filename)) {
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			$new_filename = $name . '.' . $ext;
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/brand/' . $new_filename);
		} else {
			$new_filename = '';
		}

		try {
			$stmt = $conn->prepare("INSERT INTO brands (brand_name,brand_image,category) VALUES (:brand_name,:brand_image,:category)");
			$stmt->execute(['brand_name' => $name, 'brand_image' => $new_filename, 'category' => $category]);
			$_SESSION['success'] = $name . ' added successfully';
		} catch (PDOException $e) {
			$_SESSION['error'] = $e->getMessage();
		}
	}

	$pdo->close();
} else {
	$_SESSION['error'] = 'Fill up brand form first';
}

header('location: brands.php');

?>